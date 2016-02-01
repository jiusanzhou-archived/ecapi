<?php

function address()
{
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            $r_data = get_consignee_list($_SESSION['user_id']);
            return $r_data;
            break;

        case 'DELETE':
            $consignee_id = intval($_GET['id']);

            if (drop_consignee($consignee_id))
            {
                $r_data = 'Delete Address Success!';
            }
            else
            {
                $r_data = 'Delete Address Failed!';
            }
            return $r_data;
            break;

        case 'POST':
            $address = array(
                'user_id'    => $_SESSION['user_id'],
                'address_id' => intval($_POST['address_id']),
                'country'    => isset($_POST['country'])   ? intval($_POST['country'])  : 0,
                'province'   => isset($_POST['province'])  ? intval($_POST['province']) : 0,
                'city'       => isset($_POST['city'])      ? intval($_POST['city'])     : 0,
                'district'   => isset($_POST['district'])  ? intval($_POST['district']) : 0,
                'address'    => isset($_POST['address'])   ? compile_str(trim($_POST['address']))    : '',
                'consignee'  => isset($_POST['consignee']) ? compile_str(trim($_POST['consignee']))  : '',
                'email'      => isset($_POST['email'])     ? compile_str(trim($_POST['email']))      : '',
                'tel'        => isset($_POST['tel'])       ? compile_str(make_semiangle(trim($_POST['tel']))) : '',
                'mobile'     => isset($_POST['mobile'])    ? compile_str(make_semiangle(trim($_POST['mobile']))) : '',
                'best_time'  => isset($_POST['best_time']) ? compile_str(trim($_POST['best_time']))  : '',
                'sign_building' => isset($_POST['sign_building']) ? compile_str(trim($_POST['sign_building'])) : '',
                'zipcode'       => isset($_POST['zipcode'])       ? compile_str(make_semiangle(trim($_POST['zipcode']))) : '',
                );
            if (update_address($address))
            {
                $r_data = 'Update Address Success!';
            }
            else
            {
                $r_data = 'Update Address Failed!';
            }
            return $r_data;
            break;
        
        default:
            return 'This API can not support ' . $_SERVER['REQUEST_METHOD'] . ' method';
            break;
    }
}

/**
 * 删除一个收货地址
 *
 * @access  public
 * @param   integer $id
 * @return  boolean
 */
function drop_consignee($id)
{
    $sql = "SELECT user_id FROM " .$GLOBALS['ecs']->table('user_address') . " WHERE address_id = '$id'";
    $uid = $GLOBALS['db']->getOne($sql);

    if ($uid != $_SESSION['user_id'])
    {
        return false;
    }
    else
    {
        $sql = "DELETE FROM " .$GLOBALS['ecs']->table('user_address') . " WHERE address_id = '$id'";
        $res = $GLOBALS['db']->query($sql);

        return $res;
    }
}

/**
 *  添加或更新指定用户收货地址
 *
 * @access  public
 * @param   array       $address
 * @return  bool
 */
function update_address($address)
{
    $address_id = intval($address['address_id']);
    unset($address['address_id']);

    if ($address_id > 0)
    {
         /* 更新指定记录 */
        $GLOBALS['db']->autoExecute($GLOBALS['ecs']->table('user_address'), $address, 'UPDATE', 'address_id = ' .$address_id . ' AND user_id = ' . $address['user_id']);
    }
    else
    {
        /* 插入一条新记录 */
        $GLOBALS['db']->autoExecute($GLOBALS['ecs']->table('user_address'), $address, 'INSERT');
        $address_id = $GLOBALS['db']->insert_id();
    }

    if (isset($address['defalut']) && $address['default'] > 0 && isset($address['user_id']))
    {
        $sql = "UPDATE ".$GLOBALS['ecs']->table('users') .
                " SET address_id = '".$address_id."' ".
                " WHERE user_id = '" .$address['user_id']. "'";
        $GLOBALS['db'] ->query($sql);
    }

    return true;
}

/**
 * 取得收货人地址列表
 * @param   int     $user_id    用户编号
 * @return  array
 */
function get_consignee_list($user_id)
{
    $sql = "SELECT * FROM " . $GLOBALS['ecs']->table('user_address') .
            " WHERE user_id = '$user_id' LIMIT 5";

    return $GLOBALS['db']->getAll($sql);
}

?>