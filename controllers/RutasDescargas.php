<?php

class RutasDescargas{

    #MUESTRA TODOS LOS AÑOS FISCALES
    public static function primerSegmento(){
        $respuesta = RutasDescargasModel::primerSegmento(Tablas::segmentoDescarga1());
        foreach($respuesta as $row => $item){
				echo'<option value="'.$item["ruta"].'">'.$item["fiscal"].'</option>';
		}
    }

    #MUESTRA TODOS LOS PERIODOS PARA EL AÑO SELECCIONADO
    public static function getPeriodos($anio){
        if(!preg_match('/^[0-9]{4}$/', $anio))
			return 'Error';
        $respuesta = RutasDescargasModel::getPeriodos($anio,Tablas::segmentoDescarga1(),Tablas::segmentoDescarga2());
        $cadena='<select class="form-control textoMay" name="periodoNomina" id="periodoNomina" required><option value=""></option>';
        foreach($respuesta as $row => $item){
            $cadena.='<option value="'.$item["periodo"].'">'.$item["periodo_fecha"].'</option>';
        }
        $cadena.='</select>';
        return $cadena;
    }

    

    public static function completarRuta($rutaParcial,$periodo,$tipo,$formato,$idUsuario){

        $registroActual='';
        $i=1;
        $clave = RutasDescargasModel::obtenerClave($idUsuario,Tablas::usuarios());
        $departamento = RutasDescargasModel::obtenerDepartamento($clave,TablasGiro::empdep());
        $carpeta='ASIM/';
        $existe=false;
        $extension = $formato == 0 ? 'pdf' : 'xml';
        
        if($tipo == 0){
            $carpeta='SYS/';
            $registro = RutasDescargasModel::obtenerRegistro($clave,TablasGiro::patronales());

            foreach ($registro as $row => $item){ //pueden existir varios registros patronales
                if(!$existe){
                    foreach ($departamento as $row2 => $item2){ //pueden existir varios departamentos
                        if(!$existe){
                            for($i=1;$i<=3;$i++){
                                if($existe=file_exists($rutaParcial.$carpeta.'S033 '.$periodo.'/RP '.trim($item['REGISTRO_PATRONAL'])."/Depto ".trim($item2['CATALOGO'])."/NOM S033 ".$periodo." - ".$clave."_".$i.".".$extension)){
                                    $registroActual=trim($item['REGISTRO_PATRONAL']);
                                    $departamento=trim($item2['CATALOGO']);
                                    break;
                                }
                            }
                        }
                        else
                            break;
                    }
                }
                else
                    break;
            }
        }

        else{
            $registroActual=' A0000000000';
            foreach ($departamento as $row => $item){ //pueden existir varios departamentos
                if(!$existe){
                    for($i=1;$i<=3;$i++){
                        if($existe=file_exists($rutaParcial.$carpeta.'S033 '.$periodo.'/RP'.$registroActual."/Depto ".trim($item['CATALOGO'])."/NOM S033 ".$periodo." - ".$clave."_".$i.".".$extension)){
                            $departamento=trim($item['CATALOGO']);
                            break;
                        }
                    }
                }
                else
                    break;
            }  

            if(!$existe){
               $registroActual=' 00000000000';//Esta carpeta suele cambiar o empiza con 0 o enpieza con A
                foreach ($departamento as $row => $item){ 
                    if(!$existe){
                        for($i=1;$i<=3;$i++){
                            if($existe=file_exists($rutaParcial.$carpeta.'S033 '.$periodo.'/RP'.$registroActual."/Depto ".trim($item['CATALOGO'])."/NOM S033 ".$periodo." - ".$clave."_".$i.".".$extension)){
                                $departamento=trim($item['CATALOGO']);
                                break;
                            }
                        }
                    }
                    else
                        break;
                }
            }     

            if(!$existe){
                $registroActual='';
                foreach ($departamento as $row => $item){ //pueden existir varios departamentos
                    if(!$existe){
                        for($i=1;$i<=3;$i++){
                            if($existe=file_exists($rutaParcial.$carpeta.'S033 '.$periodo.'/RP'.$registroActual."/Depto ".trim($item['CATALOGO'])."/NOM S033 ".$periodo." - ".$clave."_".$i.".".$extension)){
                                $departamento=trim($item['CATALOGO']);
                                break;
                            }
                        }
                    }
                    else
                        break;
                }  

            }            
            
        }

        $nuevoCriterio = true;

        if(!$existe){//corrigendo el desmadre de sindicato
            if($existe=file_exists($rutaParcial.$carpeta.'S033 '.$periodo.' Sindicato/ASIM 1 PRUEBA_'.$clave.".pdf"))
                $nuevoCriterio = "sindicato";
        }

        if(!$existe){//corrigendo el desmadre de sindicato
            if($existe=file_exists($rutaParcial.$carpeta.'S033 '.$periodo.' Sindicato/S033 '.$periodo.'_'.$clave.".pdf"))
                $nuevoCriterio = "sindicato2";
        }
   
        echo json_encode(array('clave'=>$clave,'registro' => trim($registroActual),'departamento' => $departamento,'retimbrado'=>$i,'existe' => $existe,'orden'=>$nuevoCriterio,'errores'=>$registro));
    }



