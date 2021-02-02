<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;


/**
* Interface EloquentRepositoryInterface
* @package App\Repositories
*/
interface EloquentRepositoryInterface
{
   /**
    * @param array $attributes
    * @return Model
    */
   public function create(array $data): Model;
   /**
    * @param $id
    * @return Model
    */
   public function find($id): ?Model;
   /**
    * @param $id
    * @return bool
    */
    /*
   public function update(array $data, $id):bool;
   /**
    * @param $id
    * @return bool
    */
    
   public function delete($id):bool;

   public function getAll($columns = array('*'));

   
}