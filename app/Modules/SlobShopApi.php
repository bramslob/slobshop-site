<?php

namespace App\Modules;

use GuzzleHttp\Client;

class SlobShopApi
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
     * @return \Illuminate\Support\Collection
     */
    public function getLists()
    {
        $response = $this->client->get('lists');

        if (!$response->hasHeader('Content-Length')) {
            return collect([]);
        }

        $json = json_decode($response->getBody(), true);

        if (empty($json['lists'])) {
            return collect([]);
        }

        return collect($json['lists']);
    }

    /**
     * @param $name
     * @return bool
     */
    public function createList($name)
    {
        if (strlen($name) <= 0) {
            return false;
        }

        $response = $this->client->post('lists', [
            'form_params' => [
                'name' => $name
            ]
        ]);

        if (!$response->hasHeader('Content-Length')) {
            return false;
        }

        $json = json_decode($response->getBody(), true);

        if (empty($json['list'])) {
            return false;
        }

        return true;
    }
}