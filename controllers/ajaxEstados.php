<?php
function estados($estado){
        $data = file_get_contents("estados-municipios.json");
        $estados = json_decode($data, true);
        $contenido="";

        $contenido='<select class="form-control textoMay" name="municipios" id="municipios" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,}">';
        for ($a=0;$a < (count($estados[$estado]) - 1) ;$a++){
            $value=$estados[$estado][$a];
             $contenido .= "<option value='$value'>$value</option>";
        }
                                                               
        $contenido.='</select>';
        echo $contenido;
}

if(isset($_POST["nombreEstado"])){
        if(!empty($_POST["nombreEstado"])){
            estados($_POST["nombreEstado"]);
        }
        else
            echo '<select class="form-control" readonly></option></select>';
}


