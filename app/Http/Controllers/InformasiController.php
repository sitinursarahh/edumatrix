<?php

namespace App\Http\Controllers;// InformasiController.php

use App\Models\ActivityLog;


class InformasiController extends Controller
{
public function index()
{
    ActivityLog::create([
        'user_id' => auth()->id(),
        'activity_type' => 'informasi',
        'description' => 'Membuka halaman informasi media'
    ]);

    return view('informasi_media');
}
}