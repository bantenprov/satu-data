<?php
$results['sEcho'] = $sEcho;
$results['iTotalRecords'] = $results['iTotalDisplayRecords'] = $iTotalRecords;
if(count($applications))
{
    $i=0;
    $j=$start;
    foreach($applications as $data)
    {
        $act="";
        $status="-";
        $act.='<center><div class="btn-group">';
        if($data->setting_status > 0) {
            $status = '<span class="badge bgm-lightgreen">'.ucfirst($data->setting_status_name).'</span>';
        }else{
            $status = '<span class="badge bgm-red">'.ucfirst($data->setting_status_name).'</span>';
        }
        $action = (Auth::user()->can('read-applications') ? '<a href="'.route('application.detail',base64_encode($data->setting_id)).'" class="btn btn-primary waves-effect" data-toggle="tooltip" data-original-title="Detil" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-format-subject"></i></a>':'');
        if($data->setting_status > 0){
            $action .= (Auth::user()->can('update-applications') > 0 ? '&nbsp;<a href="'.route('application.update',base64_encode($data->setting_id)).'" class="btn btn-warning waves-effect update-btn" data-toggle="tooltip" data-original-title="Ubah" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-edit"></i></a>':'');
            $action .= (Auth::user()->can('delete-applications') > 0 ? '&nbsp;<a href="'.route('application.unactivate',base64_encode($data->setting_id)).'" class="btn btn-danger waves-effect unactivate-btn" data-toggle="tooltip" data-original-title="Non-Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-close"></i></a>':'');
        }else{
            $action = (Auth::user()->can('update-applications') > 0 ? '&nbsp;<a href="'.route('application.activate',base64_encode($data->setting_id)).'" class="btn btn-success waves-effect activate-btn" data-toggle="tooltip" data-original-title="Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-check"></i></a>':'');
        }

        $results['aaData'][$i] = array(
            ($j+1),
            $data->setting_code,
            $data->setting_name,
            $data->setting_value,
            dateEnToId($data->setting_create_date,'d M Y'),
            $status,
            $action
        );
        ++$i;
        ++$j;
    }
} else {
    for($i=0;$i<9;++$i) {
        if($i == 3){
            $results['aaData'][0][$i] = '<center>Tidak Ada Data.</center>';
        }else{
            $results['aaData'][0][$i] = '';
        }
    }
}
print($callback.'('.json_encode($results).')');