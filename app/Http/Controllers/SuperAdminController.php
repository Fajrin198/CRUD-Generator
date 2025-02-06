<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Schema;

class SuperAdminController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $columns = Schema::getColumnListing('menus');
        return view('super-admin.index', ['tittle' => 'Super Admin'], compact('menus','columns'));
    }
    public function store()
    {
        return redirect()->route('addMenu');
    }

    public function edit(Menu $item)
    {
        return view('superAdmin', compact('item'));
    }

    public function update(Request $request, Menu $item)
    {
        $item->update($request->all());
        return redirect()->route('superAdmin')->with('success', 'Data berhasil diubah.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('superAdmin')->with('success', 'Data berhasil dihapus.');
    }
}
