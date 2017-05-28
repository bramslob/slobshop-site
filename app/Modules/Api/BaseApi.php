<?php

namespace App\Modules\Api;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

abstract class BaseApi
{
    /**
     * @var Client
     */
    protected $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => env('SLOBSHOP_URL')]);
    }

    /**
     * @param ResponseInterface $response
     *
     * @return bool
     */
    protected function checkResponse(ResponseInterface $response)
    {
        if ($response->hasHeader('Content-Length') === false) {
            return false;
        }

        return true;
    }
}