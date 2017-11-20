<?php
use Illuminate\Support\Facades\Session;
use App\Models\SysMenus;

function listmenu(){
	$menus = SysMenus::Menus(Session::get('roleId'))->get();
    if(Request::segment(1) != ''){
        $current_url = Request::segment(1);
    }if(Request::segment(2) != ''){
        if(Request::segment(2) == 'create' || Request::segment(2) == 'update' || Request::segment(2) == 'detail'){
            $current_url .= '';
        }else{
            $current_url .= '/'.Request::segment(2);
        }
    }
	$nav = '<ul class="main-menu">';
	foreach ($menus as $menu) {
	    if ($menu->menu_parent_id == 0 && $menu->menu_url == 'javascript:void(0);') {
            $thisMenu = SysMenus::ThisMenu($current_url)->first();
            if($menu->menu_id == $thisMenu->menu_parent_id){
                $nav .= '<li class="sub-menu toggled"><a href="' . $menu->menu_url . '" class="active"><i class="' . $menu->menu_icon . '"></i> <span class="nav-text">' . $menu->menu_name . '</span></a>';
                $nav .= '<ul style="display: block;">';
                $nav .= listsubmenu($menu->menu_id);
                $nav .= '</ul>';
                $nav .= '</li>';
            }else{
                $nav .= '<li class="sub-menu"><a href="' . $menu->menu_url . '"><i class="' . $menu->menu_icon . '"></i> <span class="nav-text">' . $menu->menu_name . '</span></a>';
                $nav .= '<ul>';
                $nav .= listsubmenu($menu->menu_id);
                $nav .= '</ul>';
                $nav .= '</li>';
            }
		}elseif ($menu->menu_parent_id == 0 && $menu->menu_url != 'javascript:void(0);') {
			$status = url($menu->menu_url);
			if ($status == Request::url()) {
                $nav .= '<li class="toggled"><a href="' . url($menu->menu_url) . '" class="active"><i class="' . $menu->menu_icon . '"></i> <span class="nav-text">' . $menu->menu_name . '</span></a>';
				$nav .= '</li>';
			}elseif ($status !=Request::url()) {
                $nav .= '<li><a href="' . url($menu->menu_url) . '"><i class="' . $menu->menu_icon . '"></i> <span class="nav-text">' . $menu->menu_name . '</span></a>';
				$nav .= '</li>';
			}
		}
	}
	$nav .= '</ul>';
    return $nav;
}

function listsubmenu($parentID=0) {
	$menus = SysMenus::SubMenus(Session::get('roleId'),$parentID)->get();
	if (count($menus)!= null) {
        $nav = '';
		foreach ($menus as $submenu) {
			$status = URL::to('/') . '/' . $submenu->menu_url;
			if ($submenu->menu_url == 'javascript:void(0);') {
			    if ($status == Request::url()) {
					$nav .= '<li class="sub-menu toggled"><a href="' . url($submenu->menu_url) . '" class="active"><i class="' . $submenu->menu_icon . '"></i> <span class="nav-text">' . $submenu->menu_name . '</span></a>';
					$nav .= '</li>';
				}elseif ($status !=Request::url()) {
                    $nav .= '<li class="sub-menu"><a href="' . url($submenu->menu_url) . '"><i class="' . $submenu->menu_icon . '"></i> <span class="nav-text">' . $submenu->menu_name . '</span></a>';
					$nav .= '</li>';
				}
			}elseif ($submenu->menu_url != 'javascript:void(0);') {
			    if ($status == Request::url()) {
                    $nav .= '<li class="toggled"><a href="' . url($submenu->menu_url) . '" class="active"><i class="' . $submenu->menu_icon . '"></i> <span class="nav-text">' . $submenu->menu_name . '</span></a>';
					$nav .= '</li>';
					
				}elseif ($status !=Request::url()) {
                    $nav .= '<li><a href="' . url($submenu->menu_url) . '"><i class="' . $submenu->menu_icon . '"></i> <span class="nav-text">' . $submenu->menu_name . '</span></a>';
					$nav .= '</li>';
				}
			}
		}

		return $nav;
	} else {
		return '';
	}
}