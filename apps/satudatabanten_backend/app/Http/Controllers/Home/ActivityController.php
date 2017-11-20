<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SysActivities;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class ActivityController extends Controller
{
    public function getIndex(Request $request)
    {
        $this->getHeader();
        return view('pages.home.activity');
    }
    public function getList(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $datas = DB::table('view_sys_activities')
            ->select(DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'activity_id',
                'activity_link',
                'activity_description',
                'activity_date',
                'activity_status_name')
            ->where('activity_user_id',$request->session()->get('userId'))
            ->get();
        $datatables = Datatables::of($datas);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }
        return $datatables->make(true);
    }
}
