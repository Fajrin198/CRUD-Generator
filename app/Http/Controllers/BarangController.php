<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Menu;
use Illuminate\Support\Facades\Schema;

class BarangController extends Controller
{
    public function index()
    {
        $displayForm = [

            [
	'label' => "Nama :",
	'type' => "text",
	'validation' => "required",
    ],


            [
	'label' => "Jumlah :",
	'type' => "text",
	'validation' => "required",
    ],


            [
	'label' => "Harga :",
	'type' => "text",
	'validation' => "required",
    ],
];
        $data = Barang::all();
        $menus = Menu::all();
        $columns = Schema::getColumnListing('barang');
        $excludedColumns = ['id', 'created_at', 'updated_at'];
        $filteredColumns = array_diff($columns, $excludedColumns);
        return view('generated-crud.show', ['tittle' => 'Barang', 'routeName'=> 'barang'], compact('data','menus','filteredColumns','displayForm'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Nama' => 'required|string|max:255',
'Jumlah' => 'required|string|max:255',
'harga' => 'required|string|max:255',

        ]);

        Barang::create($validatedData);
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
    public function edit(Barang $item)
    {
        return view('generated-crud.edit', compact('item'));
    }

    public function update(Request $request, Barang $item)
    {
        $item->update($request->all());
        return redirect()->route('generated-crud.show')->with('success', 'Data berhasil diubah.');
    }

    public function destroy(Barang $item)
    {
        $item->delete();
        return redirect()->route('generated-crud.show')->with('success', 'Data berhasil dihapus.');
    }
}