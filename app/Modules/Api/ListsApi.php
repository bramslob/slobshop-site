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

        $json = json_decode($response->getBody(), true);

        if (empty($json['list'])) {
            return false;
        }

        return true;
    }
}