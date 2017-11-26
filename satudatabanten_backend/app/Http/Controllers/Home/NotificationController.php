<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SysNotifications;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class NotificationController extends Controller
{
    public function getIndex(Request $request)
    {
        $this->getHeader();
        return view('pages.home.notification');
    }

    public function getList(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $datas = DB::table('view_sys_notifications')
                ->select(DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                                'notification_id',
                                'notification_link',
                                'notification_message',
                                'notification_date',
                                'notification_status_name')
                ->where('notification_read_user_id',$request->session()->get('userId'))
                ->get();
        $datatables = Datatables::of($datas);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }
        return $datatables->make(true);
    }
}
