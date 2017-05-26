<?php

namespace App\Http\Controllers;

use App\Modules\Api\ListsApi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ListsController extends BaseController
{
    /**
     * @param ListsApi $api
     * @return \Illuminate\View\View
     */
    public function index(ListsApi $api)
    {
        return view('lists.index')->with([
            'lists' => $api->getLists()
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('lists.form');
    }

    /**
     * @param Request $request
     * @param ListsApi $api
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, ListsApi $api)
    {
        $data = $request->all();
        if($api->createList(array_get($data, 'name')) === false) {
            return redirect()->back()->withErrors([
                'name' => 'error'
            ]);
        }

        return redirect()->route('lists_overview');
    }

    public function edit()
    {
        return view('lists.form');
    }

    public function update()
    {

    }
}