<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

use App\Models\Order;

class OrdersRepository extends BaseRepository
{
    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function getOrderById($id) :?Collection
    {
        $results = $this->model
        ->select(
            'orders.*'           
        )
        ->with('user')
        ->with('OrdersList')
        ->where('orders.id','=',$id)        
        ->get();
    
        return $results;
    }

    public function getOrderByAdsId($id,$section) :?Collection
    {
        $results = $this->model
        ->select(
            'orders.*'           
        )
        
        ->with('OrderList')
        ->where('orders.addons_id','=',$id)        
        ->where('orders.section','=',$section)        
        ->get();
        //dd($results);
        return $results;
    }
}
