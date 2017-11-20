<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SysMenus extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'back_menus';

    protected $primaryKey = 'menu_id';

    public $timestamps = false;

    public static function Menus($id)
    {
        return DB::table('permission_role')
            ->select(DB::raw('back_menus.*'))
            ->join('permissions','permission_role.permission_id','=','permissions.id')
            ->join('back_menus','permissions.menu_id','=','back_menus.menu_id')
            ->where('permission_role.role_id','=', $id)
            ->where('back_menus.menu_status',1)
            ->groupBy('back_menus.menu_id')
            ->orderBy('back_menus.menu_sort', 'ASC');
    }

    public static function SubMenus($id, $menu_id)
    {
        return DB::table('permission_role')
                ->select(DB::raw('back_menus.*'))
                ->join('permissions','permission_role.permission_id','=','permissions.id')
                ->join('back_menus','permissions.menu_id','=','back_menus.menu_id')
                ->where('permission_role.role_id','=', $id)
                ->where('back_menus.menu_parent_id', $menu_id)
                ->where('back_menus.menu_status',1)
                ->groupBy('back_menus.menu_id')
                ->orderBy('back_menus.menu_sort', 'ASC');
    }

    public static function scopeThisMenu($query, $url)
    {
        return $query->select(DB::raw('back_menus.menu_id,back_menus.menu_parent_id'))
            ->where('back_menus.menu_url','=', $url);
    }

    public static function Parent($id){
        return DB::table('back_menus')
            ->select(DB::raw('back_menus.menu_id,back_menus.menu_parent_id,back_menus.menu_url,back_menus.menu_name,back_menus.menu_icon,back_menus.menu_sort,back_menus.menu_status,1 AS menu_level, permissions.name'))
            ->join('permissions','back_menus.menu_id','=','permissions.menu_id')
            ->where('menu_parent_id', '=', $id)
            ->where('back_menus.menu_status',1);
    }

    public static function Child($id, $sort){
        return DB::table('back_menus')
            ->select(DB::raw('back_menus.menu_id,back_menus.menu_parent_id,back_menus.menu_url,back_menus.menu_icon,back_menus.menu_name,CONCAT('.$sort.','.'back_menus.menu_sort) AS menu_sort,back_menus.menu_status,2 AS menu_level, permissions.name'))
            ->join('permissions','back_menus.menu_id','=','permissions.menu_id')
            ->where('menu_parent_id', '=', $id)
            ->where('back_menus.menu_status',1);
    }

    public static function Childs($id, $sort){
        return DB::table('back_menus')
            ->select(DB::raw('back_menus.menu_id,back_menus.menu_parent_id,back_menus.menu_url,back_menus.menu_icon,back_menus.menu_name,CONCAT('.$sort.','.'back_menus.menu_sort) AS menu_sort,back_menus.menu_status,3 AS menu_level, permissions.name'))
            ->join('permissions','back_menus.menu_id','=','permissions.menu_id')
            ->where('menu_parent_id', '=', $id)
            ->where('back_menus.menu_status',1);
    }

    public static function MenuAll()
    {
        return DB::table('back_menus')
            ->select(DB::raw('back_menus.menu_id, back_menus.menu_parent_id, back_menus.menu_name, permissions.name'))
            ->join('permissions','back_menus.menu_id','=','permissions.menu_id')
            ->where('back_menus.menu_status',1);
    }

    public static function Permissions($id)
    {
        return DB::table('back_menus')
            ->select(DB::raw('back_menus.menu_id, back_menus.menu_parent_id, back_menus.menu_name, permissions.name'))
            ->join('permissions','back_menus.menu_id','=','permissions.menu_id')
            ->where('back_menus.menu_id',$id)
            ->where('back_menus.menu_status',1);
    }

}
