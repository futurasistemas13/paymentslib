<?php

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil;

use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Entity\Client;
use Futuralibs\Paymentslib\Transformer\AbstractTransformer;

abstract class AbstractBancoBrasilTransformer extends AbstractTransformer
{

    /**
     * @param Client $client
     * @param $object
     */
    public function setCLient(Client $client, $object)
    {
        if (isset($object['cpf'])) {
            $client
                ->setCpf($object['cpf']);
        } else {
            $client
                ->setCpf($object['cnpj']);
        }

        $client
            ->setNome($object['nome']);
    }

}