<?php
include_once "lib/Smarty.class.php";
include_once "config.php";
include_once "User.class.php";
$smarty = new Smarty();
$smarty->template_dir='tpl/templates/';//указываем путь к шаблонам
$smarty->compile_dir='tpl/templates_c/';
$smarty->config_dir='tpl/configs/';
$smarty->cache_dir='tpl/cache/';

//подтверждаем email адресс
   if(isset($_GET["activation"])){
       $user = new User();
        $act = $_GET["activation"];
        if($user->activationEmail($act)){
            $message = "Вы успешно подтвердили Ваш E-mail адрес.";
            $smarty->assign('message', $message);
            $content_page = $smarty->fetch("message.tpl");
            $smarty->assign('content_page', $content_page);
            $smarty->display('index.tpl');
        }

        else{
            $message = $user->error();
            $smarty->assign('message', $message);
            $content_page = $smarty->fetch("message.tpl");
            $smarty->assign('content_page', $content_page);
            $smarty->display('index.tpl');
        }
   }



