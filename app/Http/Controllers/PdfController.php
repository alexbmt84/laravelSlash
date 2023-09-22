<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Metier;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class PdfController extends Controller
{
    public function graphs()
    {
        $userId = auth()->id();

        $metiers = Metier::query()->with('evenements')->where('user_id', $userId)->get();
        $evenements = Evenement::query()->where('user_id', $userId)->get();

        return view('graph', compact('metiers', 'evenements'));
    }

    // function to generate PDF
    public function graphPdf()
    {
        $userId = auth()->id();

        $metiers = Metier::query()->with('evenements')->where('user_id', $userId)->get();
        $evenements = Evenement::query()->where('user_id', $userId)->get();

        $pdf = PDF::loadView('graph', compact('metiers', 'evenements'));
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);

        return $pdf->download('graph.pdf');

    }

}
