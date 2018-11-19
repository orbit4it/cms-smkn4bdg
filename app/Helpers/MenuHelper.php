<?php
/**
 * Created by PhpStorm.
 * User: mirfa
 * Date: 11/14/2018
 * Time: 20:30
 */

namespace App\Http\Helpers;


use App\Halaman;
use App\Menu;
use App\Page;
use App\Setting;
use Illuminate\Support\Facades\Request;

class MenuHelper
{
    public static function getMenu($menu = null)
    {
        if (!$menu) {
            $menu = Menu::whereNull('parent')->get();
        }
        $helper = new MenuHelper();
        $helper->find($menu);
        return $menu;
    }

    private function find(&$menus)
    {
        foreach ($menus as $menu) {
            $menu->child = Menu::where('parent', $menu->id)->get();

            foreach ($menu->child as $item) {
                if (Menu::where('parent', $item->id)->count()) {
                    $this->find($menu->child);
                }
            }
        }
    }

    public static function generateSlug($menu)
    {
        $menus = new MenuHelper();
        $menus = $menus->generateMenu($menu, []);
        $menus = array_reverse($menus);
        $menu_slug = collect($menus)->pluck('slug')->toArray();
        $menu_slug = implode('/', $menu_slug);

        return $menu_slug;
    }

    private function generateMenu($menu, $result)
    {
        $result[] = $menu;

        if ($menu->parent) {
            return $this->generateMenu($menu->menu_parent, $result);
        }

        return $result;
    }

    public static function getNavigationList()
    {
        $pages = Halaman::all()->map(function ($page) {
            return (object)[
                'url' => 'page-id/' . $page->id_halaman,
                'name' => $page->judul,
                'type' => 'page'
            ];
        });

        $navs_list = collect(Setting::where('meta_key', 'navs_list')->first()->value)->merge($pages);

        $result = $navs_list->map(function ($menu, $key) {
            return (object)[
                'id' => $key,
                'url' => $menu->url,
                'name' => $menu->name,
                'type' => $menu->type ?? 'navs_list'
            ];
        });

        return $result;
    }

    public static function getNavigationActiveList()
    {
        return Setting::where('meta_key', 'navs_active')->first()->value;
    }

    public static function getNavigationActive()
    {
        $navs = Setting::where('meta_key', 'navs_active')->first()->value;

        $childs = [];

        $keys = [];

        foreach ($navs as $key => $nav) {
            if ($nav->parent !== null) {
                $childs[] = $nav;
                $keys[] = $key;
            }
        }

        MenuHelper::getChildActive($navs, $childs);

        foreach ($keys as $key)
            unset($navs[$key]);

        return $navs;
    }

    private static function getChildActive(&$navs, $childs)
    {
        foreach ($navs as $nav) {
            $nav->child = [];
            foreach ($childs as $child) {
                if ($nav->id == $child->parent) {
                    $nav->child[] = $child;
                }
            }
            if (count($nav->child) === 0) {
                $nav->child = null;
            }
        }
    }

    public static function renderNavbar()
    {
        $result = '';

        foreach (MenuHelper::getNavigationActive() as $nav) {
            $result .= '<li class="nav-item my-2 px-xl-3 px-2 font-weight-bold ' . ($nav->child ? 'dropdown' : '') . '">
                        <a class="nav-link ' . ($nav->child ? 'dropdown-toggle' : '') . ' px-2" href ="' . url($nav->url ?? '') . '" role="button"
                           data-toggle = "' . ($nav->child ? 'dropdown' : '') . '" aria-haspopup="true" aria-expanded="false">
                            <span class="tiny-text ' . (Request::segment(1) == $nav->url ? 'dark-yellow' : '') . '" >' . $nav->name . '</span>
                        </a>';
            if ($nav->child) {
                MenuHelper::renderChildNavbar($result, $nav);
            }
            $result .= '</li >';
        }

        return $result;
    }

    private static function renderChildNavbar(&$result, $nav)
    {
        $result .= '<div class="dropdown-menu medium-text border-0">';
        foreach ($nav->child as $child) {
            $result .= '<a class="dropdown-item ' . ($child->child ? 'dropdown-toggle' : '') . ' tiny-text dark-grey" href = "' . url($child->url ?? '') . '" >
                                        ' . ($child->child ? '' : '<i class="fa fa-caret-right mr-2" ></i >') . '
                                        ' . $child->name . '
                                    </a >';

            if ($child->child) {
                MenuHelper::renderChildNavbar($result, $child);
            }

        }
        $result .= '</div >';
    }

    public static function renderAdminActives($menus)
    {
        $result = '<ul class="list-group sortable">';
        foreach ($menus as $menu) {
            $result .= MenuHelper::renderListItem($menu);
        }
        $result .= '</ul>';

        return $result;
    }

    private static function renderChildActives($menu)
    {
        $result = '';
        foreach ($menu->child as $child) {
            $result .= MenuHelper::renderListItem($child);

        }
        return $result;
    }

    private static function renderListItem($menu)
    {
        $result = '<li class="list-group-item" data-id="' . $menu->id . '"
                                                        data-name="' . $menu->name . '" data-url="' . $menu->url . '"
                                                        data-parent="' . $menu->parent . '">
                                                            <div class="sortable-title">
                                                                <span><i class="fa fa-arrows" aria-hidden="true"></i>
                                                                    ' . $menu->name . '</span>
                                                            </div>
                                                        <ul class="list-group sortable">';
        if ($menu->child) {
            $result .= MenuHelper::renderChildActives($menu);
        }
        $result .= '</ul></li>';

        return $result;
    }
}