    public static function completarRuta2($rutaParcial,$periodo,$tipo,$formato,$idUsuario){
        $i=1;
        $clave = RutasDescargasModel::obtenerClave($idUsuario,Tablas::usuarios());
        $existe=false;
        $extension = $formato == 0 ? 'pdf' : 'xml';
        $carpeta='ASIM/';
        if($tipo == 0)
            $carpeta='SYS/';
        for($i=1;$i<=3;$i++){
            if($existe=file_exists($rutaParcial.$carpeta.'S033 '.$periodo."/NOM S033 ".$periodo." - ".$clave."_".$i.".".$extension)){
                break;
            }
        }
        echo json_encode(array('clave'=>$clave,'retimbrado'=>$i,'existe' => $existe,'orden'=>false));
    }

}



#MUESTRA EL REGISTRO PATRONAL Y EL DEPARTAMENTO DEL EMPLEADO   ///mejorrar este metodo con un inner join
    /*public static function completarRuta($rutaParcial,$periodo,$tipo,$formato,$idUsuario){

        $registroActual='';
        $i=1;
        $clave = RutasDescargasModel::obtenerClave($idUsuario,Tablas::usuarios());
        $departamento = trim(RutasDescargasModel::obtenerDepartamento($clave,TablasGiro::empdep()));
        $carpeta='ASIM/';
        $existe;

        $extension = $formato == 0 ? 'pdf' : 'xml';
        

        if($tipo == 0){

            $carpeta='SYS/';
            $registro = RutasDescargasModel::obtenerRegistro($clave,TablasGiro::patronales());

            foreach ($registro as $row => $item){ //pueden existir varios registros patronales
                if($existe=file_exists($rutaParcial.$carpeta.'S033 '.$periodo.'/RP '.trim($item['REGISTRO_PATRONAL'])."/Depto ".$departamento."/NOM S033 ".$periodo." - ".$clave."_1.".$extension)){
                    $registroActual=trim($item['REGISTRO_PATRONAL']);
                    break;
                }
            }

            if(empty($registroActual)){ // sí el archivo no termina en _1.pdf significa que se volvio a timbrar con el número consecutivo, por lo cual vuelvo a buscarlo en un rango de _2 a _5
                $flag=true;
                for($i=2;$i<=5;$i++){
                    if($flag){
                        foreach ($registro as $row => $item){ //el archivo se pudo volver a timbrar por lo cual no necesariamente termine en _1
                            if($existe=file_exists($rutaParcial.$carpeta.'S033 '.$periodo.'/RP '.trim($item['REGISTRO_PATRONAL'])."/Depto ".$departamento."/NOM S033 ".$periodo." - ".$clave."_".$i.".".$extension)){
                                $registroActual=trim($item["REGISTRO_PATRONAL"]);
                                $flag=false;
                                break;
                            }
                        }
                    }
                    else{
                        break;
                    }
                }   
            }
        }

        else{
            $registroActual='A0000000000';
            if($existe=file_exists($rutaParcial.$carpeta.'S033 '.$periodo.'/RP '.$registroActual."/Depto ".$departamento."/NOM S033 ".$periodo." - ".$clave."_1.".$extension)){
                $i=1;
            }   
            else{
                for($i=3;$i<=6;$i++){
                    if($existe=file_exists($rutaParcial.$carpeta.'S033 '.$periodo.'/RP '.$registroActual."/Depto ".$departamento."/NOM S033 ".$periodo." - ".$clave."_".($i-1).".".$extension)){
                         break;
                    }
                }     
            }
        }
        $i = $i == 1 ? 1 : $i-1;

        echo json_encode(array('clave'=>$clave,'registro' => $registroActual,'departamento' => $departamento,'retimbrado'=>$i,'existe' => $existe,'orden'=>true));
    }*/

    
   /* public static function completarRuta2($rutaParcial,$periodo,$tipo,$formato,$idUsuario){
        $i=1;
        $clave = RutasDescargasModel::obtenerClave($idUsuario,Tablas::usuarios());
        $existe;
        $extension = $formato == 0 ? 'pdf' : 'xml';
        $carpeta='ASIM/';
        if($tipo == 0)
            $carpeta='SYS/';
        
        if(!$existe=file_exists($departamento=$rutaParcial.$carpeta.'S033 '.$periodo."/NOM S033 ".$periodo." - ".$clave."_1.".$extension)){ // sí el archivo no termina en _1.pdf significa que se volvio a timbrar con el número consecutivo, por lo cual vuelvo a buscarlo en un rango de _2 a _5
            $flag=true;
            for($i=2;$i<=5;$i++){
                if($flag){
                    foreach ($registro as $row => $item){ //el archivo se pudo volver a timbrar por lo cual no necesariamente termine en _1
                        if($existe=file_exists($rutaParcial.$carpeta.'S033 '.$periodo."/NOM S033 ".$periodo." - ".$clave."_".$i.".".$extension)){
                            $flag=false;
                            break;
                        }
                    }
                }
                else{
                    break;
                }
            }   
        }

        echo json_encode(array('clave'=>$clave,'retimbrado'=>$i,'existe' => $existe,'orden'=>false));
     
    }*/