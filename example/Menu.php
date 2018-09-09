<?php
use Esmi\TreeMenu;

class Menu {

	protected $menu;
	protected $tree;

    public function __construct($name="test") {

        $this->menu= new TreeMenu($this->menuArray());
        $this->menu->createMenu($name, ['class' => 'has-sub']);
    }

    function getMenu() {
        return $this->menu;
		}

    function menuArray() {
        $extras = ['safe_label' => true];
        return $r = [
            ['id' => 100 , 'parent' => 0, 'name' => '會員專區',      'uri' => "/hello", 'attributes' => [ 'class' => 'has-sub']],
            ['id' => 200 , 'parent' => 0, 'name' => '熱門活動',      'uri' => "#", 'attributes' => [ 'class' => 'has-sub']],
            ['id' => 300 , 'parent' => 0, 'name' => '購買禮物卡',    'uri' => "#"],
            ['id' => 400 , 'parent' => 0, 'name' => '專屬服務統覽',  'uri' => "#"],
            ['id' => 500 , 'parent' => 0, 'name' => '常見問題',      'uri' => "#", 'attributes' => [ 'class' => 'has-sub']],
            ['id' => 600 , 'parent' => 0, 'name' => '認識高美館',    'uri' => "chgpassword.php"],

            // 100 menu
            ['id'=>101, 'parent'=>100, 'name' => '個人資料維護',  'uri' => "account.php"],
            ['id'=>102, 'parent'=>100, 'name' => '辦理續卡',      'uri' => "group-setup.php"],
            ['id'=>103, 'parent'=>100, 'name' => '查詢個人紀綠',  'uri' => "accApply-setup.php"],
            ['id'=>104, 'parent'=>100, 'name' => '更改密碼',      'uri' => "accApply-setup.php"],
            ['id'=>105, 'parent'=>100, 'name' => '填寫付款明細',  'uri' => "accApply-setup.php"],

            // 200 menu
            ['id'=>201, 'parent'=>200, 'name' => '優惠活動', 	  'uri' => "room-stat.php"],
            ['id'=>202, 'parent'=>200, 'name' => '會員專屬活動' , 'uri' => "class-setup.php"],
            ['id'=>203, 'parent'=>200, 'name' => '活動回顧' ,     'uri' => "room-exception.php"],

            //600 menu
            ['id'=>601, 'parent'=>600, 'name' => '各項申辦流程' , 'uri' => "scada_e.php"],

        ];
		}
}
