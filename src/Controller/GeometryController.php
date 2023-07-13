<?php declare(strict_types=1);

namespace App\Controller;

use App\Model\Circle;
use App\Model\Triangle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;

class GeometryController extends AbstractController
{
    #[Route(path: "/triangle/{a}/{b}/{c}", methods: ["GET"])]
    public function getTriangle(mixed $a, mixed $b, mixed $c, ValidatorInterface $validator): JsonResponse
    {
        $constraint = new Assert\Collection([
            'a' => new Assert\Sequentially([new Assert\Type('numeric'), new Assert\Positive()]),
            'b' => new Assert\Sequentially([new Assert\Type('numeric'), new Assert\Positive()]),
            'c' => new Assert\Sequentially([new Assert\Type('numeric'), new Assert\Positive()]),
        ]);

        $errors = array_map(
            fn(ConstraintViolationInterface $x): string
                => "{$x->getPropertyPath()}={$x->getInvalidValue()}: {$x->getMessage()}",
            [...$validator->validate(compact('a', 'b', 'c'), $constraint)]
        );

        if ($errors) {
            return $this->json($errors, Response::HTTP_BAD_REQUEST);
        }

        return $this->json(new Triangle((float)$a, (float)$b, (float)$c));
    }

    #[Route(path: "/circle/{radius}", methods: ["GET"])]
    public function getCircle(mixed $radius, ValidatorInterface $validator): JsonResponse
    {
        $constraint = new Assert\Sequentially([new Assert\Type('numeric'), new Assert\Positive()]);
        $errors = array_map(
            fn(ConstraintViolationInterface $x): string => "radius={$x->getInvalidValue()}: {$x->getMessage()}",
            [...$validator->validate($radius, $constraint)]
        );

        if ($errors) {
            return $this->json($errors, Response::HTTP_BAD_REQUEST);
        }

        return $this->json(new Circle((float)$radius));
    }
}
