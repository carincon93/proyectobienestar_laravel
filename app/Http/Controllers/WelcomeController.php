<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Apprentice;
use App\HistoryRecord;


class WelcomeController extends Controller
{
    protected $dataApprentice = [];
    protected $dataHistoryR = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataApprentice  = Apprentice::orderByDesc('nombre_completo')->get();
        $dataHistoryR   = HistoryRecord::orderByDesc('fecha', 'DESC')->get();

        return view('welcome', compact('dataApprentice', 'dataHistoryR'));
    }
}
