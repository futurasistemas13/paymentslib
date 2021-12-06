<?php

namespace Futuralibs\Paymentslib\Transformer;

use Futuralibs\Paymentslib\Interface\Transformer\TransformerInterface;

abstract class AbstractTransformer implements TransformerInterface
{
    public function transformFromObjects(iterable $objects): iterable
    {
        $transformer = [];

        foreach ($objects as $object){
            $transformer[] = $this->transformFromObject($object);
        }

        return $transformer;
    }
}