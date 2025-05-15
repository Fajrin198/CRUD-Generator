<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class AdminController extends Controller
{
    public function admin()
    {
        $menus = Menu::all();
        return view('admin', ['tittle' => 'Dashboard'], compact('menus'));
    }
}
