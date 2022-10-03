<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use PDF;
// use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function printId(Atlet $atlet)
    {
        $pdf = PDF::loadView('idCard.cetak', ['atlet' => [$atlet]]);
        $pdf->setPaper('A4', '');
        return $pdf->stream(
            $atlet->name .
                '-' .
                str_pad($atlet->id + 1, 4, '0', STR_PAD_LEFT) .
                '.pdf'
        );
    }
    // public function printIdBulk()
    // {
    //     $pdf = PDF::loadView('id-card-pdf', ['students' => Student::all()]);
    //     $pdf->setPaper('A4', '');
    //     return $pdf->stream('all-diu-student-id.pdf');
    // }
}