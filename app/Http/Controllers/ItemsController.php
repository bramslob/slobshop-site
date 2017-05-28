<?php

namespace App\Http\Controllers;

use App\Modules\Api\ItemsApi;
use App\Modules\Api\ListsApi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ItemsController extends BaseController
{
    /**
     * @param ItemsApi|$api
     * @return \Illuminate\View\View
     */
    public function overview($list_id, ItemsApi $api)
    {
        return view('items.index')->with([
            'data' => $api->setListId($list_id)->getOverview()
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create($list_id, ItemsApi $api)
    {
        return view('items.form')
            ->with([
                'data' => $api->setListId($list_id)->getOverview()
            ]);
    }

    /**
     * @param Request $request
     * @param ItemsApi $api
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($list_id, Request $request, ItemsApi $api)
    {
        $data = $request->all();
        if($api->setListId($list_id)->create($data) === false) {
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