<?php

function count_project ($tasks, $name_project){
    $sum=0;
        foreach ($tasks as $key => $val){
            if ($val['project_id'] == $name_project ){
            $sum=array_count_values(array_column($tasks, 'project_id'))[$name_project];

            return $sum;
            } else {
                $sum=0;

            }
        }return $sum;
    }


function get_time_left ($date){
    date_default_timezone_set('Europe/Moscow');
    $final_date = date_create($date);
    $cur_date = date_create("now");
    if ($final_date>=$cur_date){
    $diff = date_diff($final_date, $cur_date);

    $format_diff = date_interval_format($diff,"%d %H %I");
    $arr = explode(" ", $format_diff);

    $hours= $arr[0] * 24 + $arr[1];
    $minutes = intval($arr[2]);
    $hours = str_pad($hours, 2, "0", STR_PAD_LEFT);
    $minutes = str_pad($minutes, 2, "0", STR_PAD_LEFT);
    $res[] = $hours;
    $res[] = $minutes;
    return $res;
    }
    return 0;

}
function get_normal_date ($date){
    $middle = strtotime($date);
    $new_date = date('d.m.Y', $middle);
    return $new_date;
}
