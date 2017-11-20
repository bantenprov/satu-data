<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
        DB::statement(DB::raw('set @rownum=0'));
        $datas = DB::table('view_users')
            ->select([DB::raw('@rownum  := @rownum + 1 AS rownum'),
                'id',
                'name',
                'email',
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
                $action = (Auth::user()->can('read-users') ? '<a href="'.route('user.detail',base64_encode($datas->id)).'" class="btn btn-primary waves-effect" data-toggle="tooltip" data-original-title="Detil" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-format-subject"></i></a>':'');
                if($datas->status > 0){
                    $action .= (Auth::user()->can('update-users') ? '&nbsp;<a href="'.route('user.update',base64_encode($datas->id)).'" class="btn btn-warning waves-effect update-btn" data-toggle="tooltip" data-original-title="Ubah" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-edit"></i></a>':'');
                    $action .= (Auth::user()->can('delete-users') ? '&nbsp;<a href="'.route('user.unactivate',base64_encode($datas->id)).'" class="btn btn-danger waves-effect unactivate-btn" data-toggle="tooltip" data-original-title="Non-Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-close"></i></a>':'');
                }else{
                    $action .= (Auth::user()->can('update-users') ? '&nbsp;<a href="'.route('user.activate',base64_encode($datas->id)).'" class="btn btn-success waves-effect activate-btn" data-toggle="tooltip" data-original-title="Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-check"></i></a>':'');
                }
                return $action;
            })
            ->rawColumns(['status_name','action']);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }
        return $datatables->make(true);
    }

    public function createUser(Request $request)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Pengaturan Pengguna</h2>';
        $header .= '</div>';
        return view('pages.setting.user.create')->with('header',$header);
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

    public function updateUser(Request $request)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Pengaturan Pengguna</h2>';
        $header .= '</div>';
        return view('pages.setting.user.update')->with('header',$header);
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
