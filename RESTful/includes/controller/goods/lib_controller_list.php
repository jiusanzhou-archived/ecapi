<?php

function li_st()
{
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            $type = isset($_GET['type'])    ? trim($_GET['type'])   : 'hot';
            if (!in_array($type, array('hot', 'best', 'new'))) {$type = 'hot';}
            if ($type == $'hot')
            {
                $time = isset($_GET['time'])    ? trim($_GET['time'])   : 'm';
                if (!in_array($time, array('w', 'm', 'y'))) {$time = 'm';}
            }
            if ( $isdetail == 0 )
            {
                $r_data = get_goods_info($goods_id);
            }
            else
            {
                $r_data = get_goods_info_detail($goods_id);
            }
            return $r_data;
            break;
        
        default:
            return 'This API can not support ' . $_SERVER['REQUEST_METHOD'] . ' method';
            break;
    }
}

?>