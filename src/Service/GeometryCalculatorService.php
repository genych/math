<?php declare(strict_types=1);

namespace App\Service;

use App\Model\Circle;
use App\Model\Triangle;

class GeometryCalculatorService
{
    public function sumAreas(Triangle|Circle ...$shapes): float
    {
        return array_reduce(
            $shapes,
            fn(float $acc, Triangle|Circle $x) => $acc + $x->area,
            0
        );
    }

    public function sumDiameters(Circle ...$circles): float
    {
        return array_reduce(
            $circles,
            fn(float $acc, Circle $x) => $acc + $x->radius * 2,
            0
        );
    }
}
