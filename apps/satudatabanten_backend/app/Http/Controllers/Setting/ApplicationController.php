<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SysSettings;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class ApplicationController extends Controller
{
    public function getIndex(Request $request)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Pengaturan Aplikasi</h2>';
        if(Auth::user()->can('create-applications')) {
            $link = route('application.create');
            $header .= '<a href="'.$link.'" class="btn btn-primary btn-icon-text waves-effect" style="float: right;"><i class="zmdi zmdi-plus"></i> Aplikasi</a>';
        }else{
            $header .= '';
        }
        $header .= '</div>';
        return view('pages.setting.application.list')->with('header', $header);
    }

    public function getList(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $datas = DB::table('view_settings')
            ->select([DB::raw('@rownum  := @rownum + 1 AS rownum'),
                'setting_id',
                'setting_code',
                'setting_name',
                'setting_value',
                'setting_create_date',
                'setting_status',
                'setting_status_name'])
            ->get();
        $datatables = Datatables::of($datas)
            ->addColumn('setting_status_name', function ($datas) {
                if($datas->setting_status > 0) {
                    $status = '<span class="badge bgm-lightgreen">'.$datas->setting_status_name.'</span>';
                }else{
                    $status = '<span class="badge bgm-red">'.$datas->setting_status_name.'</span>';
                }
                return $status;
            })
            ->addColumn('action', function ($datas) {
                $action = (Auth::user()->can('read-applications') ? '<a href="'.route('application.detail',base64_encode($datas->setting_id)).'" class="btn btn-primary waves-effect" data-toggle="tooltip" data-original-title="Detil" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-format-subject"></i></a>':'');
                if($datas->setting_status > 0){
                    $action .= (Auth::user()->can('update-applications') ? '&nbsp;<a href="'.route('application.update',base64_encode($datas->setting_id)).'" class="btn btn-warning waves-effect update-btn" data-toggle="tooltip" data-original-title="Ubah" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-edit"></i></a>':'');
                    $action .= (Auth::user()->can('delete-applications') ? '&nbsp;<a href="'.route('application.unactivate',base64_encode($datas->setting_id)).'" class="btn btn-danger waves-effect unactivate-btn" data-toggle="tooltip" data-original-title="Non-Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-close"></i></a>':'');
                }else{
                    $action .= (Auth::user()->can('update-applications') ? '&nbsp;<a href="'.route('application.activate',base64_encode($datas->setting_id)).'" class="btn btn-success waves-effect activate-btn" data-toggle="tooltip" data-original-title="Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-check"></i></a>':'');
                }
                return $action;
            })
            ->rawColumns(['setting_status_name','action','setting_value']);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }
        return $datatables->make(true);
    }

    public function detailAccess(Request $request, $id)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Pengaturan Aplikasi</h2>';
        $header .= '</div>';
        $realId = base64_decode($id);
        $app = SysSettings::where('setting_id',$realId)->first();
        return view('pages.setting.application.detail')
            ->with('app',$app)
            ->with('header',$header);
    }

    public function updateAccess(Request $request, $id)
    {
        $header = '<div class="block-header">';
        $header .= '<h2 style="display: inline;">Pengaturan Aplikasi</h2>';
        $header .= '</div>';
        $realId = base64_decode($id);
        $app = SysSettings::where('setting_id',$realId)->first();
        return view('pages.setting.application.update')
                ->with('app',$app)
                ->with('header',$header);
    }

    public function updateAccessSave(Request $request, $id)
    {
        $realId = base64_decode($id);
        $app = SysSettings::find($realId);
        $app->setting_code = $request->input('settingCode');
        $app->setting_name = $request->input('settingName');
        $app->setting_value = $request->input('settingValue');
        if($app->save()) {
            $responses = array('redirect' => route('application'), 'message' => 'Perubahan telah disimpan.');
        } else {
            $responses = array('redirect' => route('application.update',$id),'message' => 'Terjadi kesalaahan. Perubahan gagal disimpan.');
        }
        return response()->json($responses);
    }

    public function activateAccess(Request $request, $id)
    {
        $realId = base64_decode($id);
        $this->insertLog($realId);
        $app = SysSettings::find($realId);
        $app->setting_status = 1;

        if($app->save()) {
            $responses = array('status' => 1);
        } else {
            $responses = array('status' => 0);
        }
        return response()->json($responses);
    }

    public function unactivateAccess(Request $request, $id)
    {
        $realId = base64_decode($id);
        $this->insertLog($realId);
        $app = SysSettings::find($realId);
        $app->setting_status = 0;

        if($app->save()) {
            $responses = array('status' => 1);
        } else {
            $responses = array('status' => 0);
        }
        return response()->json($responses);
    }

    public function insertLog($id)
    {
        $apps = SysSettings::where('setting_id', $id)->get();
        foreach($apps as $app){
            $newApp = new SysSettings();
            $newApp->setting_log_id      = $app->setting_id;
            $newApp->setting_code        = $app->setting_code;
            $newApp->setting_name        = $app->setting_name;
            $newApp->setting_value       = $app->setting_value;
            $newApp->setting_create_by   = $app->setting_create_by;
            $newApp->setting_create_date = $app->setting_create_date;
            $newApp->setting_update_by   = $app->setting_update_by;
            $newApp->setting_update_date = $app->setting_update_date;
            $newApp->setting_status      = $app->setting_status;
            $newApp->save();
        }
    }
}
