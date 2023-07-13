<?php declare(strict_types=1);

namespace App\Model;

use PHPUnit\Framework\TestCase;

// todo: cover all sides
class TriangleTest extends TestCase
{
    public function testImpossible():void
    {
        $this->expectException(\ArithmeticError::class);
        new Triangle(10, 1, 1);
    }

    public function testNoSide():void
    {
        $this->expectException(\ArithmeticError::class);
        new Triangle(0, 1, 1);
    }

    public function testNegativeSide():void
    {
        $this->expectException(\ArithmeticError::class);
        new Triangle(1, -1, 1);
    }

    public function testPerimeter(): void
    {
        $t = new Triangle(2, 2, 3);
        self::assertEquals(7, $t->perimeter);
    }

    public function testArea(): void
    {
        $t = new Triangle(1, 1, sqrt(2)); // half square
        self::assertEqualsWithDelta(0.5, $t->area, 0.001);
    }
}
