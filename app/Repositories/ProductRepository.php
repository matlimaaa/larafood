<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\ProductRepositoryInterface;


class ProductRepository implements ProductRepositoryInterface
{
    private $table;
    public function __construct()
    {
        $this->table = 'products';
    }

    public function getProductsByTenantId(int $idTenant)
    {
        return DB::table($this->table)->where('tenant_id', $idTenant)->get();
    }
}