<?php

namespace App\Modules\Api;

class ListsApi extends BaseApi
{

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getOverview()
    {
        $response = $this->client->get('lists');

        if ($this->checkResponse($response) === false) {
            return collect([]);
        }

        $body = json_decode($response->getBody(), true);
        $this->parseBody($body);

        return collect($body);
    }

    /**
     * @param $name
     * @return bool
     */
    public function create($name)
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

        return $this->bodyHas('lists', $response->getBody());
    }
}