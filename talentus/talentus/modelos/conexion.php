<?php

class Conexion{

	static public function conectar(){

		try {
			$link = new PDO("mysql:host=localhost;dbname=talentus_sistema",
				"talentus_sistema",
				"talentus2022c",
				array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
				);

			return $link;

			
		} catch (Exception $e) {

			echo "No se puede conectar";
			
		}


	}


}


