<?php

namespace App\Modules\Api;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

abstract class BaseApi
{
    /**
     * @var Client
     */
    protected $client;

    protected $parsing_functions = [
        'updated_at' => 'parseDate'
    ];

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

    /**
     * @param $response_body
     * @return mixed
     */
    protected function parseBody(&$response_body)
    {
        try {
            if (!is_array($response_body)) {
                return;
            }

            foreach ($response_body as $key => &$value) {
                if(is_array($value)) {
                    $this->parseBody($value);
                    continue;
                }

                if (array_key_exists($key, $this->parsing_functions) === false) {
                    continue;
                }

                if (method_exists($this, $this->parsing_functions[$key]) === false) {
                    continue;
                }

                $value = $this->{$this->parsing_functions[$key]}($value);
            }
            return;
        }
        catch (\Exception $exception) {
            var_dump($exception->getMessage());
        }
    }

    /**
     * @param $key
     * @param $response_body
     * @return bool
     */
    protected function bodyHas($key, $response_body)
    {
        return array_key_exists($key,  json_decode($response_body, true));
    }

    /**
     * @param $data
     * @return Carbon
     */
    private function parseDate($data)
    {
        if (strlen($data) <= 0) {
            return $data;
        }

        return Carbon::createFromFormat('Y-m-d H:i:s', $data);
    }
}