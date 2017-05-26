<?php

namespace App\Http\Controllers;

use App\Modules\SlobShopApi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ListsController extends BaseController
{
    /**
     * @param SlobShopApi $api
     * @return \Illuminate\View\View
     */
    public function index(SlobShopApi $api)
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
     * @param SlobShopApi $api
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, SlobShopApi $api)
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