<?php
class Cursos{

    public static function inscribirse($curso){
        return CursosModel::inscribirse($curso,Tablas::cursantes());
    }

    public static function verificarRegistro($curso){
        return CursosModel::verificarRegistro($curso,Tablas::cursantes());
    }
}