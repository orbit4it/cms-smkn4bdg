<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Helpers\MenuHelper;

class SettingController extends Controller
{
    public function index()
    {
        $actives = MenuHelper::getNavigationActive();

        $actives_default = Setting::where('meta_key', 'navs_active')->first()->value;

        $all_navs = MenuHelper::getNavigationList();

        $keys = [];

        $urls = collect($actives_default)->pluck('url')->toArray();

        foreach ($all_navs as $key => $nav) {
            if (in_array($nav->url, $urls)) {
                unset($all_navs[$key]);
            }
        }

        $active_rendered = MenuHelper::renderAdminActives($actives);

        return view('admin.setting.setting', [
            'active' => $active_rendered,
            'navs' => $all_navs,
        ]);
    }

    public function update(Request $request)
    {
        try {
            foreach ($request->data as $key => $data) {
                $setting = Setting::firstOrCreate([
                    'meta_key' => $key
                ]);
                $setting->meta_value = $data;
                $setting->save();
            }
            return response()->json(['message' => 'success'], 200);
        } catch (\Exception $exception) {

            return response()->json(['message' => 'error'], 422);
        }
    }
}
