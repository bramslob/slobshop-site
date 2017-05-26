<?php

namespace App\Modules\Api;

use Psr\Http\Message\ResponseInterface;

class ListsApi extends BaseApi
{

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
     * @return \Illuminate\Support\Collection
     */
    public function getLists()
    {
        $response = $this->client->get('lists');

        if ($this->checkResponse($response) === false) {
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

        if ($this->checkResponse($response) === false) {
            return false;
        }

        $json = json_decode($response->getBody(), true);

        if (empty($json['list'])) {
            return false;
        }

        return true;
    }
}