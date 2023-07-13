<?php declare(strict_types=1);

namespace App\Service;

use App\Model\Circle;
use App\Model\Triangle;
use PHPUnit\Framework\TestCase;

// todo: same for diameters
class GeometryCalculatorServiceTest extends TestCase
{
    public function testSumAreas(): void
    {
        $service = new GeometryCalculatorService();

        $t = new Triangle(100, 10, 109.9999);
        $c = new Circle(100500.001);

        self::assertEquals($t->area, $service->sumAreas($t));

        self::assertEqualsWithDelta($t->area * 2, $service->sumAreas($t, $t), .001);
        self::assertEqualsWithDelta($t->area + $c->area, $service->sumAreas($t, $c), .001);
    }
}
