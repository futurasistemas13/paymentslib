<?php
declare(strict_types=1);

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Transformer;

use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\AbstractBancoBrasilTransformer;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Response\BancoBrasilQueryIdResponse;
use Futuralibs\Paymentslib\Type\BancoBrasil\TypeBancoBrasilStatus;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Response\BancoBrasilQueryResponse;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Transformer\BancoBrasilQueryResponseTransformer;

class BancoBrasilQueryIdResponseTransformer extends AbstractBancoBrasilTransformer
{

    private BancoBrasilQueryResponseTransformer $brasilQueryResponseTransformer;

    public function __construct()
    {
        $this->brasilQueryResponseTransformer = new BancoBrasilQueryResponseTransformer();
    }

    /**
     * @param array $object
     * @return BancoBrasilQueryIdResponse
     */
    public function transformFromObject($object): BancoBrasilQueryIdResponse
    {
        $bancoBrasilQueryIdResponse = new BancoBrasilQueryIdResponse();
        $bancoBrasilQueryIdResponse
            ->setStatus(TypeBancoBrasilStatus::find($object['status']))
            ->setLocation($object['location'])
            ->setTxid($object['txid'])
            ->setRevisao($object['revisao'])
            ->setSolicitacaoPagador($object['solicitacaoPagador'])
            ->setChave($object['chave']);

        if (isset($object['pix']) && (count($object['pix']) > 0)) {
            foreach ($object['pix'] as $pix) {

                $bancoBrasilQueryResponse = $this->brasilQueryResponseTransformer->transformFromObject($pix);

                $bancoBrasilQueryIdResponse->Pix()->add($bancoBrasilQueryResponse);

            }
        }

        return $bancoBrasilQueryIdResponse;
    }

}