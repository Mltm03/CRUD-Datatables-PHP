<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_registro extends Model
{
    var $db1;
    public function __construct()
    {
        $db1 = \Config\Database::connect('default');
        $this->db1 = $db1;
    }

    // al igualar un argumento con null lo volvemos opcional
    public function getlistteachersjson($parentsID = null)
    {
        $builder = $this->db1->table('cprueba c');
        $builder->select('c.*');
        $builder->orderBy('c.ID', 'DESC');  
        if ($parentsID != null) {
            $builder->where(['c.ID' => $parentsID]); //esta condicion where toma como un string plano es decir columan = valor
            //$builder->where('p.parentsID', $parentsID); //esta condicion where toma como un string idependientes columan, valor
        }
        $query = $builder->get();
        return $query ? $query->getResult() : false;
    }
}
