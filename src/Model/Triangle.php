<?php declare(strict_types=1);

namespace App\Model;

class Triangle
{

    public static string $name = 'triangle';
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
        if ($a + $b <= $c || $a + $c <= $b || $b + $c <= $a) {
            throw new \ArithmeticError('Impossible triangle');
        }

        $this->perimeter = $this->calcPerimeter();
        $this->area = $this->calcArea();
    }

    private function calcPerimeter(): float
    {
        return $this->a + $this->b + $this->c;
    }

    private function calcArea(): float
    {
        $s = $this->perimeter / 2;
        return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
    }
}
