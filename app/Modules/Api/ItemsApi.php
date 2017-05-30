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
        if (empty($this->list_id)) {
            throw new \InvalidArgumentException('A list id is required');
        }

        $response = $this->client->get('lists/' . $this->list_id . '/items');

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
    public function getItem()
    {
        if (empty($this->list_id)) {
            throw new \InvalidArgumentException('A list id is required');
        }

        if (empty($this->item_id)) {
            throw new \InvalidArgumentException('An item id is required');
        }

        $response = $this->client->get('lists/' . $this->list_id . '/items/' . $this->item_id);

        if ($this->checkResponse($response) === false) {
            return collect([]);
        }

        $body = json_decode($response->getBody(), true);
        $this->parseBody($body);

        return collect($body);
    }

    /**
     * @param $data
     * @return bool
     */
    public function create($data)
    {
        if (empty($this->list_id)) {
            throw new \InvalidArgumentException('A list id is required');
        }

        if (count($data) <= 0) {
            return false;
        }

        $response = $this->client->post('lists/' . $this->list_id . '/items', [
            'form_params' => $data
        ]);

        if ($this->checkResponse($response) === false) {
            return false;
        }

        return $this->bodyHas('items', $response->getBody());
    }

    /**
     * @param $data
     * @return bool
     */
    public function update($data)
    {
        if (empty($this->list_id)) {
            throw new \InvalidArgumentException('A list id is required');
        }
        if (empty($this->list_id)) {
            throw new \InvalidArgumentException('An item id is required');
        }

        if (count($data) <= 0) {
            return false;
        }

        $response = $this->client->post('lists/' . $this->list_id . '/items/' . $this->item_id, [
            'form_params' => $data
        ]);

        if ($this->checkResponse($response) === false) {
            return false;
        }

        return $this->bodyHas('items', $response->getBody());
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

    /**
     * @return bool
     */
    public function check()
    {
        if (empty($this->list_id)) {
            throw new \InvalidArgumentException('A list id is required');
        }
        if (empty($this->list_id)) {
            throw new \InvalidArgumentException('An item id is required');
        }
        $response = $this->client->post('lists/' . $this->list_id . '/items/' . $this->item_id . '/check');

        if ($this->checkResponse($response) === false) {
            return false;
        }

        return $this->bodyHas('items', $response->getBody());
    }
}