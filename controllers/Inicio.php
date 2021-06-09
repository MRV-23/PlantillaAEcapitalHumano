<?php
class Inicio{
    public function cumpleanos(){
        $respuesta = InicioModel::cumpleanos(Tablas::usuarios());
        $html ='';
        $html = '<div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-birthday-cake icono-encabezado"></i> Cumpleaños</h3>
                    <div class="box-tools pull-right">
                        <span class="label" style="font-size: 12px; color: #fff; background: #2789A5;">'.count($respuesta).' compañeros</span>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                  <p class="textoMay" style="font-size: 18px;text-align: center;">mes de '.MetodosDiversos::obtenerMes(date('m')). '</p>
                  <ul class="users-list clearfix">';
                        foreach ($respuesta as $row => $item){
                            $css='';
                            if($item['dia'] == date('d') AND $item['mes'] == date('m')){
                                $cumpleanos =  'HOY';
                                $css='style="font-size: 12px; color: #fff; background: #2789A5;"';
                            }
                            else{
                            $cumpleanos =  $item['dia'].' de '.MetodosDiversos::obtenerMes($item['mes']);
                            }
                            
                            if($item['imagen']){
                                $imagen = "views/imagenes-usuarios/".$item['imagen'];
                                $imagenMini = "views/imagenes-usuarios/mini/".$item['imagen'];
                            }
                            
                            else{
                                $imagen = $imagenMini = 'views/img/user2.png';
                            }
                            
                        $html.='<li>
                                    <img rel="grupo-1" src="'.$imagenMini.'" alt="'.$imagen.'" class="visor-crow-imagen" title="'.$item['nombre'].' '.$item['paterno'].' '.$item['materno'].'" style="cursor: pointer;" fecha="'.$cumpleanos.'">
                                    <span class="users-list-name" >'. $item['nombre'].'</span>
                                    <span class="users-list-date" '.$css.'>'. $cumpleanos .'</span>
                                    <span class="users-list-name" style="font-size: 10px;">'.Sucursales::traducirSucursalesModel($item["id_sucursal"],Tablas::sucursales()).'</span>
                                </li>';
                        }  
        $html.=  '</ul>
                        <!-- /.users-list -->
                </div>
                        <!-- /.box-body -->
                <div class="box-footer text-center">
                </div>';
                      
        echo $html;
    }

    public function aniversarios(){
        $respuesta = InicioModel::aniversarios(Tablas::usuarios());
        $anio = date('Y');
        $mes = date('m');
        $dia = date('d');
        $elementos='';
        $total = 0;

        foreach ($respuesta as $row => $item){
            if($dia >= 26 AND $mes == 12){ //cuando se aproxime el cambio de año
                $anio = date('Y');
                if($item['mes'] == 1)
                    $anio++;
            }
            if( $anio - $item['anio'] >= 1){
                $css='';
                if($item['dia'] == $dia AND $item['mes'] == $mes){
                    $aniversario =  'HOY';
                    $css='style="font-size: 12px; color: #fff; background: #2789A5;"';
                }
                else{
                    $aniversario =  $item['dia'].' de '.MetodosDiversos::obtenerMes($item['mes']);
                }

                if($item['imagen']){
                    $imagen = "views/imagenes-usuarios/".$item['imagen'];
                    $imagenMini = "views/imagenes-usuarios/mini/".$item['imagen'];
                }
                else
                    $imagen = $imagenMini = 'views/img/user2.png';

                $antiguedad = $anio - $item['anio'];
                $postfijo = $antiguedad > 1 ? ' Años' : ' Año';
                
                $elementos.='<li>
                                <img rel="grupo-2" src="'.$imagenMini.'" alt="'.$imagen.'" class="visor-crow-imagen" title="'.$item['nombre'].' '.$item['paterno'].' '.$item['materno'].'" style="cursor: pointer;" fecha="'.$aniversario.'">
                                <span class="users-list-name">'. $item['nombre'].'</span>
                                <span class="users-list-date" '.$css.'>'. $aniversario .'</span>
                                <span class="users-list-date">'.$antiguedad.$postfijo.'</span>
                                <span class="users-list-name" style="font-size: 10px;">'.Sucursales::traducirSucursalesModel($item["id_sucursal"],Tablas::sucursales()).'</span>
                            </li>';
                $total++;
            } 
        } 
        
        echo $html ='<div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-calendar-check-o icono-encabezado-green"></i> Aniversarios</h3>

                        <div class="box-tools pull-right">
                        <span class="label label-success" style="font-size: 12px;">'.$total.' compañeros</span>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <p class="textoMay" style="font-size: 18px;text-align: center;">mes de '. MetodosDiversos::obtenerMes(date('m')).'</p>
                         <ul class="users-list clearfix">'.
                            $elementos
                        .'</ul>
                        <!-- /.users-list -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                    </div>';

    }
    
}



