<?php

namespace App\Http\Controllers;

use App\Siswa;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function exportpdf()
    {
        $data = Siswa::get();
        $pdf = PDF::loadView('siswa.index',$data);
        return $pdf->download('Datasiswa.pdf');
    }
}
