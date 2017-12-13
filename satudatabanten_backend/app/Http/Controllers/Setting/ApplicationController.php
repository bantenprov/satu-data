<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SysSettings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $default_order = 'setting_id';
        $order_field = array(
            'setting_code',
            'setting_name',
            'setting_value',
            'setting_create_date'
        );
        $order_key 	= (!$request->input('iSortCol_0'))?0:$request->input('iSortCol_0');
        $order 		= (!$request->input('iSortCol_0'))?$default_order:$order_field[$order_key];
        $sort 		= (!$request->input('sSortDir_0'))?'desc':$request->input('sSortDir_0');
        $search 	= (!$request->input('sSearch'))?'':strtoupper($request->input('sSearch'));

        $limit 		= (!$request->input('iDisplayLength'))?10:$request->input('iDisplayLength');
        $start 		= (!$request->input('iDisplayStart'))?0:$request->input('iDisplayStart');

        $sEcho 			= (!$request->input('callback'))?0:$request->input('callback');
        $iTotalRecords 	= DB::table('view_settings')->count();

        $query = DB::table('view_settings');
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
            $query = $query->orderBy('setting_id','ASC');
        } else {
            $query = $query->orderBy($order, $sort);
        }
        $applications = $query->limit($limit)->offset($start)->get();
        $start      = (($start == 0) ? 0 : $start);
        $callback 	= $request->input('callback');
        return view('pages.setting.application.json')
            ->with('sEcho', $sEcho)
            ->with('iTotalRecords', $iTotalRecords)
            ->with('applications', $applications)
            ->with('start', $start)
            ->with('callback', $callback);

    }

    public function detailApplication(Request $request, $id)
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

    public function updateApplication(Request $request, $id)
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

    public function updateApplicationSave(Request $request, $id)
    {
        $realId = base64_decode($id);
        $app = SysSettings::find($realId);
        $app->setting_code = $request->input('settingCode');
        $app->setting_name = $request->input('settingName');
        $app->setting_value = $request->input('settingValue');
        if($app->save()) {
            $responses = array('redirect' => route('application'), 'status'=> 'success', 'title' => 'Berhasil!', 'message' => 'Perubahan telah disimpan.');
        } else {
            $responses = array('redirect' => route('application.update',$id), 'status'=> 'danger', 'title' => 'Gagal!', 'message' => 'Terjadi kesalahan. Perubahan gagal disimpan.');
        }
        return response()->json($responses);
    }

    public function activateApplication(Request $request, $id)
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

    public function unactivateApplication(Request $request, $id)
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
