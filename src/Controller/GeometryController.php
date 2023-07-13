<?php declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GeometryController extends AbstractController
{
    #[Route(path: "/triangle/{a}/{b}/{c}", methods: ["GET"])]
    public function getTriangle(float $a, float $b, float $c): JsonResponse
    {
        return $this->json([$a, $b, $c]);
    }

    #[Route(path: "/circle/{radius}", methods: ["GET"])]
    public function getCircle(float $radius): JsonResponse
    {
        return $this->json($radius);
    }
}
