<?php namespace App\Models;

use CodeIgniter\Model;

class PlayerModel extends Model
{
    protected $table      = 'players';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id','name', 'team_id','speed','defending','tackling','passing','playmaking','scoring','keeping','age','form','resistance'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $dateFormat       = 'int';

}