<?php

namespace App\Modules\Api;

use GuzzleHttp\Client;

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
}