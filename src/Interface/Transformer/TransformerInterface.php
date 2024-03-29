<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Interface\Transformer;

interface TransformerInterface
{
    public function transformFromObject($object);
    public function transformFromObjects(iterable $objects): iterable;
}