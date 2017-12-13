<?php
$results['sEcho'] = $sEcho;
$results['iTotalRecords'] = $results['iTotalDisplayRecords'] = $iTotalRecords;
if(count($groups))
{
    $i=0;
    $j=$start;
    foreach($groups as $data)
    {
        $act="";
        $status="-";
        $act.='<center><div class="btn-group">';
        if($data->group_state == 'active') {
            $status = '<span class="badge bgm-lightgreen">'.ucfirst($data->group_state).'</span>';
        }else{
            $status = '<span class="badge bgm-red">'.ucfirst($data->group_state).'</span>';
        }
        $action = (Auth::user()->can('read-groups') ? '<a href="'.route('group.detail',$data->group_id).'" class="btn btn-primary waves-effect" data-toggle="tooltip" data-original-title="Detil" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-format-subject"></i></a>':'');
        if($data->group_state == 'active'){
            $action .= (Auth::user()->can('update-groups') > 0 ? '&nbsp;<a href="'.route('group.update',$data->group_id).'" class="btn btn-warning waves-effect update-btn" data-toggle="tooltip" data-original-title="Ubah" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-edit"></i></a>':'');
            $action .= (Auth::user()->can('delete-groups') > 0 ? '&nbsp;<a href="'.route('group.unactivate',$data->group_id).'" class="btn btn-danger waves-effect unactivate-btn" data-toggle="tooltip" data-original-title="Non-Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-close"></i></a>':'');
        }else{
            $action = (Auth::user()->can('update-groups') > 0 ? '&nbsp;<a href="'.route('group.activate',$data->group_id).'" class="btn btn-success waves-effect activate-btn" data-toggle="tooltip" data-original-title="Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-check"></i></a>':'');
        }

        $results['aaData'][$i] = array(
            ($j+1),
            $data->group_id,
            $data->group_name,
            $data->group_title,
            dateEnToId($data->group_created,'d M Y'),
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