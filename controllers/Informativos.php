<?php
class Informativos{

    public static function mostrarInformativos(){
        return InformativosModel::mostrarInformativos(Tablas::informativo_costos());
    }

    public static function actualizarInformativo($campo,$valor){
        return InformativosModel::actualizarInformativo($campo,$valor,Tablas::informativo_costos());
    }

}