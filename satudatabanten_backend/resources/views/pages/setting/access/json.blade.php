<?php
$results['sEcho'] = $sEcho;
$results['iTotalRecords'] = $results['iTotalDisplayRecords'] = $iTotalRecords;
if(count($accesses))
{
    $i=0;
    $j=$start;
    foreach($accesses as $data)
    {
        $act="";
        $status="-";
        $act.='<center><div class="btn-group">';
        if($data->status > 0) {
            $status = '<span class="badge bgm-lightgreen">'.ucfirst($data->status_name).'</span>';
        }else{
            $status = '<span class="badge bgm-red">'.ucfirst($data->status_name).'</span>';
        }
        $action = (Auth::user()->can('read-accesses') ? '<a href="'.route('access.detail',base64_encode($data->id)).'" class="btn btn-primary waves-effect" data-toggle="tooltip" data-original-title="Detil" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-format-subject"></i></a>':'');
        if($data->status > 0){
            $action .= (Auth::user()->can('update-accesses') > 0 ? '&nbsp;<a href="'.route('access.update',base64_encode($data->id)).'" class="btn btn-warning waves-effect update-btn" data-toggle="tooltip" data-original-title="Ubah" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-edit"></i></a>':'');
            $action .= (Auth::user()->can('delete-accesses') > 0 ? '&nbsp;<a href="'.route('access.unactivate',base64_encode($data->id)).'" class="btn btn-danger waves-effect unactivate-btn" data-toggle="tooltip" data-original-title="Non-Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-close"></i></a>':'');
        }else{
            $action = (Auth::user()->can('update-accesses') > 0 ? '&nbsp;<a href="'.route('access.activate',base64_encode($data->id)).'" class="btn btn-success waves-effect activate-btn" data-toggle="tooltip" data-original-title="Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-check"></i></a>':'');
        }

        $results['aaData'][$i] = array(
            ($j+1),
            ucfirst($data->display_name),
            ucfirst($data->status_name),
            dateEnToId($data->created_at,'d M Y'),
            $status,
            $action
        );
        ++$i;
        ++$j;
    }
} else {
    for($i=0;$i<6;++$i) {
        if($i == 3){
            $results['aaData'][0][$i] = '<center>Tidak Ada Data.</center>';
        }else{
            $results['aaData'][0][$i] = '';
        }
    }
}
print($callback.'('.json_encode($results).')');