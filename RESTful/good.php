<?php

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php'); //

/* 载入语言文件 */
require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/user.php');


/**
 * API数据返回
 *
 * @access  public
 * @param   array
 * @return  void
 */
function api_return($api_data, $data)
{

    include_once('includes/cls_json.php');
    $return_data = array(
        'version' => 0.1,
        'api_url' => 'good.php',
        'api_data' => $api_data,
        'error' => 0,
        'data' => $return_data['data'] = $data ? $data : ''
    );
    header('Content-type: application/json');
    die(JSON::encode($return_data));
}


$user_id = $_SESSION['user_id'];
$method = $_SERVER['REQUEST_METHOD'];
$resource  = isset($_REQUEST['api_data']) ? trim($_REQUEST['api_data']) : 'hot';

/* 根据不同的API_RESOURCE来做不同的处理 */
switch ($resource) {
    case 'hot':
        include_once('includes/controller/goods/lib_controller_list.php');
        api_return($resource, li_st());
        break;

    case 'view':
        include_once('includes/controller/goods/lib_controller_view.php');
        api_return($resource, view());
        break;

    case 'idcard':
        include_once('includes/controller/goods/lib_controller_new.php');
        api_return($resource, idcard());
        break;

    case 'secret':
        include_once('includes/controller/goods/lib_controller_secret.php');
        api_return($resource, secret());
        break;

    case 'order':
        include_once('includes/controller/goods/lib_controller_order.php');
        api_return($resource, order());
        break;
    
    default:
        # code...
        break;
}


?>