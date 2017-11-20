<?php

namespace App\Http\Controllers\Organization;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class OrganizationController extends Controller
{
    public function getIndex(Request $request)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Organisasi</h2>';
        if(Auth::user()->hasPermission('create-datasets') && strpos(Route::currentRouteName(), 'create') == false && strpos(Route::currentRouteName(), 'update') == false) {
            $link = route(Route::currentRouteName().'.create');
            $header .= '<a href="'.$link.'" class="btn btn-primary btn-icon-text waves-effect" style="float: right;"><i class="zmdi zmdi-plus"></i> Organisasi</a>';
        }else{
            $header .= '';
        }
        $header .= '</div>';
        return view('pages.organization.list')->with('header', $header);
    }

    public function createOrganization()
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Organisasi</h2>';
        $header .= '</div>';
        return view('pages.organization.create')->with('header', $header);
    }

    public function detailOrganization()
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Organisasi</h2>';
        $header .= '</div>';
        return view('pages.organization.detail')->with('header', $header);
    }

    public function updateOrganization($id)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Organisasi</h2>';
        $header .= '</div>';
        return view('pages.organization.update')->with('header', $header);
    }
}
