<?php
class Conexion{
	public static function conectar(){
		try {
			//$conexion = new PDO ('mysql:host=192.168.0.10; dbname=asesores_empresariales','asesores','roselee2018',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
            $conexion = new PDO ('mysql:host=localhost; dbname=asesores_empresariales','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
            //echo 'Conexion OK';
            return $conexion;
        } catch (Exception $e) {
          //  die ('Error '.$e->GetMassage());
		  		echo"error en conexion";
        }
		/*try{
			$link = new PDO('mysql:host=127.0.0.1;dbname=asesores_empresariales', 'sistemaintranet' , 'sistemaintranet_aseem_2018@',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
			return $link;
		}
		catch(PDOException $e){
			return false;
		}*/
	}
}
