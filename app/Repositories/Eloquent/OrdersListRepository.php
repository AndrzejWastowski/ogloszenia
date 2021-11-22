<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

use App\Models\OrderList;

class OrdersListRepository extends BaseRepository
{
    public function __construct(OrderList $model)
    {
        $this->model = $model;
    }

    public function getOrderListyById()
    {
        $data = $this->model->orderBy('name', 'asc')->get();
        return $data;
    }
}
