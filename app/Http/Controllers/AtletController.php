<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atlet;
use App\Models\Menu;
use Illuminate\Support\Facades\Schema;

class AtletController extends Controller
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
	'label' => "Asal Sekolah :",
	'type' => "text",
	'validation' => "required",
    ],


            [
	'label' => "Jenis Kelamin :",
	'type' => "text",
	'validation' => "required",
    ],
];
        $data = Atlet::all();
        $menus = Menu::all();
        $columns = Schema::getColumnListing('olahraga');
        $excludedColumns = ['id', 'created_at', 'updated_at'];
        $filteredColumns = array_diff($columns, $excludedColumns);
        return view('generated-crud.show', ['tittle' => 'Atlet', 'routeName'=> 'olahraga'], compact('data','menus','filteredColumns','displayForm'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Nama' => 'required|string|max:255',
'Asal Sekolah' => 'required|string|max:255',
'Jenis Kelamin' => 'required|string|max:255',

        ]);

        Atlet::create($validatedData);
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
    public function edit(Atlet $item)
    {
        return view('generated-crud.edit', compact('item'));
    }

    public function update(Request $request, Atlet $item)
    {
        $item->update($request->all());
        return redirect()->route('generated-crud.show')->with('success', 'Data berhasil diubah.');
    }

    public function destroy(Atlet $item)
    {
        $item->delete();
        return redirect()->route('generated-crud.show')->with('success', 'Data berhasil dihapus.');
    }
}