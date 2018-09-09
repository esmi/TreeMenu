<?php
require __DIR__ . "/../vendor/autoload.php";

include_once "Menu.php";

//$menu = new Menu($recs);
$menu = new Menu();
$m = $menu->getMenu();

$menu->undisplayChild(['登出', '13_4','排程設定']);

echo $menu->render();

 ?>
