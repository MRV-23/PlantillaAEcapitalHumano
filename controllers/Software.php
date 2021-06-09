<?php 

class Software{
    public static function nuevo($data){
        if($id=SoftwareModel::nuevo($data,Tablas::software())){
            return self::subirArchivos($id,$data["nombre"],$data["software"],$data["caratula"]);
        }
        return array('error'=>true,'tipo'=>'error','titulo'=>'Ocurrio un error','subtitulo'=>'Intenta de nuevo'); 
    }

    private static $archivoValido = array('jpg','jpeg','png');
    private static function subirArchivos($id,$nombre,$software,$caratula){
        $ruta = "../intranet/biblioteca-software/".$id;
        if(!file_exists($ruta))
            mkdir($ruta, 0777);
        $info = new SplFileInfo($software["name"]);
        $extension = strtolower($info->getExtension());
        $name = str_replace(" ", "-", $nombre).'_1.'.$extension;
        $src = $ruta."/".$name;       
        if(!move_uploaded_file($software["tmp_name"], $src))
            return array('error'=>true,'tipo'=>'error','titulo'=>'El software no pudo ser cargado','subtitulo'=>'Intenta de nuevo');
        $info = new SplFileInfo($caratula["name"]);
        $extension = strtolower($info->getExtension());
        if(in_array($extension,self::$archivoValido)){

            $name = str_replace(" ", "-", $nombre).'_2.'.$extension;
            $src = $ruta."/".$name;
            
            $origen = $extension === "png" ? imagecreatefrompng($caratula["tmp_name"]) : imagecreatefromjpeg($caratula["tmp_name"]);
				
            $x = imagesx($origen);  
			$y = imagesy($origen);  

			$i = imagecreatetruecolor(100,100);  
			if($ext === "png"){
				imagesavealpha($i, true);
				$alpha = imagecolorallocatealpha($i, 0, 0, 0, 127);
				imagefill($i, 0, 0, $alpha);
			}
			
            imagecopyresized($i, $origen, 0, 0, 0, 0, 100, 100, $x, $y);
            
			if($ext === "png")
                imagejpeg($i, $src);
            else
                imagepng($i, $src);
	
            imagedestroy($i);
            

            //move_uploaded_file($caratula["tmp_name"], $src); 
        }
        return array('error'=>false,'tipo'=>'success','titulo'=>'Registro guardado','subtitulo'=>'','data'=>self::mostrarRegistros());
    }

    public static function filesize_formatted($path) { 
        $bytes = filesize($path);
        if ($bytes >= 1073741824) 
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        elseif ($bytes >= 1048576) 
            $bytes = number_format($bytes / 1048576, 2) . ' MB'; 
        elseif ($bytes >= 1024) 
            $bytes = number_format($bytes / 1024, 2) . ' KB';  
        elseif ($bytes >= 1) 
            $bytes = $bytes . ' bytes';  
        else  
            $bytes = '0 bytes'; 
        return $bytes; 
    }

    public static function mostrarRegistros(){
        $respuesta = SoftwareModel::mostrarRegistros(Tablas::software());
        $html='';
        $contador=1;
        $caratula='';
        $archivo;
        foreach($respuesta as $row=>$item){
            $path = str_replace('\\', '/', dirname( __DIR__ )); 
            $ruta1 = "intranet/biblioteca-software/";
            $ruta2 = $path."/".$ruta1.$item['id'];
            foreach (glob($ruta2."/*_2*") as $nombre_fichero)
                $caratula=$nombre_fichero;
            foreach (glob($ruta2."/*_1*") as $nombre_fichero)
                $archivo=$nombre_fichero;
            
            $caratula = $caratula=="" ? $ruta1."sin-imagen.jpg" : $ruta1.$item['id']."/".basename($caratula) ;
           
            if($contador===4)
                $contador=1;

            if($contador===1)
                $html.='<div class="row">';
            
            $html.='<div class="col-md-4">
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="'.$caratula.'" alt="User profile picture">
                                <h3 class="profile-username text-center">'.$item['nombre'].'</h3>

                                <div class="box box-primary collapsed-box">
                                    <div class="box-header">
                                        <h4 class="box-title">Descripción</h4>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body no-padding">
                                        <p class="text-muted">'.$item['descripcion'].'</p>
                                    </div>
                                </div>

                                <ul class="list-group list-group-unbordered" style="margin-top:-20px;">
                                    <li class="list-group-item">
                                        <b>Fecha registro</b> <a class="pull-right">'.$item['fecha'].'</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Peso:</b> <a class="pull-right">'.self::filesize_formatted($archivo).'</a>
                                    </li>
                                </ul>
                                <a href="'.$ruta1.$item['id']."/".basename($archivo).'" download="'.basename($archivo).'" class="btn btn-primary btn-block"><b>Descargar</b></a>
                            </div>
                        </div>
                    </div>';

            if($contador===3)
                $html.='</div>';
            ++$contador;
        }
        return $html;
    }
}