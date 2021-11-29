<?php

declare(strict_types=1);

namespace  App\Repositories\Eloquent;

use App\Models\Payment;

class PaymentRepository extends BaseRepository
{
    public function __construct(Payment $model)
    {
        $this->model = $model;
    }

    public function getAllPayment()
    {
        $data = $this->model->orderBy('name', 'asc')->get();
        return $data;
    }

    public function getById($id = 0) 
    {
        $data = $this->model->where('id','=',$id)->first();

        return $data;
    }
}
