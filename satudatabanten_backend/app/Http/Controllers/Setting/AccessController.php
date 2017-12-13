<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SysMenus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\PermissionRole;

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
        $default_order = 'id';
        $order_field = array(
            'display_name',
            'total_permissions',
            'status_name',
            'created_at'
        );
        $order_key 	= (!$request->input('iSortCol_0'))?0:$request->input('iSortCol_0');
        $order 		= (!$request->input('iSortCol_0'))?$default_order:$order_field[$order_key];
        $sort 		= (!$request->input('sSortDir_0'))?'desc':$request->input('sSortDir_0');
        $search 	= (!$request->input('sSearch'))?'':strtoupper($request->input('sSearch'));

        $limit 		= (!$request->input('iDisplayLength'))?10:$request->input('iDisplayLength');
        $start 		= (!$request->input('iDisplayStart'))?0:$request->input('iDisplayStart');

        $sEcho 			= (!$request->input('callback'))?0:$request->input('callback');
        $iTotalRecords 	= DB::table('view_permission_roles')->count();

        $query = DB::table('view_permission_roles');
        if($search!='' AND $order_field!=''){
            $likeclause = '';
            $i=0;
            foreach($order_field as $field){
                if($i==count($order_field)-1) {
                    $likeclause .= "UPPER(".$field.") LIKE '%".strtoupper($search)."%'";
                } else {
                    $likeclause .= "UPPER(".$field.") LIKE '%".strtoupper($search)."%' OR ";
                }
                ++$i;
            }
            $query = $query->whereRaw($likeclause);
        }

        if (empty($order) || empty($sort)){
            $query = $query->orderBy('id','ASC');
        } else {
            $query = $query->orderBy($order, $sort);
        }
        $accesses = $query->limit($limit)->offset($start)->get();
        $start      = (($start == 0) ? 0 : $start);
        $callback 	= $request->input('callback');
        return view('pages.setting.access.json')
            ->with('sEcho', $sEcho)
            ->with('iTotalRecords', $iTotalRecords)
            ->with('accesses', $accesses)
            ->with('start', $start)
            ->with('callback', $callback);
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

    public function createAccessSave(Request $request)
    {
        $role = new Role;
        $role->name         = strtolower($request->input('roleName'));
        $role->description  = $request->input('roleDesc');
        $role->display_name = $request->input('roleName');
        $role->created_at   = date('Y-m-d H:i:s');
        $role->created_by    = $request->session()->get('userId');
        $role->status       = 1;

        if($role->save())
        {
            for($i=0;$i<count($request->input('permission'));$i++){
                $permission_role = new PermissionRole;
                $permission_role->role_id = $role->id;
                $permission_role->permission_id = $request->input('permission')[$i];
                $permission_role->save();
            }

            if($permission_role->save()) {
                $responses = array('redirect' => route('access'), 'status'=> 'success', 'title' => 'Berhasil!', 'message' => 'Penambahan telah disimpan.');
            } else {
                $responses = array('redirect' => route('access.create'), 'status'=> 'danger', 'title' => 'Gagal!', 'message' => 'Terjadi kesalaahan. Penambahan gagal disimpan.');
            }
            return response()->json($responses);
        }
    }

    public function detailAccess($id)
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

        $roleId = base64_decode($id);
        $role = Role::where('id', $roleId)->first();
        $permissions = PermissionRole::where('role_id',$roleId)->get();
        return view('pages.setting.access.detail')
            ->with('header', $header)
            ->with('permissions', $permissions)
            ->with('role', $role)
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

        $roleId = base64_decode($id);
        $role = Role::where('id', $roleId)->first();
        $permissions = PermissionRole::where('role_id',$roleId)->get();
        return view('pages.setting.access.update')
            ->with('header', $header)
            ->with('permissions', $permissions)
            ->with('role', $role)
            ->with('menus', $menus);
    }

    public function updateAccessSave(Request $request, $id)
    {
        $roleId = base64_decode($id);
        $role = Role::find($roleId);
        $role->name         = strtolower($request->input('roleName'));
        $role->description  = $request->input('roleDesc');
        $role->display_name = $request->input('roleName');
        $role->updated_at   = date('Y-m-d H:i:s');
        $role->updated_by   = $request->session()->get('userId');

        if($role->save())
        {
            PermissionRole::where('role_id',$roleId)->delete();
            for($i=0;$i<count($request->input('permission'));$i++){
                $permission_role = new PermissionRole;
                $permission_role->role_id = $role->id;
                $permission_role->permission_id = $request->input('permission')[$i];
                $permission_role->save();
            }

            if($role->id > 0) {
                $responses = array('redirect' => route('access'), 'status'=> 'success', 'title' => 'Berhasil!', 'message' => 'Perubahan telah disimpan.');
            } else {
                $responses = array('redirect' => route('access.update'), 'status'=> 'danger', 'title' => 'Gagal!', 'message' => 'Terjadi kesalaahan. Perubahan gagal disimpan.');
            }
            return response()->json($responses);
        }
    }

    public function activateAccess(Request $request, $id)
    {
        $realId = base64_decode($id);
        //$this->insertLog($realId);
        $role = Role::find($realId);
        $role->status = 1;

        if($role->save()) {
            $responses = array('status' => 1);
        } else {
            $responses = array('status' => 0);
        }
        return response()->json($responses);
    }

    public function unactivateAccess(Request $request, $id)
    {
        $realId = base64_decode($id);
        //$this->insertLog($realId);
        $role = Role::find($realId);
        $role->status = 0;

        if($role->save()) {
            $responses = array('status' => 1);
        } else {
            $responses = array('status' => 0);
        }
        return response()->json($responses);
    }

    public function insertLog($id)
    {
        $roles = Role::where('id', $id)->get();
        foreach($roles as $role){
            $newRole = new Role;
            $newRole->log_id             = $role->id;
            $newRole->name               = $role->name;
            $newRole->display_name       = $role->display_name;
            $newRole->description        = $role->description;
            $newRole->created_by         = $role->created_by;
            $newRole->created_at         = $role->created_at;
            $newRole->updated_by         = $role->updated_by;
            $newRole->updated_at         = $role->updated_at;
            $newRole->status             = $role->status;
            $newRole->save();
        }
    }

}
