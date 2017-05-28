<?php

namespace App\Modules\Api;

class ItemsApi extends BaseApi
{
    protected $list_id;
    protected $item_id;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getOverview()
    {
        if(empty($this->list_id)) {
            throw new \InvalidArgumentException('A list id is required');
        }

        $response = $this->client->get('lists/' . $this->list_id. '/items');

        if ($this->checkResponse($response) === false) {
            return collect([]);
        }

        $json = json_decode($response->getBody(), true);

        return collect($json);
    }

    /**
     * @param $name
     * @return bool
     */
    public function create($data)
    {
        if(empty($this->list_id)) {
            throw new \InvalidArgumentException('A list id is required');
        }

        if (count($data) <= 0) {
            return false;
        }

        $response = $this->client->post('lists/' . $this->list_id. '/items', [
            'form_params' => $data
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

    /**
     * @param null $item_id
     * @return ItemsApi
     */
    public function setItemId($item_id)
    {
        $this->item_id = $item_id;
        return $this;
    }

    /**
     * @param null $list_id
     * @return ItemsApi
     */
    public function setListId($list_id)
    {
        $this->list_id = $list_id;
        return $this;
    }
}