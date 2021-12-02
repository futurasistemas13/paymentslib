<?php

namespace Futuralibs\Paymentslib\Validator;

use Symfony\Component\Validator\Validation;

class BaseValidator
{

    /**
     * @param mixed $entity
     * @return array
     */
    public function validateBase(mixed $entity): array
    {
        $validatorObject = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->addDefaultDoctrineAnnotationReader()
            ->getValidator();
        $errorList = $validatorObject->validate($entity);

        $fieldError = array();
        foreach ($errorList as $error){
            $fieldError[$error->getPropertyPath()] = $error->getMessage();
        }
        return $fieldError;
    }

}