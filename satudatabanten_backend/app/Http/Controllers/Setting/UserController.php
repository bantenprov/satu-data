<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;
use App\User;
use App\RoleUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function getIndex(Request $request)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Pengaturan Pengguna</h2>';
        if(Auth::user()->can('create-users')) {
            $link = route('user.create');
            $header .= '<a href="'.$link.'" class="btn btn-primary btn-icon-text waves-effect" style="float: right;"><i class="zmdi zmdi-plus"></i> Pengguna</a>';
        }else{
            $header .= '';
        }
        $header .= '</div>';
        return view('pages.setting.user.list')->with('header', $header);
    }

    public function getList(Request $request)
    {
        $default_order = 'id';
        $order_field = array(
            'nik',
            'name',
            'role_name',
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
        $iTotalRecords 	= DB::table('view_users')->count();

        $query = DB::table('view_users');
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
        $users = $query->limit($limit)->offset($start)->get();
        $start      = (($start == 0) ? 0 : $start);
        $callback 	= $request->input('callback');
        return view('pages.setting.user.json')
            ->with('sEcho', $sEcho)
            ->with('iTotalRecords', $iTotalRecords)
            ->with('users', $users)
            ->with('start', $start)
            ->with('callback', $callback);
    }

    public function createUser(Request $request)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Pengaturan Pengguna</h2>';
        $header .= '</div>';
        $roles = Role::where('status',1)->get();
        return view('pages.setting.user.create')
            ->with('header',$header)
            ->with('roles',$roles);
    }

    public function createUserSave(Request $request){

        $newUser = new User;
        $newUser->name              = $request->input('userName');
        $newUser->email             = $request->input('userEmail');
        $newUser->nik               = $request->input('userNIK');
        $newUser->password          = bcrypt($request->input('userPassword'));
        $newUser->created_at        = date('Y-m-d H:i:s');
        $newUser->created_by        = $request->session()->get('userId');
        $newUser->remember_token    = $request->input('_token');
        $newUser->status            = 1;

        if($newUser->save())
        {
            $newRoleUser = new RoleUser;
            $newRoleUser->role_id       = $request->input('userRole');
            $newRoleUser->user_id       = $newUser->id;
            $newRoleUser->user_type     = 'App\User';

            if($newRoleUser->save()) {
                $responses = array('redirect' => route('user'), 'status'=> 'success', 'title' => 'Berhasil!', 'message' => 'Penambahan telah disimpan.');
            } else {
                $responses = array('redirect' => route('user.create'), 'status'=> 'danger', 'title' => 'Gagal!', 'message' => 'Terjadi kesalaahan. Penambahan gagal disimpan.');
            }
        }else{
            $responses = array('redirect' => route('user.create'), 'status'=> 'danger', 'title' => 'Gagal!', 'message' => 'Terjadi kesalaahan. Penambahan gagal disimpan.');
        }
        return response()->json($responses);
    }

    public function detailUser(Request $request, $id)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Pengaturan Pengguna</h2>';
        $header .= '</div>';
        $realId = base64_decode($id);
        $user = User::where('id',$realId)->first();
        return view('pages.setting.user.detail')
            ->with('user',$user)
            ->with('header',$header);
    }

    public function updateUser(Request $request, $id)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Pengaturan Pengguna</h2>';
        $header .= '</div>';
        $userId = base64_decode($id);
        $roles = Role::where('status',1)->get();
        $roleUser = DB::table('view_users')->where('id', $userId)->first();
        return view('pages.setting.user.update')
            ->with('header',$header)
            ->with('roles',$roles)
            ->with('roleUser',$roleUser);
    }

    public function updateUserSave(Request $request, $id)
    {
        $userId = base64_decode($id);
        $existUser = User::find($userId);
        $existUser->name              = $request->input('userName');
        $existUser->email             = $request->input('userEmail');
        $existUser->nik               = $request->input('userNIK');
        if (!empty($request->input('userPassword'))){
        $existUser->password          = bcrypt($request->input('userPassword'));
        }
        $existUser->updated_at        = date('Y-m-d H:i:s');
        $existUser->updated_by        = $request->session()->get('userId');
        $existUser->remember_token    = $request->input('_token');

        if($existUser->save())
        {
            $existRoleUser = RoleUser::where('user_id')
            ->update(
                [
                    'role_id'       => $request->input('userRole'),
                    'user_id'       => $existUser->id,
                    'user_type'     => 'App\User',
                ]
            );

            if($existUser->id > 0) {
                $responses = array('redirect' => route('user'), 'status'=> 'success', 'title' => 'Berhasil!', 'message' => 'Perubahan telah disimpan.');
            } else {
                $responses = array('redirect' => route('user.create'), 'status'=> 'danger', 'title' => 'Gagal!', 'message' => 'Terjadi kesalaahan. Perubahan gagal disimpan.');
            }
        }else{
            $responses = array('redirect' => route('user.create'), 'status'=> 'danger', 'title' => 'Gagal!', 'message' => 'Terjadi kesalaahan. Perubahan gagal disimpan.');
        }
        return response()->json($responses);
    }

    public function activateUser(Request $request, $id)
    {
        $realId = base64_decode($id);
        $user = User::find($realId);
        $user->status = 1;

        if($user->save()) {
            $responses = array('status' => 1);
        } else {
            $responses = array('status' => 0);
        }
        return response()->json($responses);
    }

    public function unactivateUser(Request $request, $id)
    {
        $realId = base64_decode($id);
        $user = User::find($realId);
        $user->status = 0;

        if($user->save()) {
            $responses = array('status' => 1);
        } else {
            $responses = array('status' => 0);
        }
        return response()->json($responses);
    }

}
