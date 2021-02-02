<?php   
namespace App\Repositories\Eloquent;

use App\Repositories\EloquentRepositoryInterface; 
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface 
{     
    /**      
     * @var Model      
     */     
     protected $model;       

    /**      
     * BaseRepository constructor.      
     *      
     * @param Model $model      
     */     
    public function __construct(Model $model)     
    {         
        $this->model = $model;
    }
 
    /**
    * @param array $attributes
    *
    * @return Model
    */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /*
    public function update(array $data, $id):bool
    {
        return $this->model->where('id', '=', $id)->update($data);
    } 
    */   
    /**
    * @param $id
    * @return Model
    */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }


    public function getAll($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    /**
    * @param $id
    * @return Boolean
    */   
    public function delete($id): bool
    {
        return $this->model->destroy($id);
    }


}