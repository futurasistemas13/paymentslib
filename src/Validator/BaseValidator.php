<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Validator;

use Symfony\Component\Validator\Validation;

class BaseValidator
{

    private $validator;

    public function __construct()
    {
        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->addDefaultDoctrineAnnotationReader()
            ->getValidator();
    }

    /**
     * @param mixed $entity
     * @return array
     */
    public function validateBase(mixed $entity): array
    {
        $errorList = $this->validator->validate($entity);

        $fieldError = array();
        foreach ($errorList as $error){
            $fieldError[$error->getPropertyPath()] = $error->getMessage();
        }
        return $fieldError;
    }

}