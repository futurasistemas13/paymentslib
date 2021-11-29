<?php
declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use Futuralibs\Paymentslib\Type\TypeEnvironment;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\BancoBrasilConfiguration;
use Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\BancoBrasilMethods;


$bbConfig = new BancoBrasilConfiguration(TypeEnvironment::SandBox);
$bbConfig
        ->setApplicationKey('d27ba7790effab301362e17d90050e56b991a5b7')
        ->setClientId('eyJpZCI6IjliODZkOCIsImNvZGlnb1B1YmxpY2Fkb3IiOjAsImNvZGlnb1NvZnR3YXJlIjoyNDUzNiwic2VxdWVuY2lhbEluc3RhbGFjYW8iOjF9')
        ->setClientSecret('eyJpZCI6ImFlNTlkNGMtMDE1Mi00MTU5LTg5ZGUtZTc2Nzc3MTg2M2NmNGIyN2Q1OWMtIiwiY29kaWdvUHVibGljYWRvciI6MCwiY29kaWdvU29mdHdhcmUiOjI0NTM2LCJzZXF1ZW5jaWFsSW5zdGFsYWNhbyI6MSwic2VxdWVuY2lhbENyZWRlbmNpYWwiOjEsImFtYmllbnRlIjoiaG9tb2xvZ2FjYW8iLCJpYXQiOjE2MzU5NDkxMzI4MTN9')
        ->setBasic('Basic ZXlKcFpDSTZJamxpT0Raa09DSXNJbU52WkdsbmIxQjFZbXhwWTJGa2IzSWlPakFzSW1OdlpHbG5iMU52Wm5SM1lYSmxJam95TkRVek5pd2ljMlZ4ZFdWdVkybGhiRWx1YzNSaGJHRmpZVzhpT2pGOTpleUpwWkNJNkltRmxOVGxrTkdNdE1ERTFNaTAwTVRVNUxUZzVaR1V0WlRjMk56YzNNVGcyTTJObU5HSXlOMlExT1dNdElpd2lZMjlrYVdkdlVIVmliR2xqWVdSdmNpSTZNQ3dpWTI5a2FXZHZVMjltZEhkaGNtVWlPakkwTlRNMkxDSnpaWEYxWlc1amFXRnNTVzV6ZEdGc1lXTmhieUk2TVN3aWMyVnhkV1Z1WTJsaGJFTnlaV1JsYm1OcFlXd2lPakVzSW1GdFltbGxiblJsSWpvaWFHOXRiMnh2WjJGallXOGlMQ0pwWVhRaU9qRTJNelU1TkRreE16STRNVE45');


$bbMethods = new BancoBrasilMethods($bbConfig);
try {
    var_dump($bbMethods->generateToken());
} catch (\Futuralibs\Paymentslib\Exception\HttpRequestException $e) {
    var_dump($e->getMessage());
}