<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buah;
use App\Models\Menu;
use Illuminate\Support\Facades\Schema;

class BuahController extends Controller
{
    public function index()
    {
        $displayForm = [

            [
	'label' => "Input Nama",
	'type' => "text",
	'validation' => "required",
    ],


            [
	'label' => "Input Warna",
	'type' => "text",
	'validation' => "required",
    ],
];
        $data = Buah::all();
        $menus = Menu::all();
        $columns = Schema::getColumnListing('buah');
        $excludedColumns = ['id', 'created_at', 'updated_at'];
        $filteredColumns = array_diff($columns, $excludedColumns);
        return view('generated-crud.show', ['tittle' => 'Buah', 'routeName'=> 'buah-buahan'], compact('data','menus','filteredColumns','displayForm'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Nama' => 'required|string|max:255',
'Warna' => 'required|string|max:255',

        ]);

        Buah::create($validatedData);
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
    public function edit(Buah $item)
    {
        return view('generated-crud.edit', compact('item'));
    }

    public function update(Request $request, Buah $item)
    {
        $item->update($request->all());
        return redirect()->route('generated-crud.show')->with('success', 'Data berhasil diubah.');
    }

    public function destroy(Buah $item)
    {
        $item->delete();
        return redirect()->route('buah-buahan.index')->with('success', 'Data berhasil dihapus.');
    }
}