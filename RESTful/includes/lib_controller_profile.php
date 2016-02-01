<?php
    function profile()
    {
        include_once(ROOT_PATH . 'includes/lib_transaction.php');
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                return get_profile($_SESSION['user_id']);
                break;
            
            default:
                return 'This API can not support ' . $_SERVER['REQUEST_METHOD'] . ' method';
                break;
        }
    }
?>