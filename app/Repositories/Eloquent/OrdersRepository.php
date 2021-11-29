<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

use App\Models\Order;

class OrdersRepository extends BaseRepository
{
    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function getOrderById($id) :?Order
    {
        $results = $this->model
        ->select(
            'orders.*'           
        )
        ->with('User')
        ->with('OrderList')
        ->where('orders.id','=',$id)        
        ->first();
    
        return $results;
    }

    public function getOrderByAdsId($id,$section) :?Order
    {
        $results = $this->model
        ->select(
            'orders.*'           
        )
        ->with('OrderList')
        ->where('orders.addons_id','=',$id)        
        ->where('orders.section','=',$section)        
        ->first();
        
        return $results;
    }

    public function deleteOrderList()
    {
        dd($this->id);
        DB::table('order_list')->where('order_id', '=', $this->id)->delete(); 
    }
}
