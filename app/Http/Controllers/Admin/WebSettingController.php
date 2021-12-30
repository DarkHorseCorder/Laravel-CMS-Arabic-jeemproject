<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\WebSetting;
use Illuminate\Http\Request;

class WebSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = WebSetting::firstOrFail();

        // return $setting;

        return view('admin.web-setting.index', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = WebSetting::firstOrFail();
        // return $setting;
        return view('admin.web-setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          // return $request->all();
          $setting = WebSetting::findOrFail($id);

          $request->is_blogs_offers == "on" ? $request->merge(['is_blogs_offers' => true]) : $request->merge(['is_blogs_offers' => false]);
          $request->is_services_offers == "on" ? $request->merge(['is_services_offers' => true]) : $request->merge(['is_services_offers' => false]);

          $setting->update($request->all());

          return redirect()->route('admin.setting.index');

    }
}
