<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Apprentice;
use App\HistoryRecord;


class WelcomeController extends Controller
{
    protected $dataApprentice = [];
    protected $history_records = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataApprentice = Apprentice::orderByDesc('nombre_completo')->get();
        // $history_records = DB::table('history_records')
        //             ->select('apprentices.id', 'apprentices.nombre_completo', DB::raw('count(history_records.apprentice_id) as total'))
        //             ->join('apprentices', 'apprentices.id', '=', 'history_records.apprentice_id')
        //             ->groupBy('apprentices.id', 'apprentices.nombre_completo')
        //             ->get();
        return view('welcome', compact('dataApprentice', 'history_records'));
    }
}
