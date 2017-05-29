<?php

namespace App\Modules\Api;

class ListsApi extends BaseApi
{
    protected $list_id;

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
     * @return \Illuminate\Support\Collection
     */
    public function getList()
    {
        if(empty($this->list_id)) {
            throw new \InvalidArgumentException('A list id is required');
        }

        $response = $this->client->get('lists/' . $this->list_id);

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

    /**
     * @param mixed $list_id
     * @return ListsApi
     */
    public function setListId($list_id)
    {
        $this->list_id = $list_id;
        return $this;
    }
}