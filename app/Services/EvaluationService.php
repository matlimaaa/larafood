<?php

namespace App\Services;

use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\EvaluationRepositoryInterface;

class EvaluationService
{
    private $evaluationRepository, $orderRepository;

    public function __construct(
        EvaluationRepositoryInterface $evaluationRepository,
        OrderRepositoryInterface $orderRepository)
    {
        $this->evaluationRepository = $evaluationRepository;
        $this->orderRepository = $orderRepository;
    }

    public function createNewEvaluation(string $identifyOrder, array $evaluation) {
        $client_id = $this->getIdClient();
        $order = $this->orderRepository->getOrderByIdentify($identifyOrder);
        
        return $this->evaluationRepository->newEvaluationOrder($order->id, $client_id, $evaluation);
    }

    private function getIdClient()
    {
        return auth()->user()->id;
    }
}