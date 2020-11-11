<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['username', 'email','password'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $beforeInsert = ['hashPassword'];

    protected $validationRules    = [
        'username' => 'required|is_unique[users.username]|alpha_numeric_space',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[8]|no_space',
        'password_confirm' => 'required_with[password]|matches[password]',
    ];
    protected $validationMessages = [
        'email'        => [
            'is_unique' => 'Un alt cont exista cu acest email.',
            'required' => 'Ai nevoie de un email pentru a inregistra un cont.',
            'valid_email' => 'Foloseste un email valid pentru a te inregistra.',
        ] ,
        'password'  => [
            'min_length' => 'Foloseste o parola de cel putin 8 caractere.',
            'required' => 'Ai nevoie de o parola pentru a te inregistra.',
            'no_space' => 'Nu poti folosi " "(spatiu) in parola.',
        ] ,
        'username' => [
            'is_unique' => 'Acest nume de utilizator este folosit.',
            'required' => 'Ai nevoie de un nume de utilizator pentru a te inregistra.',
            'alpha_numeric_space' => 'Poti folosi doar litere(A-Za-z),cifre(0-9) sau spatiu in numele de utilizator.',
        ] ,
        'password_confirm' => [
            'matches' => 'Parola nu corespunde.',
            'required_with' => 'Te rugam sa confirmi parola pentru inregistrare.',
        ]
    ];
    protected $skipValidation     = false;

    protected $dateFormat       = 'int';

    

    public function auth($email,$password)
    {
        $result = $this->getWhere(['email'=>$email] , 1)->getFirstRow('array');
        
        if($result!==NULL){
            if(password_verify($password,$result['password']))
            {
                unset($result['password']);
                return $result;
            }
        }

        return NULL;
    }


    private function _hash($str)
    {
        return password_hash($str , PASSWORD_DEFAULT);
    }


    protected function hashPassword(array $data)
    {
        if (! isset($data['data']['password']))
            return $data;

        $data['data']['password'] = $this->_hash($data['data']['password']);

        return $data;
    }

}