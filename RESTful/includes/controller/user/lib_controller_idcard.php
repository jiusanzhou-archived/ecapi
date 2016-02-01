<?php

function idcard()
{
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            return get_idcard_list();//get_user_orders($user_id, $limit, $page);
            break;
        
        case 'POST':
            $idcard = array(
                'user_id'       => $_SESSION['user_id'],
                'idcard_id'     => intval($_POST['idcard_id']),
                'default'       => intval($_POST['default']),
                'idcard_name'   => isset($_POST['name'])      ? compile_str(trim($_POST['name']))      : '',
                'idcard_img_z'  => isset($_POST['img_z'])     ? compile_str(trim($_POST['img_z']))     : '',
                'idcard_img_f'  => isset($_POST['img_f'])     ? compile_str(trim($_POST['img_f']))     : '',
                'idcard_num'    => isset($_POST['id_number']) ? compile_str(trim($_POST['id_number'])) : '',
                );
            return update_idcard($idcard);
            break;
        
        case 'DELETE':
            if (drop_idcard($idcard_id))
            {
                $r_data = 'Delete IdCard Success!';
            }
            else
            {
                $r_data = 'Delete IdCard Failed!';
            }
            return $r_data;
            break;
        
        default:
            return 'This API can not support ' . $_SERVER['REQUEST_METHOD'] . ' method';
            break;
    }
}

/**
 *  添加或更新指定用户的实名认证
 *
 * @access  public
 * @param   array       $idcard
 * @return  bool
 */
function update_idcard($idcard)
{
    $idcard_id = intval($idcard['idcard_id']);
    unset($idcard['idcard_id']);

    if ($idcard_id > 0)
    {
         /* 更新指定记录 */
        $GLOBALS['db']->autoExecute($GLOBALS['ecs']->table('user_idcard'), $idcard, 'UPDATE', 'idcard_id = ' .$idcard_id . ' AND user_id = ' . $idcard['user_id']);
    }
    else
    {
        /* 插入一条新记录 */
        $GLOBALS['db']->autoExecute($GLOBALS['ecs']->table('user_idcard'),  $idcard, 'INSERT');
        $idcard_id = $GLOBALS['db']->insert_id();
    }

    if (isset($idcard['defalut']) && $idcard['default'] > 0 && isset($idcard['user_id']))
    {
        $sql = "UPDATE ".$GLOBALS['ecs']->table('users') .
                " SET idcard_id = '".$idcard_id."' ".
                " WHERE user_id = '" .$idcard['user_id']. "'";
        $GLOBALS['db'] ->query($sql);
    }

    return true;
}

/**
 * 删除一个实名认证
 *
 * @access  public
 * @param   integer $id
 * @return  boolean
 */
function drop_idcard($id)
{
    $sql = "SELECT user_id FROM " .$GLOBALS['ecs']->table('idcard') . " WHERE idcard_id = '$id'";
    $uid = $GLOBALS['db']->getOne($sql);

    if ($uid != $_SESSION['user_id'])
    {
        return false;
    }
    else
    {
        $sql = "UPDATE " .$GLOBALS['ecs']->table('user_address') . " SET del = 1 WHERE idcard_id = '$id'";
        $res = $GLOBALS['db']->query($sql);
        return $res;
    }
}

/**
 * 取得用户实名认证列表
 * @param   int     $user_id    用户编号
 * @return  array
 */
function get_idcard_list()
{
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM " . $GLOBALS['ecs']->table('idcard') .
            " WHERE user_id = '$user_id' AND del = 0 LIMIT 5";

    return $GLOBALS['db']->getAll($sql);
}

?>