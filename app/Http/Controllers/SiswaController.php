<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Menu;
use Illuminate\Support\Facades\Schema;

class SiswaController extends Controller
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
	'label' => "Input Kelas",
	'type' => "text",
	'validation' => "required",
    ],
];
        $data = Siswa::all();
        $menus = Menu::all();
        $columns = Schema::getColumnListing('siswa');
        $excludedColumns = ['id', 'created_at', 'updated_at'];
        $filteredColumns = array_diff($columns, $excludedColumns);
        return view('generated-crud.show', ['tittle' => 'Siswa', 'routeName'=> 'siswa'], compact('data','menus','filteredColumns','displayForm'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Nama' => 'required|string|max:255',
'Kelas' => 'required|string|max:255',

        ]);

        Siswa::create($validatedData);
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
    public function edit(Siswa $item)
    {
        return view('generated-crud.edit', compact('item'));
    }

    public function update(Request $request, Siswa $item)
    {
        $item->update($request->all());
        return redirect()->route('generated-crud.show')->with('success', 'Data berhasil diubah.');
    }

    public function destroy(Siswa $item)
    {
        $item->delete();
        return redirect()->route('generated-crud.show')->with('success', 'Data berhasil dihapus.');
    }
}