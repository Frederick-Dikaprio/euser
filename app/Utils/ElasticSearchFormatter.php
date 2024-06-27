<?php

namespace App\Utils;

use DateTime;
use App\Exceptions\ApiException;
use Monolog\Formatter\NormalizerFormatter;

class ElasticSearchFormatter extends NormalizerFormatter
{
    /**
     *
     * @param array $record
     * @return void
     */
    public function format(array $record)
    {
        $date = new DateTime();
        $exception = $record['context']['exception'];
        $trace = array_slice(explode("\n", $exception->getTraceAsString()), 0, 5);

        if (request()->has('alias')) {
            $formInput = [
                "alias" => request()->get('alias'),
                "ip" => request()->getClientIp(),
                "password" => "**********"
            ];
        }

        $cardNumber = request()->get('number');
        $lastFourDigits = substr($cardNumber, -4);

        // Remplacement des autres chiffres par des astérisques si la longueur du numéro de carte est suffisante
        if (!empty($cardNumber) && strlen($cardNumber) >= 4) {
            $maskedCardNumber = str_repeat('*', strlen($cardNumber) - 4) . $lastFourDigits;
        } else {
            $maskedCardNumber = 0; // Utilisez le numéro de carte original si la longueur est insuffisante
        }

        // Ajout du numéro de carte masqué au tableau $stripePayload
        $stripePayload = [
            "product_name" => request()->get('product_name'),
            "price_id" => request()->get('price_id'),
            "quantity" => request()->get('quantity'),
            "city" => request()->get('city'),
            "country" => request()->get('country'),
            "line1" => request()->get('line1'),
            "line2" => request()->get('line2'),
            "postal_code" => request()->get('postal_code'),
            "number" => $maskedCardNumber,
            "exp_month" => request()->get('exp_month'),
            "exp_year" => request()->get('exp_year'),
            "cvc" => "*****",
            "address" => request()->get('address'),
        ];

        //si dans l'erreur recu nous avons l'alias
        if (request()->get('alias') !== null) {
            //alors on utilise ce payload
            $payloadstripe = json_encode($formInput);
        } elseif (request()->get('product_name') !== null) {
            // sinon si nous avons le nom du produit, nous utilisons celui ci
            $payloadstripe = json_encode($stripePayload);
        } else {
            // sinon nous prenons la getContent
            $payloadstripe = request()->getContent();
        }

        $output = [
            "exception" => get_class($exception),
            "date" => $date->format('Y-m-d\TH:i:s.v'),
            "message" => $exception->getMessage(),
            "method" => request()->getMethod(),
            "payload" => $payloadstripe,
            "url" => [
                "full" => request()->getUri()
            ],
            "stacktrace" =>  implode(PHP_EOL, array_slice($trace, 0, 26))
        ];

        if ($exception instanceof ApiException) {
            $payload = $exception->getRequestPayload();

            if ($payload) {
                $payload = json_decode($exception->getRequestPayload());

                if (isset($payload->alias)) {
                    $formInput = [
                        "alias" => $payload->alias,
                        "ip" => $payload->ip,
                        "password" => "**********"
                    ];
                    $payload = json_encode($formInput);
                }
            }

            $output['third_party'] = [
                'url' => $exception->getRequestUrl(),
                'request' => $payload,
                'response' => $exception->getResponse()->body(),
            ];
        }

        return json_encode($output) . "\n";
    }
}
