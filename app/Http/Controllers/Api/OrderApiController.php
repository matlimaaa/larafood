<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Http\Requests\StoreOrder;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Requests\Api\TenantFormRequest;

class OrderApiController extends Controller
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(StoreOrder $request)
    {
        $order = $this->orderService->createNewOrder($request->all());
        return new OrderResource($order);
    }

    public function show($identify){
        if(!$order = $this->orderService->getOrderByIdentify($identify))
            return response()->json(['message' => 'Order Not Found'], 404);
        
        return new OrderResource($order);
    }

    public function myOrders(){
        $orders = $this->orderService->ordersByClient();
        return OrderResource::collection($orders);
    }
}
