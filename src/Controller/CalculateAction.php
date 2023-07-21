<?php

declare(strict_types=1);

namespace App\Controller;

use App\Request\CalculatorRequest;
use App\Service\Calculator;
use Jrm\RequestBundle\MapRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(
    '/calculate',
    name: 'app.calculate',
    methods: [Request::METHOD_POST],
)]
final class CalculateAction extends AbstractController
{
    public function __construct(
        private readonly Calculator $calculator,
    ) {
    }

    public function __invoke(#[MapRequest] CalculatorRequest $request): Response
    {
        try {
            $expression = $this->calculator->calculate($request);
            $this->addFlash('success', $expression);
        } catch (\Throwable $e) {
            $this->addFlash('error', $e->getMessage());
        }

        return $this->redirectToRoute('app.get_calculator_page');
    }
}