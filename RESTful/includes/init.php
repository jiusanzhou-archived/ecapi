<?php

error_reporting(E_ALL);

if (__FILE__ == '')
{
    die('Fatal error code: 0');
}

define('ROOT_PATH', str_replace('RESTful/includes/init.php', '', str_replace('\\', '/', __FILE__)));

/* 初始化设置 */
@ini_set('memory_limit',          '64M');
@ini_set('session.cache_expire',  180);
@ini_set('session.use_trans_sid', 0);
@ini_set('session.use_cookies',   1);
@ini_set('session.auto_start',    0);
@ini_set('display_errors',        1);

if (DIRECTORY_SEPARATOR == '\\')
{
    @ini_set('include_path', '.;' . ROOT_PATH);
}
else
{
    @ini_set('include_path', '.:' . ROOT_PATH);
}

require(ROOT_PATH . 'data/config.php');

if (PHP_VERSION >= '5.1' && !empty($timezone))
{
    date_default_timezone_set($timezone);
}

$php_self = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
if ('/' == substr($php_self, -1))
{
    $php_self .= 'index.php';
}
define('PHP_SELF', $php_self);

require(ROOT_PATH . 'Restful//includes/cls_shop.php');
require(ROOT_PATH . 'Restful//includes/lib_base.php');
require(ROOT_PATH . 'Restful//includes/lib_common.php');

/* 对用户传入的变量进行转义操作。*/
if (!get_magic_quotes_gpc())
{
    if (!empty($_GET))
    {
        $_GET  = addslashes_deep($_GET);
    }
    if (!empty($_POST))
    {
        $_POST = addslashes_deep($_POST);
    }

    $_COOKIE   = addslashes_deep($_COOKIE);
    $_REQUEST  = addslashes_deep($_REQUEST);
}

/* 创建 ECSHOP 对象 */
$ecs = new ECS($db_name, $prefix);
define('DATA_DIR', $ecs->data_dir());
define('IMAGE_DIR', $ecs->image_dir());

/* 初始化数据库类 */
require(ROOT_PATH . 'includes/cls_mysql.php');
$db = new cls_mysql($db_host, $db_user, $db_pass, $db_name);
$db->set_disable_cache_tables(array($ecs->table('sessions'), $ecs->table('sessions_data'), $ecs->table('cart')));
$db_host = $db_user = $db_pass = $db_name = NULL;


/* 载入系统参数 */
$_CFG = load_config();

/* 载入语言文件 */
require(ROOT_PATH . 'languages/' . $_CFG['lang'] . '/common.php');

if (is_spider())
{
    /* 如果是蜘蛛的访问，那么默认为访客方式，并且不记录到日志中 */
    if (!defined('INIT_NO_USERS'))
    {
        define('INIT_NO_USERS', true);
        /* 整合UC后，如果是蜘蛛访问，初始化UC需要的常量 */
        if($_CFG['integrate_code'] == 'ucenter')
        {
             $user = & init_users();
        }
    }
    $_SESSION = array();
    $_SESSION['user_id']     = 0;
    $_SESSION['user_name']   = '';
    $_SESSION['email']       = '';
    $_SESSION['user_rank']   = 0;
    $_SESSION['discount']    = 1.00;
}

/* 初始化session */
include(ROOT_PATH . 'includes/cls_session.php');

$sess = new cls_session($db, $ecs->table('sessions'), $ecs->table('sessions_data'));


define('SESS_ID', $sess->get_session_id());

if(isset($_SERVER['PHP_SELF']))
{
    $_SERVER['PHP_SELF']=htmlspecialchars($_SERVER['PHP_SELF']);
}

// if (!defined('INIT_NO_USERS'))
// {
    /* 会员信息 */
    $user =& init_users();

//     if (!isset($_SESSION['user_id']))
//     {
//         /* 获取投放站点的名称 */
//         $site_name = isset($_GET['from'])   ? htmlspecialchars($_GET['from']) : addslashes($_LANG['self_site']);
//         $from_ad   = !empty($_GET['ad_id']) ? intval($_GET['ad_id']) : 0;

//         $_SESSION['from_ad'] = $from_ad; // 用户点击的广告ID
//         $_SESSION['referer'] = stripslashes($site_name); // 用户来源

//         unset($site_name);

//         if (!defined('INGORE_VISIT_STATS'))
//         {
//             visit_stats();
//         }
//     }

    if (empty($_SESSION['user_id']))
    {
        if ($user->get_cookie())
        {
            /* 如果会员已经登录并且还没有获得会员的帐户余额、积分以及优惠券 */
            if ($_SESSION['user_id'] > 0)
            {
                update_user_info();
            }
        }
        else
        {
            $_SESSION['user_id']     = 0;
            $_SESSION['user_name']   = '';
            $_SESSION['email']       = '';
            $_SESSION['user_rank']   = 0;
            $_SESSION['discount']    = 1.00;
            if (!isset($_SESSION['login_fail']))
            {
                $_SESSION['login_fail'] = 0;
            }
        }
    }

//     /* 设置推荐会员 */
//     if (isset($_GET['u']))
//     {
//         set_affiliate();
//     }

//     /* session 不存在，检查cookie */
//     if (!empty($_COOKIE['ECS']['user_id']) && !empty($_COOKIE['ECS']['password']))
//     {
//         // 找到了cookie, 验证cookie信息
//         $sql = 'SELECT user_id, user_name, password ' .
//                 ' FROM ' .$ecs->table('users') .
//                 " WHERE user_id = '" . intval($_COOKIE['ECS']['user_id']) . "' AND password = '" .$_COOKIE['ECS']['password']. "'";

//         $row = $db->GetRow($sql);

//         if (!$row)
//         {
//             // 没有找到这个记录
//            $time = time() - 3600;
//            setcookie("ECS[user_id]",  '', $time, '/');
//            setcookie("ECS[password]", '', $time, '/');
//         }
//         else
//         {
//             $_SESSION['user_id'] = $row['user_id'];
//             $_SESSION['user_name'] = $row['user_name'];
//             update_user_info();
//         }
//     }

//     if (isset($smarty))
//     {
//         $smarty->assign('ecs_session', $_SESSION);
//     }
// }

/* 判断是否支持 Gzip 模式 */
if (!defined('INIT_NO_SMARTY') && gzip_enabled())
{
    ob_start('ob_gzhandler');
}
else
{
    ob_start();
}

?>