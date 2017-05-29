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
    public function overview(ListsApi $api)
    {
        return view('lists.index')->with([
            'data' => $api->getOverview()
        ]);
    }

    /**
     * @param null $list_id
     * @param ListsApi $api
     * @return \Illuminate\View\View
     */
    public function form($list_id = null, ListsApi $api)
    {
        $list = null;
        if (null !== $list_id) {
            $api_list = $api->setListId($list_id)->getList();

            $list = $api_list['lists'];
        }

        return view('lists.partials.form_modal')->with([
            'list' => $list,
            'action' => null === $list ? 'create' : 'edit'
        ]);
    }

    /**
     * @param Request $request
     * @param ListsApi $api
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($list_id = null, Request $request, ListsApi $api)
    {
        $data = $request->all();
        if ($api->create(array_get($data, 'name')) === false) {
            return redirect()->back()->withErrors([
                'name' => 'error'
            ]);
        }

        return redirect()->route('lists_overview');
    }

}