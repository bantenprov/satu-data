<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SysMenus;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;

class AccessController extends Controller
{
    public function getIndex(Request $request)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Pengaturan Akses</h2>';
        if(Auth::user()->can('create-accesses')) {
            $link = route('access.create');
            $header .= '<a href="'.$link.'" class="btn btn-primary btn-icon-text waves-effect" style="float: right;"><i class="zmdi zmdi-plus"></i> Akses</a>';
        }else{
            $header .= '';
        }
        $header .= '</div>';
        return view('pages.setting.access.list')->with('header', $header);
    }

    public function getList(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $datas = DB::table('view_permission_roles')
            ->select([DB::raw('@rownum  := @rownum + 1 AS rownum'),
                'id',
                'display_name',
                'total_permissions',
                'created_at',
                'status',
                'status_name'])
            ->get();
        $datatables = Datatables::of($datas)
            ->addColumn('status_name', function ($datas) {
                if($datas->status > 0) {
                    $status = '<span class="badge bgm-lightgreen">'.$datas->status_name.'</span>';
                }else{
                    $status = '<span class="badge bgm-red">'.$datas->status_name.'</span>';
                }
                return $status;
            })
            ->addColumn('action', function ($datas) {
                $action = (Auth::user()->can('read-accesses') ? '<a href="'.route('access.detail',base64_encode($datas->id)).'" class="btn btn-primary waves-effect" data-toggle="tooltip" data-original-title="Detil" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-format-subject"></i></a>':'');
                if($datas->status > 0){
                    $action .= (Auth::user()->can('update-accesses') > 0 ? '&nbsp;<a href="'.route('access.update',base64_encode($datas->id)).'" class="btn btn-warning waves-effect update-btn" data-toggle="tooltip" data-original-title="Ubah" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-edit"></i></a>':'');
                    $action .= (Auth::user()->can('delete-accesses') > 0 ? '&nbsp;<a href="'.route('access.unactivate',base64_encode($datas->id)).'" class="btn btn-danger waves-effect unactivate-btn" data-toggle="tooltip" data-original-title="Non-Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-close"></i></a>':'');
                }else{
                    $action = (Auth::user()->can('update-accesses') > 0 ? '&nbsp;<a href="'.route('access.activate',base64_encode($datas->id)).'" class="btn btn-success waves-effect activate-btn" data-toggle="tooltip" data-original-title="Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-check"></i></a>':'');
                }
                return $action;
            })
            ->rawColumns(['status_name','action']);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }
        return $datatables->make(true);
    }

    public function createAccess()
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Organisasi</h2>';
        $header .= '</div>';
        $menus = array();
        $menuparent = SysMenus::Parent(0)->get();

        foreach ($menuparent as $parent) {
            $menuchild = SysMenus::Child($parent->menu_id,$parent->menu_sort)->get();
            $menus[] = $parent;
            foreach ($menuchild as $child) {
                $menuchilds = SysMenus::Childs($child->menu_id,$child->menu_sort)->get();
                $menus[] = $child;
                foreach ($menuchilds as $childs) {
                    $menus[] = $childs;
                }
            }
        }
        return view('pages.setting.access.create')
            ->with('header', $header)
            ->with('menus', $menus);
    }

    public function detailAccess()
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Organisasi</h2>';
        $header .= '</div>';
        $menus = array();
        $menuparent = SysMenus::Parent(0)->get();

        foreach ($menuparent as $parent) {
            $menuchild = SysMenus::Child($parent->menu_id,$parent->menu_sort)->get();
            $menus[] = $parent;
            foreach ($menuchild as $child) {
                $menuchilds = SysMenus::Childs($child->menu_id,$child->menu_sort)->get();
                $menus[] = $child;
                foreach ($menuchilds as $childs) {
                    $menus[] = $childs;
                }
            }
        }
        return view('pages.setting.access.detail')
            ->with('header', $header)
            ->with('menus', $menus);
    }

    public function updateAccess($id)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Organisasi</h2>';
        $header .= '</div>';
        $menus = array();
        $menuparent = SysMenus::Parent(0)->get();

        foreach ($menuparent as $parent) {
            $menuchild = SysMenus::Child($parent->menu_id,$parent->menu_sort)->get();
            $menus[] = $parent;
            foreach ($menuchild as $child) {
                $menuchilds = SysMenus::Childs($child->menu_id,$child->menu_sort)->get();
                $menus[] = $child;
                foreach ($menuchilds as $childs) {
                    $menus[] = $childs;
                }
            }
        }
        return view('pages.setting.access.update')
            ->with('header', $header)
            ->with('menus', $menus);
    }

    public function unactivateAccess(Request $request, $id)
    {
        $realId = base64_decode($id);
        $access = SysAccess::find($realId);
        $access->access_status = 0;

        if($access->save()) {
            $responses = array('status' => 1);
        } else {
            $responses = array('status' => 0);
        }
        return response()->json($responses);
    }

    public function activateAccess(Request $request, $id)
    {
        $realId = base64_decode($id);
        $access = SysAccess::find($realId);
        $access->access_status = 1;

        if($access->save()) {
            $responses = array('status' => 1);
        } else {
            $responses = array('status' => 0);
        }
        return response()->json($responses);
    }

}
