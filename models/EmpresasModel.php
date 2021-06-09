<?php

require_once "conexion.php";

class EmpresasModel{

    public static function guardar($data,$tabla,$tabla2,$tabla3){
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("INSERT INTO $tabla
            (rfc,
            razon,
            regimen,
            nombre,
            inicio,
            status,
            ultimo_cambio,
            codigo,
            tipo_vialidad,
            nombre_vialidad,
            numero_exterior,
            numero_interior,
            colonia,
            localidad,
            municipio,
            entidad,
            entre_calle1,
            entre_calle2,
            mail,
            status_intranet,
            documento,
            logo,
            sellos,
            empresa_facturadora,
            empresa_asimilados,
            empresa_imss)
            VALUES
            (:rfc,
            :razon,
            :regimen,
            :nombre,
            :inicio,
            :status,
            :ultimo_cambio,
            :codigo,
            :tipo_vialidad,
            :nombre_vialidad,
            :numero_exterior,
            :numero_interior,
            :colonia,
            :localidad,
            :municipio,
            :entidad,
            :entre_calle1,
            :entre_calle2,
            :mail,
            :statusIntranet,
            :documento,
            :logo,
            :sellos,
            :empresa_facturadora,
            :empresa_asimilados,
            :empresa_imss)");

            $stmt->bindParam(':rfc',$data['rfc'],PDO::PARAM_STR);
            $stmt->bindParam(':razon',$data['razon'],PDO::PARAM_STR);
            $stmt->bindParam(':regimen',$data['regimen'],PDO::PARAM_STR);
            $stmt->bindParam(':nombre',$data['nombre'],PDO::PARAM_STR);
            $stmt->bindParam(':inicio',$data['inicio'],PDO::PARAM_STR);
            $stmt->bindParam(':status',$data['status'],PDO::PARAM_INT);
            $stmt->bindParam(':ultimo_cambio',$data['ultimo_cambio'],PDO::PARAM_STR);
            $stmt->bindParam(':codigo',$data['codigo'],PDO::PARAM_STR);
            $stmt->bindParam(':tipo_vialidad',$data['tipo_vialidad'],PDO::PARAM_STR);
            $stmt->bindParam(':nombre_vialidad',$data['nombre_vialidad'],PDO::PARAM_STR);
            $stmt->bindParam(':numero_exterior',$data['numero_exterior'],PDO::PARAM_STR);
            $stmt->bindParam(':numero_interior',$data['numero_interior'],PDO::PARAM_STR);
            $stmt->bindParam(':colonia',$data['colonia'],PDO::PARAM_STR);
            $stmt->bindParam(':localidad',$data['localidad'],PDO::PARAM_STR);
            $stmt->bindParam(':municipio',$data['municipio'],PDO::PARAM_STR);
            $stmt->bindParam(':entidad',$data['entidad'],PDO::PARAM_STR);
            $stmt->bindParam(':entre_calle1',$data['entre_calle1'],PDO::PARAM_STR);
            $stmt->bindParam(':entre_calle2',$data['entre_calle2'],PDO::PARAM_STR);
            $stmt->bindParam(':mail',$data['mail'],PDO::PARAM_STR);
            $stmt->bindParam(':statusIntranet',$data['statusIntranet'],PDO::PARAM_INT);
            $stmt->bindParam(':documento',$data['documentoNombre'],PDO::PARAM_STR);
            $stmt->bindParam(':logo',$data['imagenNombre'],PDO::PARAM_STR);
            $stmt->bindParam(':sellos',$data['sellosNombre'],PDO::PARAM_STR);
            $stmt->bindParam(':empresa_facturadora',$data['facturadora'],PDO::PARAM_INT);
            $stmt->bindParam(':empresa_asimilados',$data['asimilados'],PDO::PARAM_INT);
            $stmt->bindParam(':empresa_imss',$data['imss'],PDO::PARAM_INT);

            if($stmt->execute()){
                $ultimo_id = $conexion->lastInsertId();
                foreach ($data['sucursales'] as $indice=>$direccion) {
                    if(!empty($direccion)){
                        $motivo = $data['motivos'][$indice];
                        $documento = $data['archivoSucursal'][$indice];
                        $stmt = $conexion->prepare("INSERT INTO $tabla2(id_matriz,direccion,motivo,documento) VALUES($ultimo_id,'$direccion','$motivo','$documento')");	
                        if(!$stmt->execute()){
                            self::borrarEmpresa($ultimo_id,Tablas::empresas());
                            self::removerArchivos($data['imagenNombre'],$data['documentoNombre'],$data['sellosNombre']);
                            return array('bandera'=>3);
                        } 
                    }    
                }
                foreach ($data['responsablesCalculo'] as $indice=>$responsable) {
                    if(!empty($responsable)){
                        $stmt = $conexion->prepare("INSERT INTO $tabla3(id_empresa,id_responsable,tipo) VALUES($ultimo_id,$responsable,1)");
                        if(!$stmt->execute()){
                            self::borrarEmpresa($ultimo_id,Tablas::empresas());
                            self::removerArchivos($data['imagenNombre'],$data['documentoNombre'],$data['sellosNombre']);
                            return array('bandera'=>3);
                        }
                    }
                            
                }
                foreach ($data['responsablesLiberacion'] as $indice=>$responsable2) {
                    if(!empty($responsable2)){
                        $stmt = $conexion->prepare("INSERT INTO $tabla3(id_empresa,id_responsable,tipo) VALUES($ultimo_id,$responsable2,2)");
                        if(!$stmt->execute()){
                            self::borrarEmpresa($ultimo_id,Tablas::empresas());
                            self::removerArchivos($data['imagenNombre'],$data['documentoNombre'],$data['sellosNombre']);
                            return array('bandera'=>3);
                        }
                    }
                        
                }
                foreach ($data['responsablesDispersion'] as $indice=>$responsable3) {
                    if(!empty($responsable3)){
                        $stmt = $conexion->prepare("INSERT INTO $tabla3(id_empresa,id_responsable,tipo) VALUES($ultimo_id,$responsable3,3)");
                        if(!$stmt->execute()){
                            self::borrarEmpresa($ultimo_id,Tablas::empresas());
                            self::removerArchivos($data['imagenNombre'],$data['documentoNombre'],$data['sellosNombre']);
                            return array('bandera'=>3);
                        }
                    }
                        
                }
                foreach ($data['responsablesFacturacion'] as $indice=>$responsable4) {
                    if(!empty($responsable4)){
                        $stmt = $conexion->prepare("INSERT INTO $tabla3(id_empresa,id_responsable,tipo) VALUES($ultimo_id,$responsable4,4)");
                        if(!$stmt->execute()){
                            self::borrarEmpresa($ultimo_id,Tablas::empresas());
                            self::removerArchivos($data['imagenNombre'],$data['documentoNombre'],$data['sellosNombre']);
                            return array('bandera'=>3);
                        }
                    }
                }

                return array('bandera'=>2);
            }
            else{
                self::removerArchivos($data['imagenNombre'],$data['documentoNombre'],$data['sellosNombre']);
                return array('bandera'=>3);
            }
                
        $conexion->close(); 
    }


    public static function guardar2($data,$tabla,$tabla2,$tabla3){
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("INSERT INTO $tabla
            (rfc,
            razon,
            regimen,
            nombre,
            inicio,
            status,
            ultimo_cambio,
            codigo,
            tipo_vialidad,
            nombre_vialidad,
            numero_exterior,
            numero_interior,
            colonia,
            localidad,
            municipio,
            entidad,
            entre_calle1,
            entre_calle2,
            mail,
            status_intranet,
            documento,
            logo,
            sellos,
            empresa_facturadora,
            empresa_asimilados,
            empresa_imss,
            constitutiva,
            fecha_proto_constitutiva,
            notaria_constitutiva,
            notario_constitutiva,
            fme_constitutiva,
            fecha_registro_constitutiva,
            lugar_registro_constitutiva,
            administrador,
            accionistas,
            escrituras,
            fecha_proto_administrador,
            fecha_asamblea,
            notaria_administrador,
            notario_administrador,
            fme_administrador,
            fecha_registro_administrador,
            lugar_registro_administrador,
            capital_social,
            objeto,
            denominacion,
            poder,
            fecha_poder,
            rppc,
            apoderados,
            facultades)
            VALUES
            (:rfc,
            :razon,
            :regimen,
            :nombre,
            :inicio,
            :status,
            :ultimo_cambio,
            :codigo,
            :tipo_vialidad,
            :nombre_vialidad,
            :numero_exterior,
            :numero_interior,
            :colonia,
            :localidad,
            :municipio,
            :entidad,
            :entre_calle1,
            :entre_calle2,
            :mail,
            :statusIntranet,
            :documento,
            :logo,
            :sellos,
            :empresa_facturadora,
            :empresa_asimilados,
            :empresa_imss,
            :constitutiva,
            :fecha_proto_constitutiva,
            :notaria_constitutiva,
            :notario_constitutiva,
            :fme_constitutiva,
            :fecha_registro_constitutiva,
            :lugar_registro_constitutiva,
            :administrador,
            :accionistas,
            :escrituras,
            :fecha_proto_administrador,
            :fecha_asamblea,
            :notaria_administrador,
            :notario_administrador,
            :fme_administrador,
            :fecha_registro_administrador,
            :lugar_registro_administrador,
            :capital_social,
            :objeto,
            :denominacion,
            :poder,
            :fecha_poder,
            :rppc,
            :apoderados,
            :facultades)");

            $stmt->bindParam(':rfc',$data['rfc'],PDO::PARAM_STR);
            $stmt->bindParam(':razon',$data['razon'],PDO::PARAM_STR);
            $stmt->bindParam(':regimen',$data['regimen'],PDO::PARAM_STR);
            $stmt->bindParam(':nombre',$data['nombre'],PDO::PARAM_STR);
            $stmt->bindParam(':inicio',$data['inicio'],PDO::PARAM_STR);
            $stmt->bindParam(':status',$data['status'],PDO::PARAM_INT);
            $stmt->bindParam(':ultimo_cambio',$data['ultimo_cambio'],PDO::PARAM_STR);
            $stmt->bindParam(':codigo',$data['codigo'],PDO::PARAM_STR);
            $stmt->bindParam(':tipo_vialidad',$data['tipo_vialidad'],PDO::PARAM_STR);
            $stmt->bindParam(':nombre_vialidad',$data['nombre_vialidad'],PDO::PARAM_STR);
            $stmt->bindParam(':numero_exterior',$data['numero_exterior'],PDO::PARAM_STR);
            $stmt->bindParam(':numero_interior',$data['numero_interior'],PDO::PARAM_STR);
            $stmt->bindParam(':colonia',$data['colonia'],PDO::PARAM_STR);
            $stmt->bindParam(':localidad',$data['localidad'],PDO::PARAM_STR);
            $stmt->bindParam(':municipio',$data['municipio'],PDO::PARAM_STR);
            $stmt->bindParam(':entidad',$data['entidad'],PDO::PARAM_STR);
            $stmt->bindParam(':entre_calle1',$data['entre_calle1'],PDO::PARAM_STR);
            $stmt->bindParam(':entre_calle2',$data['entre_calle2'],PDO::PARAM_STR);
            $stmt->bindParam(':mail',$data['mail'],PDO::PARAM_STR);
            $stmt->bindParam(':statusIntranet',$data['statusIntranet'],PDO::PARAM_INT);
            $stmt->bindParam(':documento',$data['documentoNombre'],PDO::PARAM_STR);
            $stmt->bindParam(':logo',$data['imagenNombre'],PDO::PARAM_STR);
            $stmt->bindParam(':sellos',$data['sellosNombre'],PDO::PARAM_STR);
            $stmt->bindParam(':empresa_facturadora',$data['facturadora'],PDO::PARAM_INT);
            $stmt->bindParam(':empresa_asimilados',$data['asimilados'],PDO::PARAM_INT);
            $stmt->bindParam(':empresa_imss',$data['imss'],PDO::PARAM_INT);
            $stmt->bindParam(':constitutiva',$data['constitutiva'],PDO::PARAM_STR);
            $stmt->bindParam(':fecha_proto_constitutiva',$data['fechaProtocolizacionConstitutiva'],PDO::PARAM_STR);
            $stmt->bindParam(':notaria_constitutiva',$data['notariaConstitutiva'],PDO::PARAM_STR);
            $stmt->bindParam(':notario_constitutiva',$data['notarioConstitutiva'],PDO::PARAM_STR);
            $stmt->bindParam(':fme_constitutiva',$data['fmeConstitutiva'],PDO::PARAM_STR);
            $stmt->bindParam(':fecha_registro_constitutiva',$data['fechaRegistroConstitutiva'],PDO::PARAM_STR);
            $stmt->bindParam(':lugar_registro_constitutiva',$data['lugarRegistroConstitutiva'],PDO::PARAM_STR);
            $stmt->bindParam(':administrador',$data['administrador'],PDO::PARAM_STR);
            $stmt->bindParam(':accionistas',$data['accionistas'],PDO::PARAM_STR);
            $stmt->bindParam(':escrituras',$data['escritura'],PDO::PARAM_STR);
            $stmt->bindParam(':fecha_proto_administrador',$data['fechaProtocolizacionAdministrador'],PDO::PARAM_STR);
            $stmt->bindParam(':fecha_asamblea',$data['fechaAsamblea'],PDO::PARAM_STR);
            $stmt->bindParam(':notaria_administrador',$data['notariaAdministrador'],PDO::PARAM_STR);
            $stmt->bindParam(':notario_administrador',$data['notarioAdministrador'],PDO::PARAM_STR);
            $stmt->bindParam(':fme_administrador',$data['fmeAdministrador'],PDO::PARAM_STR);
            $stmt->bindParam(':fecha_registro_administrador',$data['fechaRegistroAdministrador'],PDO::PARAM_STR);
            $stmt->bindParam(':lugar_registro_administrador',$data['lugarRegistroAdministrador'],PDO::PARAM_STR);
            $stmt->bindParam(':capital_social',$data['capitalSocial'],PDO::PARAM_INT);
            $stmt->bindParam(':objeto',$data['objeto'],PDO::PARAM_INT);
            $stmt->bindParam(':denominacion',$data['denominacion'],PDO::PARAM_INT);
            $stmt->bindParam(':poder',$data['poder'],PDO::PARAM_STR);
            $stmt->bindParam(':fecha_poder',$data['fechaPoder'],PDO::PARAM_STR);
            $stmt->bindParam(':rppc',$data['rppc'],PDO::PARAM_INT);
            $stmt->bindParam(':apoderados',$data['apoderados'],PDO::PARAM_STR);
            $stmt->bindParam(':facultades',$data['facultades'],PDO::PARAM_STR);

            if($stmt->execute()){
                $ultimo_id = $conexion->lastInsertId();
                foreach ($data['sucursales'] as $indice=>$direccion) {
                    if(!empty($direccion)){
                        $motivo = $data['motivos'][$indice];
                        $documento = $data['archivoSucursal'][$indice];
                        $stmt = $conexion->prepare("INSERT INTO $tabla2(id_matriz,direccion,motivo,documento) VALUES($ultimo_id,'$direccion','$motivo','$documento')");	
                        if(!$stmt->execute()){
                            self::borrarEmpresa($ultimo_id,Tablas::empresas());
                            self::removerArchivos($data['imagenNombre'],$data['documentoNombre'],$data['sellosNombre']);
                            return array('bandera'=>3);
                        } 
                    }    
                }
                foreach ($data['responsablesCalculo'] as $indice=>$responsable) {
                    if(!empty($responsable)){
                        $stmt = $conexion->prepare("INSERT INTO $tabla3(id_empresa,id_responsable,tipo) VALUES($ultimo_id,$responsable,1)");
                        if(!$stmt->execute()){
                            self::borrarEmpresa($ultimo_id,Tablas::empresas());
                            self::removerArchivos($data['imagenNombre'],$data['documentoNombre'],$data['sellosNombre']);
                            return array('bandera'=>3);
                        }
                    }
                            
                }
                foreach ($data['responsablesLiberacion'] as $indice=>$responsable2) {
                    if(!empty($responsable2)){
                        $stmt = $conexion->prepare("INSERT INTO $tabla3(id_empresa,id_responsable,tipo) VALUES($ultimo_id,$responsable2,2)");
                        if(!$stmt->execute()){
                            self::borrarEmpresa($ultimo_id,Tablas::empresas());
                            self::removerArchivos($data['imagenNombre'],$data['documentoNombre'],$data['sellosNombre']);
                            return array('bandera'=>3);
                        }
                    }
                        
                }
                foreach ($data['responsablesDispersion'] as $indice=>$responsable3) {
                    if(!empty($responsable3)){
                        $stmt = $conexion->prepare("INSERT INTO $tabla3(id_empresa,id_responsable,tipo) VALUES($ultimo_id,$responsable3,3)");
                        if(!$stmt->execute()){
                            self::borrarEmpresa($ultimo_id,Tablas::empresas());
                            self::removerArchivos($data['imagenNombre'],$data['documentoNombre'],$data['sellosNombre']);
                            return array('bandera'=>3);
                        }
                    }
                        
                }
                foreach ($data['responsablesFacturacion'] as $indice=>$responsable4) {
                    if(!empty($responsable4)){
                        $stmt = $conexion->prepare("INSERT INTO $tabla3(id_empresa,id_responsable,tipo) VALUES($ultimo_id,$responsable4,4)");
                        if(!$stmt->execute()){
                            self::borrarEmpresa($ultimo_id,Tablas::empresas());
                            self::removerArchivos($data['imagenNombre'],$data['documentoNombre'],$data['sellosNombre']);
                            return array('bandera'=>3);
                        }
                    }
                }

                return array('bandera'=>2,'id'=>$ultimo_id);
            }
            else{
                self::removerArchivos($data['imagenNombre'],$data['documentoNombre'],$data['sellosNombre']);
                return array('bandera'=>3);
            }
                
        $conexion->close(); 
    }

    public static function actualizar($data,$tabla,$tabla2,$tabla3){
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("UPDATE $tabla SET
            rfc=:rfc,
            razon=:razon,
            regimen=:regimen,
            nombre=:nombre,
            inicio=:inicio,
            status=:status,
            ultimo_cambio=:ultimo_cambio,
            codigo=:codigo,
            tipo_vialidad=:tipo_vialidad,
            nombre_vialidad=:nombre_vialidad,
            numero_exterior=:numero_exterior,
            numero_interior=:numero_interior,
            colonia=:colonia,
            localidad=:localidad,
            municipio=:municipio,
            entidad=:entidad,
            entre_calle1=:entre_calle1,
            entre_calle2=:entre_calle2,
            mail=:mail,
            documento=:documento,
            logo=:logo,
            sellos=:sellos,
            status_intranet=:statusIntranet,
            empresa_facturadora=:empresa_facturadora,
            empresa_asimilados=:empresa_asimilados,
            empresa_imss=:empresa_imss WHERE id = :id");

            $stmt->bindParam(':rfc',$data['rfc'],PDO::PARAM_STR);
            $stmt->bindParam(':razon',$data['razon'],PDO::PARAM_STR);
            $stmt->bindParam(':regimen',$data['regimen'],PDO::PARAM_STR);
            $stmt->bindParam(':nombre',$data['nombre'],PDO::PARAM_STR);
            $stmt->bindParam(':inicio',$data['inicio'],PDO::PARAM_STR);
            $stmt->bindParam(':status',$data['status'],PDO::PARAM_INT);
            $stmt->bindParam(':ultimo_cambio',$data['ultimo_cambio'],PDO::PARAM_STR);
            $stmt->bindParam(':codigo',$data['codigo'],PDO::PARAM_STR);
            $stmt->bindParam(':tipo_vialidad',$data['tipo_vialidad'],PDO::PARAM_STR);
            $stmt->bindParam(':nombre_vialidad',$data['nombre_vialidad'],PDO::PARAM_STR);
            $stmt->bindParam(':numero_exterior',$data['numero_exterior'],PDO::PARAM_STR);
            $stmt->bindParam(':numero_interior',$data['numero_interior'],PDO::PARAM_STR);
            $stmt->bindParam(':colonia',$data['colonia'],PDO::PARAM_STR);
            $stmt->bindParam(':localidad',$data['localidad'],PDO::PARAM_STR);
            $stmt->bindParam(':municipio',$data['municipio'],PDO::PARAM_STR);
            $stmt->bindParam(':entidad',$data['entidad'],PDO::PARAM_STR);
            $stmt->bindParam(':entre_calle1',$data['entre_calle1'],PDO::PARAM_STR);
            $stmt->bindParam(':entre_calle2',$data['entre_calle2'],PDO::PARAM_STR);
            $stmt->bindParam(':mail',$data['mail'],PDO::PARAM_STR);
            $stmt->bindParam(':documento',$data['documentoNombre'],PDO::PARAM_STR);
            $stmt->bindParam(':logo',$data['imagenNombre'],PDO::PARAM_STR);
            $stmt->bindParam(':sellos',$data['sellosNombre'],PDO::PARAM_STR);
            $stmt->bindParam(':statusIntranet',$data['statusIntranet'],PDO::PARAM_INT);
            $stmt->bindParam(':empresa_facturadora',$data['facturadora'],PDO::PARAM_INT);
            $stmt->bindParam(':empresa_asimilados',$data['asimilados'],PDO::PARAM_INT);
            $stmt->bindParam(':empresa_imss',$data['imss'],PDO::PARAM_INT);
            $stmt->bindParam(':id',$data['id'],PDO::PARAM_INT);

            $idEmpresa = $data["id"];

        if($stmt->execute()){
            foreach ($data['sucursales'] as $indice=>$direccion) {
                if(!empty($direccion)){
                        $motivo = $data['motivos'][$indice];
                        $documento = $data['archivoSucursal'][$indice];
                        $stmt = $conexion->prepare("INSERT INTO $tabla2(id_matriz,direccion,motivo,documento) VALUES($idEmpresa,'$direccion','$motivo','$documento')");
                        $stmt->execute();  
                }
            }

            foreach ($data['responsablesCalculo'] as $indice=>$responsable) {
                if(!empty($responsable)){
                    $stmt = $conexion->prepare("INSERT INTO $tabla3(id_empresa,id_responsable,tipo) VALUES($idEmpresa,$responsable,1)");
                    $stmt->execute();
                }          
            }
            foreach ($data['responsablesLiberacion'] as $indice=>$responsable2) {
                if(!empty($responsable2)){
                    $stmt = $conexion->prepare("INSERT INTO $tabla3(id_empresa,id_responsable,tipo) VALUES($idEmpresa,$responsable2,2)");
                   $stmt->execute();
                }   
            }
            foreach ($data['responsablesDispersion'] as $indice=>$responsable3) {
                if(!empty($responsable3)){
                    $stmt = $conexion->prepare("INSERT INTO $tabla3(id_empresa,id_responsable,tipo) VALUES($idEmpresa,$responsable3,3)");
                    $stmt->execute();
                } 
            }
            foreach ($data['responsablesFacturacion'] as $indice=>$responsable4) {
                if(!empty($responsable4)){
                    $stmt = $conexion->prepare("INSERT INTO $tabla3(id_empresa,id_responsable,tipo) VALUES($idEmpresa,$responsable4,4)");
                    $stmt->execute();
                }
            }
            return array('bandera'=>2,'pdf'=>$data['documentoNombre'],'logo'=>$data['imagenNombre'],'sellos'=>$data['sellosNombre']);
        }  
        else
            return array('bandera'=>3);    
        $conexion->close(); 
    }

    public static function actualizar2($data,$tabla,$tabla2,$tabla3){
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("UPDATE $tabla SET
            rfc=:rfc,
            razon=:razon,
            regimen=:regimen,
            nombre=:nombre,
            inicio=:inicio,
            status=:status,
            ultimo_cambio=:ultimo_cambio,
            codigo=:codigo,
            tipo_vialidad=:tipo_vialidad,
            nombre_vialidad=:nombre_vialidad,
            numero_exterior=:numero_exterior,
            numero_interior=:numero_interior,
            colonia=:colonia,
            localidad=:localidad,
            municipio=:municipio,
            entidad=:entidad,
            entre_calle1=:entre_calle1,
            entre_calle2=:entre_calle2,
            mail=:mail,
            documento=:documento,
            logo=:logo,
            sellos=:sellos,
            status_intranet=:statusIntranet,
            empresa_facturadora=:empresa_facturadora,
            empresa_asimilados=:empresa_asimilados,
            empresa_imss=:empresa_imss,
            constitutiva=:constitutiva,
            fecha_proto_constitutiva=:fecha_proto_constitutiva,
            notaria_constitutiva=:notaria_constitutiva,
            notario_constitutiva=:notario_constitutiva,
            fme_constitutiva=:fme_constitutiva,
            fecha_registro_constitutiva=:fecha_registro_constitutiva,
            lugar_registro_constitutiva=:lugar_registro_constitutiva,
            administrador=:administrador,
            accionistas=:accionistas,
            escrituras=:escrituras,
            fecha_proto_administrador=:fecha_proto_administrador,
            fecha_asamblea=:fecha_asamblea,
            notaria_administrador=:notaria_administrador,
            notario_administrador=:notario_administrador,
            fme_administrador=:fme_administrador,
            fecha_registro_administrador=:fecha_registro_administrador,
            lugar_registro_administrador=:lugar_registro_administrador,
            capital_social=:capital_social,
            objeto=:objeto,
            denominacion=:denominacion,
            poder=:poder,
            fecha_poder=:fecha_poder,
            rppc=:rppc,
            apoderados=:apoderados,
            facultades=:facultades
            WHERE id = :id");

            $stmt->bindParam(':rfc',$data['rfc'],PDO::PARAM_STR);
            $stmt->bindParam(':razon',$data['razon'],PDO::PARAM_STR);
            $stmt->bindParam(':regimen',$data['regimen'],PDO::PARAM_STR);
            $stmt->bindParam(':nombre',$data['nombre'],PDO::PARAM_STR);
            $stmt->bindParam(':inicio',$data['inicio'],PDO::PARAM_STR);
            $stmt->bindParam(':status',$data['status'],PDO::PARAM_INT);
            $stmt->bindParam(':ultimo_cambio',$data['ultimo_cambio'],PDO::PARAM_STR);
            $stmt->bindParam(':codigo',$data['codigo'],PDO::PARAM_STR);
            $stmt->bindParam(':tipo_vialidad',$data['tipo_vialidad'],PDO::PARAM_STR);
            $stmt->bindParam(':nombre_vialidad',$data['nombre_vialidad'],PDO::PARAM_STR);
            $stmt->bindParam(':numero_exterior',$data['numero_exterior'],PDO::PARAM_STR);
            $stmt->bindParam(':numero_interior',$data['numero_interior'],PDO::PARAM_STR);
            $stmt->bindParam(':colonia',$data['colonia'],PDO::PARAM_STR);
            $stmt->bindParam(':localidad',$data['localidad'],PDO::PARAM_STR);
            $stmt->bindParam(':municipio',$data['municipio'],PDO::PARAM_STR);
            $stmt->bindParam(':entidad',$data['entidad'],PDO::PARAM_STR);
            $stmt->bindParam(':entre_calle1',$data['entre_calle1'],PDO::PARAM_STR);
            $stmt->bindParam(':entre_calle2',$data['entre_calle2'],PDO::PARAM_STR);
            $stmt->bindParam(':mail',$data['mail'],PDO::PARAM_STR);
            $stmt->bindParam(':documento',$data['documentoNombre'],PDO::PARAM_STR);
            $stmt->bindParam(':logo',$data['imagenNombre'],PDO::PARAM_STR);
            $stmt->bindParam(':sellos',$data['sellosNombre'],PDO::PARAM_STR);
            $stmt->bindParam(':statusIntranet',$data['statusIntranet'],PDO::PARAM_INT);
            $stmt->bindParam(':empresa_facturadora',$data['facturadora'],PDO::PARAM_INT);
            $stmt->bindParam(':empresa_asimilados',$data['asimilados'],PDO::PARAM_INT);
            $stmt->bindParam(':empresa_imss',$data['imss'],PDO::PARAM_INT);
            $stmt->bindParam(':constitutiva',$data['constitutiva'],PDO::PARAM_STR);
            $stmt->bindParam(':fecha_proto_constitutiva',$data['fechaProtocolizacionConstitutiva'],PDO::PARAM_STR);
            $stmt->bindParam(':notaria_constitutiva',$data['notariaConstitutiva'],PDO::PARAM_STR);
            $stmt->bindParam(':notario_constitutiva',$data['notarioConstitutiva'],PDO::PARAM_STR);
            $stmt->bindParam(':fme_constitutiva',$data['fmeConstitutiva'],PDO::PARAM_STR);
            $stmt->bindParam(':fecha_registro_constitutiva',$data['fechaRegistroConstitutiva'],PDO::PARAM_STR);
            $stmt->bindParam(':lugar_registro_constitutiva',$data['lugarRegistroConstitutiva'],PDO::PARAM_STR);
            $stmt->bindParam(':administrador',$data['administrador'],PDO::PARAM_STR);
            $stmt->bindParam(':accionistas',$data['accionistas'],PDO::PARAM_STR);
            $stmt->bindParam(':escrituras',$data['escritura'],PDO::PARAM_STR);
            $stmt->bindParam(':fecha_proto_administrador',$data['fechaProtocolizacionAdministrador'],PDO::PARAM_STR);
            $stmt->bindParam(':fecha_asamblea',$data['fechaAsamblea'],PDO::PARAM_STR);
            $stmt->bindParam(':notaria_administrador',$data['notariaAdministrador'],PDO::PARAM_STR);
            $stmt->bindParam(':notario_administrador',$data['notarioAdministrador'],PDO::PARAM_STR);
            $stmt->bindParam(':fme_administrador',$data['fmeAdministrador'],PDO::PARAM_STR);
            $stmt->bindParam(':fecha_registro_administrador',$data['fechaRegistroAdministrador'],PDO::PARAM_STR);
            $stmt->bindParam(':lugar_registro_administrador',$data['lugarRegistroAdministrador'],PDO::PARAM_STR);
            $stmt->bindParam(':capital_social',$data['capitalSocial'],PDO::PARAM_INT);
            $stmt->bindParam(':objeto',$data['objeto'],PDO::PARAM_INT);
            $stmt->bindParam(':denominacion',$data['denominacion'],PDO::PARAM_INT);
            $stmt->bindParam(':poder',$data['poder'],PDO::PARAM_STR);
            $stmt->bindParam(':fecha_poder',$data['fechaPoder'],PDO::PARAM_STR);
            $stmt->bindParam(':rppc',$data['rppc'],PDO::PARAM_INT);
            $stmt->bindParam(':apoderados',$data['apoderados'],PDO::PARAM_STR);
            $stmt->bindParam(':facultades',$data['facultades'],PDO::PARAM_STR);

            $stmt->bindParam(':id',$data['id'],PDO::PARAM_INT);

            $idEmpresa = $data["id"];

        if($stmt->execute()){
            foreach ($data['sucursales'] as $indice=>$direccion) {
                if(!empty($direccion)){
                        $motivo = $data['motivos'][$indice];
                        $documento = $data['archivoSucursal'][$indice];
                        $stmt = $conexion->prepare("INSERT INTO $tabla2(id_matriz,direccion,motivo,documento) VALUES($idEmpresa,'$direccion','$motivo','$documento')");
                        $stmt->execute();  
                }
            }

            foreach ($data['responsablesCalculo'] as $indice=>$responsable) {
                if(!empty($responsable)){
                    $stmt = $conexion->prepare("INSERT INTO $tabla3(id_empresa,id_responsable,tipo) VALUES($idEmpresa,$responsable,1)");
                    $stmt->execute();
                }          
            }
            foreach ($data['responsablesLiberacion'] as $indice=>$responsable2) {
                if(!empty($responsable2)){
                    $stmt = $conexion->prepare("INSERT INTO $tabla3(id_empresa,id_responsable,tipo) VALUES($idEmpresa,$responsable2,2)");
                   $stmt->execute();
                }   
            }
            foreach ($data['responsablesDispersion'] as $indice=>$responsable3) {
                if(!empty($responsable3)){
                    $stmt = $conexion->prepare("INSERT INTO $tabla3(id_empresa,id_responsable,tipo) VALUES($idEmpresa,$responsable3,3)");
                    $stmt->execute();
                } 
            }
            foreach ($data['responsablesFacturacion'] as $indice=>$responsable4) {
                if(!empty($responsable4)){
                    $stmt = $conexion->prepare("INSERT INTO $tabla3(id_empresa,id_responsable,tipo) VALUES($idEmpresa,$responsable4,4)");
                    $stmt->execute();
                }
            }
            return array('bandera'=>2,'id'=>$idEmpresa,'pdf'=>$data['documentoNombre'],'logo'=>$data['imagenNombre'],'sellos'=>$data['sellosNombre']);
        }  
        else
            return array('bandera'=>3);    
        $conexion->close(); 
    }

    public static function mostrarEmpresas($data,$limit,$tabla){
        $consulta="WHERE 1";

        if( ($data['situacion'] !== "") ){
            $consulta.= " AND status_intranet =".intval($data['situacion']);
        }

        if( !empty($data['nombre']) ){
            $cadena=$data["nombre"];
            $consulta .=" AND (nombre LIKE '%$cadena%' COLLATE utf8_general_ci)";
        }

		$conexion=Conexion::conectar();
		$stmt = $conexion->prepare("SELECT id,nombre,empresa_facturadora,empresa_asimilados,empresa_imss FROM $tabla $consulta ORDER BY nombre $limit");
		$stmt->execute();
        $data = $stmt->fetchAll();
        $stmt = $conexion->prepare("SELECT COUNT(id) FROM $tabla $consulta");
		$stmt->execute();
        return array('data'=>$data,'total'=>$stmt->fetch()[0]);
		$conexion->close();
    }

    public static function mostrarData($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
		$stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }

    public static function mostrarSucursales($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id,direccion,motivo,documento FROM $tabla WHERE id_matriz = :id ORDER BY id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
		$stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }

    public static function responsables($id,$tipo,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id,id_responsable FROM $tabla WHERE id_empresa = :id AND tipo = :tipo ORDER BY id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->bindParam(':tipo',$tipo,PDO::PARAM_INT);
		$stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }

    public static function sucursal($id,$tabla,$tabla2){
        $stmt = Conexion::conectar()->prepare("SELECT $tabla2.nombre FROM $tabla INNER JOIN $tabla2 ON $tabla.id_sucursal = $tabla2.id_sucursal WHERE id_usuario");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
		$stmt->execute();
        return $stmt->fetch()[0];
        $stmt->close();
    }

    public static function nombreResponsable($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT CONCAT(nombre,' ',paterno,' ',materno) FROM $tabla WHERE id_usuario = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
		$stmt->execute();
        return $stmt->fetch()[0];
        $stmt->close();
    }
    

    public static function archivo($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT logo,documento,sellos FROM $tabla WHERE id = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
		$stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }

    public static function marcadores($tipo,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(id) FROM $tabla WHERE status_intranet = :tipo");
        $stmt->bindParam(':tipo',$tipo,PDO::PARAM_INT);
		$stmt->execute();
        return $stmt->fetch()[0];
        $stmt->close();
    }

    public static function borrarSucursal($id,$tabla){
        $conexion = Conexion::conectar();
        
        $stmt = $conexion->prepare("SELECT documento FROM $tabla WHERE id = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        unlink("../intranet/documentos-empresas/".$stmt->fetch()[0]);

        $stmt = $conexion->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
		return $stmt->execute();
        $conexion->close();
    }

    public static function borrarResponsable($id,$tabla){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
		return $stmt->execute();
        $conexion->close();
    }

    public static function cargarSucursales($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_sucursal,nombre FROM $tabla ORDER BY nombre");	
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
    }

    public static function cargarUsuarios($sucursal,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT id_usuario,CONCAT(nombre,' ',paterno,' ',materno) AS nombre FROM $tabla WHERE id_sucursal = :a AND situacion = 1 ORDER BY nombre,paterno,materno");	
        $stmt->bindParam(':a',$sucursal,PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
    }

    public static function borrarEmpresa($id,$tabla){
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
		return $stmt->execute();
        $conexion->close();
    }

    public static function removerArchivos($imagen,$documento,$sellos){
        if($imagen != NULL)
            unlink("../intranet/documentos-empresas/".$imagen);
        if($documento != NULL)
            unlink("../intranet/documentos-empresas/".$documento);
        if($sellos != NULL)
            unlink("../intranet/documentos-empresas/".$sellos);  
        return;     
    }

    public static function getNombreEmpresa($id,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla WHERE id = :id");
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch()[0];
        $stmt->close(); 	
    }
    
   

}
