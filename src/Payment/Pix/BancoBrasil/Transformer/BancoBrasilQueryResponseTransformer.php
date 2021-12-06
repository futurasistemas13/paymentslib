<?php

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Transformer;

use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\AbstractBancoBrasilTransformer;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Entity\Returns;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Response\BancoBrasilQueryResponse;
use Futuralibs\Paymentslib\Type\BancoBrasil\TypeBancoBrasilReturnStatus;

final class BancoBrasilQueryResponseTransformer extends AbstractBancoBrasilTransformer
{
    /**
     * @param array $object
     * @return BancoBrasilQueryResponse
     */
    public function transformFromObject($object): BancoBrasilQueryResponse
    {
        $bancoBrasilResponse = new BancoBrasilQueryResponse();
        $bancoBrasilResponse
            ->setEndToEndId($object['endToEndId'])
            ->setTxid($object['txid']??null)
            ->setValor($object['valor'])
            ->setHorario($object['horario'])
            ->setInfoPagador($object['infoPagador']);

        $this->setCLient($bancoBrasilResponse->Pagador(), $object['pagador']);

        if (isset($object['devolucoes']) && (count($object['devolucoes']) > 0)) {

            foreach ($object['devolucoes'] as $devolucoes) {
                $returns = new Returns();
                $returns
                    ->setId($devolucoes['id'])
                    ->setRtrId($devolucoes['rtrId'])
                    ->setValor($devolucoes['valor'])
                    ->setStatus(TypeBancoBrasilReturnStatus::from($devolucoes['status']));

                if (isset($devolucoes['horario']['solicitacao'])) {
                    $returns->Horario()->setSolicitacao($devolucoes['horario']['solicitacao']);
                }

                if (isset($devolucoes['horario']['liquidacao'])) {
                    $returns->Horario()->setLiquidacao($devolucoes['horario']['liquidacao']);
                }

                $bancoBrasilResponse->Devolucoes()->add($returns);
            }

        }

        return $bancoBrasilResponse;
    }
}