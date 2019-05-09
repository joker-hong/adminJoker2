<?php
/**
 * Created by PhpStorm.
 * User: masswise
 * Date: 2019/4/25
 * Time: 10:08
 */

namespace App\Models\Traits;
use Cache;
use App\Handlers\Tree;

trait RbacCheck
{

    protected $menu_cache = '_menu_cache'; //菜单缓存key

    /**
     * 获取树形菜单导航栏
     * @return array
     */
    public function getMenus()
    {
        $menu_cache = $this->id . $this->menu_cache;

        if (!Cache::tags(['rbac', 'menus'])->has($menu_cache)) {
            $rules = [];
            foreach ($this->roles as $role) {

                $rules = array_merge($rules, $role->rulesPublic()->toArray());
            }

            if ($rules) {
                $rules = unique_arr($rules);
            }

            /**将权限路由存入缓存中*/
            Cache::tags(['rbac', 'menus'])->put($menu_cache, $rules, 86400);
        }

        $rules = Cache::tags(['rbac', 'menus'])->get($menu_cache);
        return Tree::array_tree($rules);
    }
}