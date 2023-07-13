<?php declare(strict_types=1);

namespace App\Model;

class Circle
{
    public static string $name = 'circle';
    public readonly float $area;
    public readonly float $circumference;

    /**
     * @throws \ArithmeticError
     */
    public function __construct(public readonly float $radius)
    {
        if ($this->radius <= 0) {
            throw new \ArithmeticError('radius must be positive');
        }

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
