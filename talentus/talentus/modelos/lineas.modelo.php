<?php

require_once "conexion.php";

class ModeloLineas
{


	/*=============================================
	MOSTRAR Lineas
	=============================================*/

	static public function mdlMostrarLineas($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR CAMBIOS LINEAS
	=============================================*/

	static public function mdlMostrarCambiosLineas($tabla, $item, $valor)
	{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

		$stmt = null;
	}

	/*=============================================
	CAMBIAR ESTADO LINEA
	=============================================*/

	static public function mdlActualizarLinea($tabla, $item1, $valor1, $item2, $valor2)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
		$stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return 1;
		} else {

			return 0;
		}

		$stmt->close();

		$stmt = null;
	}

	/*=============================================
	REGISTRAR LINEA
	=============================================*/

	static public function mdlIngresarLinea($tabla, $datos)
	{
		$dbh = Conexion::conectar();
		$stmt = $dbh->prepare("INSERT INTO $tabla(numero, sim_card, id_vehiculo, operador, estado) VALUES (:numero, :sim_card, :id_vehiculo, :operador, :estado)");

		$stmt->bindParam(":numero", $datos["numero"], PDO::PARAM_STR);
		$stmt->bindParam(":sim_card", $datos["sim_card"], PDO::PARAM_STR);
		$stmt->bindParam(":id_vehiculo", $datos["placa"], PDO::PARAM_STR);
		$stmt->bindParam(":operador", $datos["operador"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);


		if ($stmt->execute()) {
			$id = $dbh->lastInsertId();
			return $id;
		} else {

			return 0;
		}

		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	CREAR CAMBIOS LINEA
	=============================================*/

	static public function mdlIngresarCambios($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo_cambio, sim_card, numero, fecha_suspencion, fecha_suspencion_fin, id_linea, placa, id_usuario) VALUES (:tipo_cambio, :sim_card, :numero, :fecha_suspencion, :fecha_suspencion_fin, :id_linea, :placa, :id_usuario)");

		$stmt->bindParam(":tipo_cambio", $datos["tipo_cambio"], PDO::PARAM_STR);
		$stmt->bindParam(":sim_card", $datos["sim_card"], PDO::PARAM_STR);
		$stmt->bindParam(":numero", $datos["numero"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_suspencion", $datos["fecha_suspencion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_suspencion_fin", $datos["fecha_suspencion_fin"], PDO::PARAM_STR);
		$stmt->bindParam(":id_linea", $datos["id_linea"], PDO::PARAM_STR);
		$stmt->bindParam(":placa", $datos["placa"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datos["usuario"], PDO::PARAM_STR);



		if ($stmt->execute()) {

			return 1;
		} else {

			return 0;
		}

		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	EDITAR LINEA
	=============================================*/

	static public function mdlEditarLinea($tabla, $datos)
	{
		$dbh = Conexion::conectar();
		$stmt = $dbh->prepare("UPDATE $tabla SET numero = :numero, sim_card = :sim_card, id_vehiculo = :id_vehiculo, operador= :operador, estado = :estado WHERE id = :id");


		$stmt->bindParam(":numero", $datos["numero"], PDO::PARAM_STR);
		$stmt->bindParam(":sim_card", $datos["sim_card"], PDO::PARAM_STR);
		$stmt->bindParam(":id_vehiculo", $datos["placa"], PDO::PARAM_STR);
		$stmt->bindParam(":operador", $datos["operador"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return $datos["sim_card"];
		} else {

			return 0;
		}

		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	EDITAR 1 COLUMNA
	=============================================*/

	static public function mdlActualizar($tabla, $item1, $valor1, $item2, $valor2)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
		$stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return 1;
		} else {

			return 0;
		}

		$stmt->close();

		$stmt = null;
	}



	/*=============================================
	ELIMINAR LINEA
	=============================================*/

	static public function mdlEliminarLinea($tabla, $datos)
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
