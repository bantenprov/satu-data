<?php
$results['sEcho'] = $sEcho;
$results['iTotalRecords'] = $results['iTotalDisplayRecords'] = $iTotalRecords;
if(count($datasets))
{
    $i=0;
    $j=$start;
    foreach($datasets as $data)
    {
        $act="";
        $status="-";
        $act.='<center><div class="btn-dataset">';
        if($data->dataset_state == 'active') {
            $status = '<span class="badge bgm-lightgreen">'.ucfirst($data->dataset_state).'</span>';
        }else{
            $status = '<span class="badge bgm-red">'.ucfirst($data->dataset_state).'</span>';
        }
        $action = (Auth::user()->can('read-datasets') ? '<a href="'.route('dataset.detail',$data->dataset_id).'" class="btn btn-primary waves-effect" data-toggle="tooltip" data-original-title="Detil" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-format-subject"></i></a>':'');
        if($data->dataset_state == 'active'){
            $action .= (Auth::user()->can('update-datasets') > 0 ? '&nbsp;<a href="'.route('dataset.update',$data->dataset_id).'" class="btn btn-warning waves-effect update-btn" data-toggle="tooltip" data-original-title="Ubah" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-edit"></i></a>':'');
            $action .= (Auth::user()->can('delete-datasets') > 0 ? '&nbsp;<a href="'.route('dataset.unactivate',$data->dataset_id).'" class="btn btn-danger waves-effect unactivate-btn" data-toggle="tooltip" data-original-title="Non-Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-close"></i></a>':'');
        }else{
            $action = (Auth::user()->can('update-datasets') > 0 ? '&nbsp;<a href="'.route('dataset.activate',$data->dataset_id).'" class="btn btn-success waves-effect activate-btn" data-toggle="tooltip" data-original-title="Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-check"></i></a>':'');
        }

        $results['aaData'][$i] = array(
            ($j+1),
            $data->dataset_id,
            $data->dataset_name,
            $data->dataset_title,
            dateEnToId($data->dataset_metadata_created,'d M Y'),
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