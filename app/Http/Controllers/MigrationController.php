<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MigrationController extends Controller
{
    public static function runMigration()
    {
        Artisan::call('migrate', ['--force' => true]);
        // try {
        //     // Jalankan migrasi menggunakan Artisan
        //     Artisan::call('migrate', ['--force' => true]);

        //     // Kirim respon sukses
        //     return response()->json([
        //         'status' => 'success',
        //         'message' => 'Migration has been successfully executed!',
        //     ]);
        // } catch (\Exception $e) {
        //     // Kirim respon error jika migrasi gagal
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Migration failed: ' . $e->getMessage(),
        //     ]);
        // }
    }
}
