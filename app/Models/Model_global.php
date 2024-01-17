<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_global extends Model {
    var $db1;
    public function __construct() {
        $db1 = \Config\Database::connect('default');
        $this->db1 = $db1;
    }

    //funtion delete
    public function delete_row($table, $columna, $valor_columna)
    {
        $builder = $this->db1->table($table);
        $builder->where($columna, $valor_columna);
        return $builder->delete() ? true : false;
    }
}