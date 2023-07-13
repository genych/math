<?php declare(strict_types=1);

namespace App\Model;

class Triangle
{
    public readonly string $type;
    public readonly float $area;
    public readonly float $perimeter;

    /**
     * @throws \ArithmeticError
     */
    public function __construct(
        public readonly float $a,
        public readonly float $b,
        public readonly float $c,
    ) {
        if ($a <= 0 || $b <= 0 || $c <= 0 || $a + $b <= $c || $a + $c <= $b || $b + $c <= $a) {
            throw new \ArithmeticError('Impossible triangle');
        }

        $this->perimeter = $this->calcPerimeter();
        $this->area = $this->calcArea();
        $this->type = 'triangle';
    }

    private function calcPerimeter(): float
    {
        return $this->a + $this->b + $this->c;
    }

    private function calcArea(): float
    {
        $s = $this->perimeter / 2;
        // Heron's formula
        return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
    }
}
