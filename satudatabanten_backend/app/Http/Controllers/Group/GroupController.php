<?php

namespace App\Http\Controllers\Group;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;

class GroupController extends Controller
{
    public function getIndex(Request $request)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Grup</h2>';
        if(Auth::user()->hasPermission('create-datasets') && strpos(Route::currentRouteName(), 'create') == false && strpos(Route::currentRouteName(), 'update') == false) {
            $link = route(Route::currentRouteName().'.create');
            $header .= '<a href="'.$link.'" class="btn btn-primary btn-icon-text waves-effect" style="float: right;"><i class="zmdi zmdi-plus"></i> Grup</a>';
        }else{
            $header .= '';
        }
        $header .= '</div>';
        return view('pages.group.list')->with('header', $header);
    }

    public function getList(Request $request)
    {
        $default_order = 'group_id';
        $order_field = array(
            'group_id',
            'group_name',
            'group_title'
        );
        $order_key 	= (!$request->input('iSortCol_0'))?0:$request->input('iSortCol_0');
        $order 		= (!$request->input('iSortCol_0'))?$default_order:$order_field[$order_key];
        $sort 		= (!$request->input('sSortDir_0'))?'desc':$request->input('sSortDir_0');
        $search 	= (!$request->input('sSearch'))?'':strtoupper($request->input('sSearch'));

        $limit 		= (!$request->input('iDisplayLength'))?10:$request->input('iDisplayLength');
        $start 		= (!$request->input('iDisplayStart'))?0:$request->input('iDisplayStart');

        $page = ($search == '' ? (($start/$limit)+1) : 1);

        $this->setMethod('getGroup');
        $this->setParamGet('page',$page);
        $this->setParamGet('limit',$limit);
        $this->setParamGet('view',2);
        $this->setParamGet('order_field',$order_key);
        $this->setParamGet('sort_field',$sort);
        if($search != ''){
            $this->setParamGet('keyword', $search);
        }
        $datas = $this->doRead('get');

        $sEcho 			= (!$request->input('callback'))?0:$request->input('callback');
        $iTotalRecords 	= $datas['results']->total_result;

        $groups 	= $datas['results']->groups;
        $start      = (($start == 0) ? 0 : $start);
        $callback 	= $request->input('callback');
        return view('pages.group.json')
            ->with('sEcho', $sEcho)
            ->with('iTotalRecords', $iTotalRecords)
            ->with('groups', $groups)
            ->with('start', $start)
            ->with('callback', $callback);
    }

    public function createGroup(Request $request, $id)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Grup</h2>';
        $header .= '</div>';
        return view('pages.group.create')
            ->with('header', $header);
    }

    public function detailGroup($id)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Grup</h2>';
        $header .= '</div>';
        $this->setMethod('getGroupDetail');
        $this->setParamGet('group_id',$id);
        $datas = $this->doRead('get');
        return view('pages.group.detail')
            ->with('header', $header)
            ->with('datas', $datas['results']->group);
    }

    public function updateGroup($id)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Grup</h2>';
        $header .= '</div>';
        return view('pages.group.update')->with('header', $header);
    }
}
