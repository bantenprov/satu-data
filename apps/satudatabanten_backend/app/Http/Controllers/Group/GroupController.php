<?php

namespace App\Http\Controllers\Group;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

    public function createGroup()
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Grup</h2>';
        $header .= '</div>';
        return view('pages.group.create')->with('header', $header);
    }

    public function detailGroup()
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Grup</h2>';
        $header .= '</div>';
        return view('pages.group.detail')->with('header', $header);
    }

    public function updateGroup($id)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Grup</h2>';
        $header .= '</div>';
        return view('pages.group.update')->with('header', $header);
    }
}
