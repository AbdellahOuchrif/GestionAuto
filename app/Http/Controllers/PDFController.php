<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PDF;

class PDFController extends Controller
{
    public function generatePDF($pj_url)
    {
        $pdf = PDF::loadView('myPDF', [ "pieceJointe" => $pj_url]);
        return $pdf->stream();
    }

    

}
