<?php namespace App\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
    protected $table      = 'teams';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'user_id','money','country','active'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $beforeInsert = ['defaultValues'];

    protected $validationRules    = [
        'name' => 'required|min_length[3]|alpha_numeric_space',
    ];
    protected $validationMessages = [
        'name'        => [
            'required' => 'Numele trebuie sa contina cel putin 3 caractere.',
            'min_length' => 'Numele trebuie sa contina cel putin 3 caractere.',
            'alpha_numeric_space' => 'Poti folosi doar litere(A-Za-z) , cifre(0-9) si spatiu in numele echipei.'
        ] 
    ];
    protected $skipValidation     = false;

    protected $dateFormat       = 'int';

    protected function defaultValues(array $data)
    {
        
        $data['data']['active'] = 0;
        $data['data']['money'] = 2500000;

        return $data;
    }



}