<?php
    if($_SERVER['REQUEST_METHOD'] === 'OPTIONS'){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Acces-Control-Max-Age: 1728000');
        header('Content-Type: text/plain');
        die();
    }

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        require_once("../config/conexion.php");
        require_once("../models/Materiales.php");
        $material = new Material();

        $body = json_decode(file_get_contents("php://input"),true);

        switch($_GET["opcion"]){

            case "GetMateriales":
                $datos=$material->get_materiales();
                echo json_encode($datos);
            break;

            case "GetMaterial":
                $datos=$material->get_material($body["ID"]);
                echo json_encode($datos);
            break;

            case "InsertMaterial":
                $datos=$material->insert_material($body["ID"],$body["DESCRIPCION"],$body["UNIDAD"],$body["COSTO"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"],$body["ESTADO"],$body["ID_SOCIO"]);
                echo json_encode("Material Agregado");
            break;

            case "UpdateMaterial":
                $datos=$material->update_material($body["ID"],$body["DESCRIPCION"],$body["UNIDAD"],$body["COSTO"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"],$body["ESTADO"],$body["ID_SOCIO"]);
                echo json_encode("Material Actualizado");
            break;

            case "DeleteMaterial":
                $datos=$material->delete_material($body["ID"]);
                echo json_encode("Material Borrado");
            break;
        }

?>