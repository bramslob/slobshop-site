<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Routing\Controller as BaseController;

class ListsController extends BaseController
{
    /**
     * @param Client $client
     * @return \Illuminate\View\View
     */
    public function index(Client $client)
    {
        $response = $client->get('http://slobshop-api.dev/api/v1/lists');

        dd($response);

        return view('Lists.index');
    }
}