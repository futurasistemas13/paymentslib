<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Transformer;

use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\AbstractBancoBrasilTransformer;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Response\BancoBrasilResponse;
use Futuralibs\Paymentslib\Type\BancoBrasil\TypeBancoBrasilStatus;

final class BancoBrasilResponseTransformer extends AbstractBancoBrasilTransformer
{
    /**
     * @param array $object
     * @return BancoBrasilResponse
     * @throws \Exception
     */
    public function transformFromObject($object): BancoBrasilResponse
    {
        $bancoBrasilResponse = new BancoBrasilResponse();
        $bancoBrasilResponse
            ->Calendario()
                ->setCriacao(new \DateTime($object['calendario']['criacao']))
                ->setExpiracao($object['calendario']['expiracao']);

        $this->setCLient($bancoBrasilResponse->Devedor(), $object['devedor']);

        $bancoBrasilResponse
            ->Valor()
                ->setOriginal($object['valor']['original']);

        $bancoBrasilResponse
            ->setStatus(TypeBancoBrasilStatus::find($object['status']))
            ->setLocation($object['location'])
            ->setTxid($object['txid'])
            ->setRevisao($object['revisao'])
            ->setSolicitacaoPagador($object['solicitacaoPagador'])
            ->setChave($object['chave']);

        return $bancoBrasilResponse;
    }
}