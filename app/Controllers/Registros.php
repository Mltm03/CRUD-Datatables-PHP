<?php

namespace App\Controllers;

use App\Models\Model_global;
use App\Models\Model_registro; 
class Registros extends BaseController {
    
    //CREAR VARIABLES LOCALES PARA TRABJAR 
    var $mdl_registro;
    var $mdl_global;
    public function __construct(){
        
        $this->mdl_registro =new Model_registro(); 
        $this->mdl_global=new Model_global();
        session_start(); 
    }

    public function getlistJSON()
    {
        $result_query = $this->mdl_registro->getlistteachersjson();
        $array_registro1 = array();
        if ($result_query) {
            //recorrer el query
            foreach ($result_query as $row) {
                /* 'Nombre a asignar en mi tabla vista' => nombre de la columna en la BD */
                $array_result = array(
                    'id' => $row->id,
                    'clave' => $row->clave,
                    'fecha_captura' => $row->fecha_captura,
                    'vigencia' => $row->vigencia,
                    
                );
                array_push($array_registro1, $array_result);
            }
        }
        echo '{"data":' . json_encode($array_registro1) . '}';
    }

    public function delete(){
        //recuperar los datos a eliminar
        $id = $this->request->getPost('id');

        $delete = $this->mdl_global->delete_row('cprueba', 'id', $id);
        if (!$delete) {
            $response = [
                'estado' => 'error',
                'salida' => 'No se pudo eliminar.'
            ];
        } else {
            $response = [
                'estado' => 'exito',
                'salida' => 'Datos eliminados correctamente.'
            ];
        }
        return $this->response->setJSON($response);
        
    }
}
