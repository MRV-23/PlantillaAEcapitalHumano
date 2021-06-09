<?php
class Notificaciones{

    static function mostrarNotificaciones(){
        $respuesta = NotificacionesModel::mostrarNotificaciones(Tablas::configuraciones());
        return $respuesta;
    }

    static function aceptarNotificaciones(){
        $respuesta = NotificacionesModel::aceptarNotificaciones(Tablas::configuraciones());
        if($respuesta)
            $_SESSION['notificaciones'] = 0;
        return $respuesta;
    }
}