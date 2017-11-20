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

    public function createDataset()
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Dataset</h2>';
        $header .= '</div>';
        return view('pages.dataset.create')->with('header', $header);
    }

    public function detailDataset()
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Dataset</h2>';
        $header .= '</div>';
        return view('pages.dataset.detail')->with('header', $header);
    }

    public function updateDataset($id)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Dataset</h2>';
        $header .= '</div>';
        return view('pages.dataset.update')->with('header', $header);
    }
}
