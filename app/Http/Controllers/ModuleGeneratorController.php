<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class ModuleGeneratorController extends Controller
{
    public static function generateRoute()
    {
        $menus = DB::table('menus')
                ->latest()->first();
        $table = $menus->table;
        $moduleName = $menus->name;
        $icon = $menus->icon;
        $slug = $menus->module_slug;
        ModuleGeneratorController::getRouteStup($moduleName, $slug);
    }

    public static function generate(array $data, array $dataForm)
    {
 
        $menus = DB::table('menus')
                ->latest()->first();
        $table = $menus->table;
        $moduleName = $menus->name;
        $icon = $menus->icon;
        $slug = $menus->module_slug;
        // Generate Controller
        $controllerPath = app_path("Http/Controllers/" . ucfirst($moduleName) . "Controller.php");
        File::put($controllerPath, ModuleGeneratorController::getControllerStub($moduleName, $table, $slug, $data, $dataForm));

        // Generate Migration File
        $migrationPath = database_path("migrations/" . date('Y_m_d_His') . "_create_{$table}_table.php");
        File::put($migrationPath, ModuleGeneratorController::getMigrationStub($table,$data));

        // Generate Model
        $modelPath = app_path("Models/" . ucfirst($moduleName) . ".php");
        File::put($modelPath, ModuleGeneratorController::getModelStub($moduleName, $table, $data));
        
        // Generate Controller
        // $controllerPath = app_path("views/Controllers/" . ucfirst($moduleName) . "Controller.php");
        // File::put($controllerPath, ModuleGeneratorController::getControllerStub($moduleName, $table));

        // Generate Route
        // ModuleGeneratorController::getRouteStup($moduleName, $slug);

        // Optional: Add Menu to Database
        // if ($createMenu) {
        //     \DB::table('menus')->insert([
        //         'name' => $moduleName,
        //         'icon' => $icon,
        //         'slug' => $slug,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        return redirect()->back()->with('success', 'Module generated successfully!');
    }

    private static function getMigrationStub($table,$data)
{
    $list = '';
        foreach ($data as $item) {
            $list .= "\$table->".$item['type']."('".$item['nama']."');\n";
        }
    $content = <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create{$table}Table extends Migration
{
    public function up()
    {
        Schema::create('$table', function (Blueprint \$table) {
            \$table->id();
            $list
            \$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('$table');
    }
}
EOT;

    return $content;
}



    private static function getModelStub($moduleName, $table, $data)
    {
        $list = '';
        foreach ($data as $item) {
            $list .= "'".$item['nama']."',\n";
        }
        return <<<EOT
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class {$moduleName} extends Model
{
    use HasFactory;

    protected \$table = '{$table}';

    protected \$fillable = [
        $list
    ];
}
EOT;
    }

    private static function getControllerStub($moduleName, $table, $slug, $data, $dataForm)
    {
        $list = '';
        foreach ($data as $item) {
            $list .= "'".$item['nama']."' => 'required|string|max:255',\n";
        }
        $list2 = '';
        foreach ($dataForm as $items => $item) {
            $list2 .= "\n
            [\n";
            foreach($item as $key => $value){
                $list2 .="\t'{$key}' => \"{$value}\",\n";
            }
            $list2 .= "    ],\n";
        }
        return <<<EOT
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\\{$moduleName};
use App\Models\Menu;
use Illuminate\Support\Facades\Schema;

class {$moduleName}Controller extends Controller
{
    public function index()
    {
        \$displayForm = [$list2];
        \$data = {$moduleName}::all();
        \$menus = Menu::all();
        \$columns = Schema::getColumnListing('{$table}');
        \$excludedColumns = ['id', 'created_at', 'updated_at'];
        \$filteredColumns = array_diff(\$columns, \$excludedColumns);
        return view('generated-crud.show', ['tittle' => '{$moduleName}', 'routeName'=> '{$slug}'], compact('data','menus','filteredColumns','displayForm'));
    }
    public function store(Request \$request)
    {
        \$validatedData = \$request->validate([
            $list
        ]);

        {$moduleName}::create(\$validatedData);
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
    public function edit({$moduleName} \$item)
    {
        return view('generated-crud.edit', compact('item'));
    }

    public function update(Request \$request, {$moduleName} \$item)
    {
        \$item->update(\$request->all());
        return redirect()->route('generated-crud.show')->with('success', 'Data berhasil diubah.');
    }

    public function destroy({$moduleName} \$item)
    {
        \$item->delete();
        return redirect()->route('generated-crud.show')->with('success', 'Data berhasil dihapus.');
    }
}
EOT;
    }
//     private static function getControllerStub($moduleName, $table)
//     {
//         return <<<EOT
// <?php

// namespace App\Http\Controllers;

// use App\Models\\{$moduleName};
// use Illuminate\Http\Request;

// class {$moduleName}Controller extends Controller
// {
//     public function index()
//     {
//         \$data = {$moduleName}::all();
//         return view('{$table}.index', compact('data'));
//     }
// }
// EOT;
//     }

    private static function getRouteStup($moduleName, $slug)
        {
            // $tables = \DB::select('SHOW TABLES'); // Ambil semua tabel dari database
            // $tableNameKey = 'Tables_in_' . config('database.connections.mysql.database'); // Sesuaikan dengan DB yang dipakai
    
            // $routes = "<?php\n\nuse Illuminate\Support\Facades\Route;\n\n";
    
            // foreach ($tables as $table) {
            //     $tableName = $table->$tableNameKey;
    
                $routes = <<<EOT
            \nRoute::resource('{$slug}', App\Http\Controllers\\{$moduleName}Controller::class);\n
            EOT;
            // }
    
            // Simpan ke file routes/web.php
            $filePath = base_path('routes/web.php');
            File::append($filePath, $routes);
        }

    
//         private function generateViews($tableName)
//         {
//             $viewPath = resource_path("views/{$tableName}");
//             File::makeDirectory($viewPath, 0755, true);
    
//             // Generate index.blade.php
//             $indexTemplate = <<<EOT
//     @extends('layouts.app')
    
//     @section('content')
//     <h1>Data {$tableName}</h1>
//     <a href="{{ route('{$tableName}.create') }}">Tambah Data</a>
//     <table>
//         <thead>
//             <tr>
//                 <th>No</th>
//                 <th>Nama</th>
//                 <th>Aksi</th>
//             </tr>
//         </thead>
//         <tbody>
//             @foreach (\$data as \$item)
//             <tr>
//                 <td>{{ \$loop->iteration }}</td>
//                 <td>{{ \$item->nama }}</td>
//                 <td>
//                     <a href="{{ route('{$tableName}.edit', \$item->id) }}">Edit</a>
//                     <form action="{{ route('{$tableName}.destroy', \$item->id) }}" method="POST">
//                         @csrf
//                         @method('DELETE')
//                         <button type="submit">Hapus</button>
//                     </form>
//                 </td>
//             </tr>
//             @endforeach
//         </tbody>
//     </table>
//     @endsection
//     EOT;
    
//             File::put("{$viewPath}/index.blade.php", $indexTemplate);
    
//             // Generate create.blade.php
//             // Generate edit.blade.php (mirip dengan create).
//         }
    
    
// public static function getViewStup($moduleName,$slug)
// {
//     $viewPath = resource_path("views/{$slug}");
//     File::makeDirectory($viewPath, 0755, true);

//     return <<<EOT
//     <?php
    
//     namespace App\Http\Controllers;
    
//     use App\Models\\{$moduleName};
//     use Illuminate\Http\Request;
    
//     class {$moduleName}Controller extends Controller
//     {
//         public function index()
//         {
//             \$data = {$moduleName}::all();
//             return view('{$table}.index', compact('data'));
//         }
//     }
//     EOT;
// }

}
