<?php

require_once "conexion.php";

class ModeloGps
{


    /*=============================================
	MOSTRAR DISPOSITIVOS
	=============================================*/

    static public function mdlMostrarGps($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }


    /*=============================================
	CREAR GPS
	=============================================*/

    static public function mdlIngresarGps($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(modelo, imei) VALUES (:modelo, :imei)");

        $stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
        $stmt->bindParam(":imei", $datos["imei"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return 1;
        } else {

            return 0;
        }

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
	ELIMINAR GPS
	=============================================*/

    static public function mdlEliminarGps($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return 1;
        } else {

            return 0;
        }

        $stmt->close();

        $stmt = null;
    }
}
