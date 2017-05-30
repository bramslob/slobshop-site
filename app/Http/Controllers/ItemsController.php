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
     * @param null $list_id
     * @param null $item_id
     * @param ItemsApi $api
     * @return \Illuminate\View\View
     */
    public function form($list_id, $item_id = null, ItemsApi $api)
    {
        $api->setListId($list_id);
        $item = null;

        if (null !== $item_id) {
            $api_item = $api->setItemId($item_id)->getItem();
            $item = $api_item['items'][0];
        }

        return view('items.partials.form_modal')->with([
            'item' => $item,
            'list_id' => $list_id,
            'item_id' => $item_id,
            'action' => null === $item ? 'create' : 'update'
        ]);
    }

    /**
     * @param null $list_id
     * @param null $item_id
     * @param Request $request
     * @param ItemsApi|ListsApi $api
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($list_id, $item_id = null, Request $request, ItemsApi $api)
    {
        $api->setListId($list_id);

        $data = $request->all();

        if ($data['action'] === 'update'
            && $api->setItemId($item_id)->update($data) !== false
        ) {
            return redirect()->route('items_overview', ['list_id' => $list_id]);
        }
        if ($api->create($data) !== false) {
            return redirect()->route('items_overview', ['list_id' => $list_id]);
        }

        return redirect()->back()->withErrors([
            'name' => 'error'
        ]);
    }

    /**
     * @param $list_id
     * @param null $item_id
     * @param Request $request
     * @param ItemsApi $api
     * @return \Illuminate\Http\JsonResponse
     */
    public function check($list_id, $item_id = null, Request $request, ItemsApi $api)
    {
        $api->setListId($list_id);
        if ($api->setItemId($item_id)->check() !== false) {
            return response()->json([]);
        }

        return response()
            ->json([], 402);
    }
}