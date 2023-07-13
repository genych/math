<?php declare(strict_types=1);

namespace App\Model;

class Circle
{
    public static string $name = 'circle';
    public readonly float $area;
    public readonly float $circumference;

    public function __construct(public readonly float $radius)
    {
        $this->area = $this->calcArea();
        $this->circumference = $this->calcCircumference();
    }

    private function calcCircumference(): float
    {
        return 2 * pi() * $this->radius;
    }

    private function calcArea(): float
    {
        return pi() * $this->radius * $this->radius;
    }
}
