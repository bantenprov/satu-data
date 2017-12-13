<?php

namespace App\Http\Controllers\Dataset;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class DatasetController extends Controller
{
    public function getIndex(Request $request)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Dataset</h2>';
        if(Auth::user()->hasPermission('create-datasets') && strpos(Route::currentRouteName(), 'create') == false && strpos(Route::currentRouteName(), 'update') == false) {
            $link = route(Route::currentRouteName().'.create');
            $header .= '<a href="'.$link.'" class="btn btn-primary btn-icon-text waves-effect" style="float: right;"><i class="zmdi zmdi-plus"></i> Dataset</a>';
        }else{
            $header .= '';
        }
        $header .= '</div>';
        return view('pages.dataset.list')->with('header', $header);
    }

    public function getListPublic(Request $request)
    {
        $default_order = 'dataset_id';
        $order_field = array(
            'dataset_id',
            'dataset_name',
            'dataset_title',
            'dataset_notes'
        );
        $order_key 	= (!$request->input('iSortCol_0'))?0:$request->input('iSortCol_0');
        $order 		= (!$request->input('iSortCol_0'))?$default_order:$order_field[$order_key];
        $sort 		= (!$request->input('sSortDir_0'))?'desc':$request->input('sSortDir_0');
        $search 	= (!$request->input('sSearch'))?'':strtoupper($request->input('sSearch'));

        $limit 		= (!$request->input('iDisplayLength'))?10:$request->input('iDisplayLength');
        $start 		= (!$request->input('iDisplayStart'))?0:$request->input('iDisplayStart');

        $page = ($search == '' ? (($start/$limit)+1) : 1);

        $this->setMethod('getDataset');
        $this->setParamGet('page',$page);
        $this->setParamGet('limit',$limit);
        $this->setParamGet('view',2);
        $this->setParamGet('order_field',$order_key);
        $this->setParamGet('sort_field',$sort);
        $this->setParamGet('visibility',0);
        if($search != ''){
            $this->setParamGet('keyword', $search);
        }
        $datas = $this->doRead('get');
        $sEcho 			= (!$request->input('callback'))?0:$request->input('callback');
        $iTotalRecords 	= ($datas['status'] > 0 ? $datas['results']->total_result : 0);
        $datasets 	= ($datas['status'] > 0 ? $datas['results']->datasets : array());
        $start      = (($start == 0) ? 0 : $start);
        $callback 	= $request->input('callback');
        return view('pages.dataset.jsonpublic')
            ->with('sEcho', $sEcho)
            ->with('iTotalRecords', $iTotalRecords)
            ->with('datasets', $datasets)
            ->with('start', $start)
            ->with('callback', $callback);
    }

    public function getListPrivate(Request $request)
    {
        $default_order = 'dataset_id';
        $order_field = array(
            'dataset_id',
            'dataset_name',
            'dataset_title',
            'dataset_notes'
        );
        $order_key 	= (!$request->input('iSortCol_0'))?0:$request->input('iSortCol_0');
        $order 		= (!$request->input('iSortCol_0'))?$default_order:$order_field[$order_key];
        $sort 		= (!$request->input('sSortDir_0'))?'desc':$request->input('sSortDir_0');
        $search 	= (!$request->input('sSearch'))?'':strtoupper($request->input('sSearch'));

        $limit 		= (!$request->input('iDisplayLength'))?10:$request->input('iDisplayLength');
        $start 		= (!$request->input('iDisplayStart'))?0:$request->input('iDisplayStart');

        $page = ($search == '' ? (($start/$limit)+1) : 1);

        $this->setMethod('getDataset');
        $this->setParamGet('page',$page);
        $this->setParamGet('limit',$limit);
        $this->setParamGet('view',2);
        $this->setParamGet('order_field',$order_key);
        $this->setParamGet('sort_field',$sort);
        $this->setParamGet('visibility',0);
        if($search != ''){
            $this->setParamGet('keyword', $search);
        }
        $datas = $this->doRead('get');

        $sEcho 			= (!$request->input('callback'))?0:$request->input('callback');
        $iTotalRecords 	= ($datas['status'] > 0 ? $datas['results']->total_result : 0);

        $datasets 	= ($datas['status'] > 0 ? $datas['results']->datasets : array());
        $start      = (($start == 0) ? 0 : $start);
        $callback 	= $request->input('callback');
        return view('pages.dataset.jsonprivate')
            ->with('sEcho', $sEcho)
            ->with('iTotalRecords', $iTotalRecords)
            ->with('datasets', $datasets)
            ->with('start', $start)
            ->with('callback', $callback);
    }

    public function createDataset()
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Dataset</h2>';
        $header .= '</div>';
        return view('pages.dataset.create')->with('header', $header);
    }

    public function detailDataset($id)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Dataset</h2>';
        $header .= '</div>';
        $this->setMethod('getDatasetDetail');
        $this->setParamGet('dataset_id',$id);
        $datas = $this->doRead('get');
        return view('pages.dataset.detail')
            ->with('header', $header)
            ->with('datas', $datas['results']->dataset);
    }

    public function updateDataset($id)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Dataset</h2>';
        $header .= '</div>';
        return view('pages.dataset.update')->with('header', $header);
    }
}
