<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuRequest;
use App\Menu;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    public function index()
    {
        $menus = Menu::all();

        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menus.create');
    }

    public function store(StoreMenuRequest $request)
    {
        Menu::create($request->all());

        return redirect()->route('admin.menus.index');
    }
}
