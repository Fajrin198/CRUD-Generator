<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class MenuController extends Controller
{

    public function index()
    {
        $data = [
            [
                "nama" => "1",
                "type" => "2",
                "width" => "3",
                "useImage" => "N",
            ],
            [
                "nama" => "4",
                "type" => "5",
                "width" => "6",
                "useImage" => "N",
            ],
            [
                "nama" => "7",
                "type" => "8",
                "width" => "9",
                "useImage" => "N",
            ],
        ];
        $menus = Menu::all();
        return view('index', ['tittle' => 'Dashboard'], compact('menus','data'));
    }

    public function addMenu()
    {
        $menus = Menu::all();
        return view('module-generator.addMenu', ['tittle' => 'Add Menu'], compact('menus'));
    }

    public function displayTable()
    {
        $menus = Menu::all();
        return view('module-generator.displayTable',['tittle' => 'displayTable','rows' => 5], compact('menus'));
    }

    public function formDisplay()
    {
        // $dataForm= [];
        // // Looping untuk menyimpan data ke dalam array 2 dimensi
        // for ($i = 0; $i < $rows; $i++) {
        //     $dataForm[] = [
        //         'nama' => $request->input("nama$i"),
        //         'type' => $request->input("type$i"),
        //         'width' => $request->input("width$i"),
        //         'useImage' => $request->input("useImage$i"),
        //     ];
        // }
        $data = session('arrayData');
        if($data == null){
            $data = [['nama' =>'']];
        }
        $menus = Menu::all();
        return view('module-generator.formDisplay', ['tittle' => 'formDisplay','datas' => $data], compact('menus'));
    }
    
    public function configuration()
    {
        $menus = Menu::all();
        return view('module-generator.configuration', ['tittle' => 'configuration'], compact('menus'));
    }

    public function addIterasi(Request $request)
    {
        $rows = $request->input('rows');
        session(['iterasi' => $rows]);
        $menus = Menu::all();
        return view('module-generator.displayTable', ['rows' => $rows, 'tittle' => 'displayTable'], compact('menus'));
    }

    public function processForm(Request $request)
    {
        // Ambil jumlah baris (rows) dari input
        $rows = session('iterasi', 0);
        $data = [];

        // Looping untuk menyimpan data ke dalam array 2 dimensi
        for ($i = 0; $i < $rows; $i++) {
            $data[] = [
                'nama' => $request->input("nama$i"),
                'type' => $request->input("type$i"),
                'width' => $request->input("width$i"),
                'useImage' => $request->input("useImage$i"),
            ];
        }
        session(['arrayData' => $data]);
        // ModuleGeneratorController::generate($data);
        // MigrationController::runMigration();
        return redirect()->route('formDisplay')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function processForm2(Request $request)
    {
        $rows = session('iterasi', 0);
        $data = session('arrayData');
        $dataForm = [];

        // Looping untuk menyimpan data ke dalam array 2 dimensi
        for ($i = 0; $i < $rows; $i++) {
            $dataForm[] = [
                'label' => $request->input("label$i"),
                'type' => $request->input("type$i"),
                'validation' => $request->input("validation$i"),
            ];
        }
        
        
        ModuleGeneratorController::generate($data, $dataForm);
        MigrationController::runMigration();
        return redirect()->route('configuration')->with('success', 'Menu berhasil ditambahkan!');
    }

    // public function createTable(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'type' => 'required|string|max:255',
    //         'width' => 'required|string|max:255',
    //         'useImage' => 'required|alpha_dash',
    //     ]);

    //     ModuleGeneratorController::generate();

    // }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'table' => 'required|alpha_dash',
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'module_slug' => 'required|alpha_dash',
        ]);

        Menu::create($validatedData);
        ModuleGeneratorController::generateRoute();

        // $imagePath = null;
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('menus', 'public');
        // }

        // if ($request->has('subMenus')) {
        //     foreach ($request->subMenus as $subMenuName) {
        //         $menu->subMenus()->create(['name' => $subMenuName]);
        //     }
        // }

        return redirect()->route('displayTable')->with('success', 'Menu berhasil ditambahkan!');
    }

}

