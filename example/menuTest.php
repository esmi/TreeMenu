<?php
require __DIR__ . '/../vendor/autoload.php';
//include_once __DIR__ . "/src/Esmi/Menu.php";
use Esmi\Menu\Menu;

$extras = ['safe_label' => true];
$r = [
    [ 'id'=>100, 'parent'=>0, 'name'=>'root_a', 'uri' => "130.php"],

    [ 'id'=>101, 'parent'=>100, 'name'=>'bbbba', 'uri' => "130.php"],
    [ 'id'=>102, 'parent'=>101, 'name'=>'cccca', 'uri' => "130.php"],
    [ 'id'=>103, 'parent'=>101, 'name'=>'排程設定', 'uri' => "130.php"],

    [ 'id'=>10, 'parent'=>0, 'name'=>'root_b', 'uri' => "130.php"],
    [ 'id'=>11, 'parent'=>10, 'name'=>'11dddda', 'uri' => "130.php"],
    [ 'id'=>12, 'parent'=>11, 'name'=>'12dddda', 'uri' => "130.php"],
    [ 'id'=>13, 'parent'=>11, 'name'=>'電力控制', 'uri' => "130.php", 'label' => '<i class="fa fa-file-text fa-fw"></i> <font size="3">Hello World電力控制</font>', 'extras' => $extras ],
    [ 'id' => 130 , 'parent' => 13, 'name' => '13_1', 'uri' => "130.php"],
	[ 'id' => 131 , 'parent' => 13, 'name' => '13_2', 'uri' => "131.php"],
	[ 'id' => 132 , 'parent' => 13, 'name' => '13_3', 'uri' => "132.php"],
	[ 'id' => 133 , 'parent' => 13, 'name' => '13_4', 'uri' => "133.php", 'display' => false],

    [ 'id'=>300, 'parent'=>0, 'name'=>'登出', 'uri' => "130.php"],
];

//labelFormattor for $r
//   rootMenu formattor
//     subMenu formattor
//$menu = new \Esmi\Menu($r);
$m = new Menu($r);
$m->createMenu("test");
$menu = $m->getMenu();
//echo $m->render(['allow_safe_labels' => true]);

//get root menuitem of the KnpMenu
use Knp\Menu\Renderer\ListRenderer;
use Knp\Menu\Matcher\Matcher as Matcher;

$renderer = new ListRenderer(new \Knp\Menu\Matcher\Matcher());
echo $renderer->render($menu);
