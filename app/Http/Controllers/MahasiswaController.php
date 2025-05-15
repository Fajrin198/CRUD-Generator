<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Menu;
use Illuminate\Support\Facades\Schema;

class MahasiswaController extends Controller
{
    public function index()
    {
        $displayForm = [

            [
	'label' => "Nama",
	'type' => "text",
	'validation' => "required",
    ],


            [
	'label' => "Nim",
	'type' => "text",
	'validation' => "required",
    ],
];
        $data = Mahasiswa::all();
        $menus = Menu::all();
        $columns = Schema::getColumnListing('mahasiswa');
        $excludedColumns = ['id', 'created_at', 'updated_at'];
        $filteredColumns = array_diff($columns, $excludedColumns);
        return view('generated-crud.show', ['tittle' => 'Mahasiswa', 'routeName'=> 'mahasiswa'], compact('data','menus','filteredColumns','displayForm'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Nama' => 'required|string|max:255',
'Nim' => 'required|string|max:255',

        ]);

        Mahasiswa::create($validatedData);
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
    public function edit(Mahasiswa $item)
    {
        return view('generated-crud.edit', compact('item'));
    }

    public function update(Request $request, Mahasiswa $item)
    {
        $item->update($request->all());
        return redirect()->route('generated-crud.show')->with('success', 'Data berhasil diubah.');
    }

    public function destroy(Mahasiswa $item)
    {
        $item->delete();
        return redirect()->route('generated-crud.show')->with('success', 'Data berhasil dihapus.');
    }
}