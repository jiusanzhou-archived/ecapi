<?php
    function secret($db, $ecs)
    {

        switch ($_SERVER['REQUEST_METHOD']) {
            case 'POST':
                $sel_question = empty($_POST['sel_question']) ? '' : compile_str($_POST['sel_question']);
                $passwd_answer = isset($_POST['passwd_answer']) ? compile_str(trim($_POST['passwd_answer'])) : '';
                /* 写入密码提示问题和答案 */
                if (!empty($passwd_answer) && !empty($sel_question))
                {
                    $sql = 'UPDATE ' . $ecs->table('users') . " SET `passwd_question`='$sel_question', `passwd_answer`='$passwd_answer'  WHERE `user_id`='" . $_SESSION['user_id'] . "'";
                    $db->query($sql);
                    $r_data = 'Update Secret Question Success!';
                }
                else
                {
                    $r_data = 'Update Secret Question Failed!';
                }
                return $r_data;
                break;
            
            default:
                return 'This API can not support ' . $_SERVER['REQUEST_METHOD'] . ' method';
                break;
        }
    }
?>