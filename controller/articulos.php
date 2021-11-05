<?php
    
    header("Content-Type: application/json");

    require_once("../config/conexion.php");
    require_once("../models/articulos.php");
    $articulos = new Articulos();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){

        case "GetArticulos":
            $datos=$articulos->get_articulos();
            echo json_encode($datos);
        break;

        case "GetUno":
            $datos=$articulos->get_articulo($body["id"]);
            echo json_encode($datos);
        break;

        case "InsertArticulo":
            $datos=$articulos->insert_articulo($body["id"],$body["descripcion"],$body["unidad"],$body["costo"],
            $body["precio"],$body["aplica_isv"],$body["porcentaje_isv"],$body["estado"],$body["id_socio"]);
            echo json_encode("Articulo Agregado");
        break;

        case "DeleteArticulo":
            $datos=$articulos->delete_articulo($body["id"]);
            echo json_encode("Articulo Eliminado");
        break;

        case "UpdateArticulo":
            $datos=$articulos->update_articulo($body["id"],$body["descripcion"],$body["unidad"],$body["costo"],
            $body["precio"],$body["aplica_isv"],$body["porcentaje_isv"],$body["estado"],$body["id_socio"]);
            echo json_encode("Articulo Actualizado");
        break;
    }
?>