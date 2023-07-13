<?php declare(strict_types=1);

namespace App\Model;

use PHPUnit\Framework\TestCase;

class CircleTest extends TestCase
{
    public function testNegative(): void
    {
        $this->expectException(\ArithmeticError::class);
        new Circle(-.1);
    }
    public function testCircumference(): void
    {
        $c = new Circle(1);
        self::assertEqualsWithDelta(2 * pi(), $c->circumference, 0.001);
    }

    public function testArea(): void
    {
        $c = new Circle(1);
        self::assertEqualsWithDelta(pi(), $c->area, 0.001);
    }
}
