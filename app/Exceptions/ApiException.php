<?php

namespace App\Exceptions;

use Illuminate\Http\Client\Response;

class ApiException extends \RuntimeException
{
    /**
     * API request URL
     *
     * @var string
     */
    protected $url;

    /**
     * API request payload
     *
     * @var string
     */
    protected $payload;

    /**
     * API response object
     *
     * @var Response
     */
    protected $response;

    public function setRequestUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    public function setRequestPayload($payload)
    {
        $this->payload = json_encode($payload);
        return $this;
    }

    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    public function getRequestUrl()
    {
        return $this->url;
    }

    public function getRequestPayload()
    {
        return $this->payload;
    }

    public function getResponse()
    {
        return $this->response;
    }
}
