<?php
namespace app\widgets\admin_menu;

use app\models\User;
use Yii;
use yii\base\Widget;

class AdminMenu extends Widget
{

    /**
     * Массив элементов меню
      [
      [
      'name' => '', // string название
      'url' => '', // string ссылка
      'aliases' => false, // string, array алиасы, для подсветки текущего роута
      'icon' => 'fa fa-link', //иконка элемента
      'parent' => false, //если есть дочерние элементы
      'chield_elements' => [
      [
      'name' => '', // string название
      'url' => '', // string ссылка
      'aliases' => false, // string, array алиасы, для подсветки текущего роута
      ]
      ]
      ]
      ];
     * 
     */
    public $menu;

    /**
     *  id пользователя
     */
    public $user_id;

    /**
     * Фильтрация меню на основе RBAC
     */
    public $rbac_access_control = false;

    public function init()
    {
        if ($this->rbac_access_control) {
            $this->menu = $this->getAssignedMenu();
        }

        parent::init();
    }

    public function getAssignedMenu()
    {
        foreach ($this->menu ?? [] as $key => $value) {

            $available = false;

            if ($value['parent'] == true) {
                foreach ($value['chield_elements'] ?? [] as $k => $v) {
                    if ($this->isAvailable($v['url'])) {
                        $available = true;
                    } else {
                        unset($this->menu[$key]['chield_elements'][$k]);
                    }
                }

                if (!$available) {
                    unset($this->menu[$key]);
                }
            } else {

                if (!$this->isAvailable($value['url'])) {
                    unset($this->menu[$key]);
                }
            }
        }
        
        return $this->menu;
    }

    public function isAvailable($url)
    {
        $permissions = $this->getPermissions();

        $available = false;
        
        array_walk($permissions, function($var) use (&$available, $url) {
            if (substr($var, -1) == '*') {
                $pattern = substr($var, 0, -2);
                if(preg_match("|{$pattern}|", $url)){                   
                    $available = true;
                }
                
            }
        });
        

        return (in_array([
                $url,
                $url . '/',
                $url . '/index',
                $url . '/*',
                ],
                $permissions) or $available);
    }

    public function getPermissions(): array
    {

        $manager = \Yii::$app->authManager;
        foreach (array_keys($manager->getPermissions()) as $name) {
            if ($name[0] == '/') {
                $permissions[] = $name;
            }
        }

        return $permissions ?? [];
    }

    public function run()
    {
        return $this->render('index', [
                'menu' => $this->menu
        ]);
    }
}
