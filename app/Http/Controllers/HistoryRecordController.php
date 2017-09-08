<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Apprentice;
use App\HistoryRecord;

class HistoryRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $history_records = HistoryRecord::all();
        $hh = DB::table('history_records')
                    ->select('apprentices.id', 'apprentices.nombre_completo', DB::raw('count(history_records.apprentice_id) as total'))
                    ->join('apprentices', 'apprentices.id', '=', 'history_records.apprentice_id')
                    ->groupBy('apprentices.id', 'apprentices.nombre_completo')
                    ->take(5)
                    ->get();
        return view('history_records.index', compact('history_records', 'hh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $dataHistoryRecord = new HistoryRecord();

        $dataHistoryRecord->apprentice_id = $id;
        $dataHistoryRecord->fecha = date('Y-m-d H:i:s');
        $dataHistoryRecord->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $history_records = HistoryRecord::all()->where('apprentice_id', '=', $id);
        return view('history_records.show', compact('history_records'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function datesearch(Request $request)
    {
        $fechaInicio = $request->get('inicio');
        $fechaFin    = $request->get('fin');

        if ($fechaInicio == '' && $fechaFin == '') {
            $hr = DB::table('history_records')
                    ->select('apprentices.id', 'apprentices.nombre_completo', 'history_records.fecha')
                    ->join('apprentices', 'apprentices.id', '=', 'history_records.apprentice_id')
                    ->groupBy('apprentices.id', 'apprentices.nombre_completo', 'history_records.fecha')
                    ->get();
            return view('history_records.ajax')->with('hr', $hr);
        }
        else{
            // $hr = HistoryRecord::whereBetween('fecha', [$fechaInicio, $fechaFin])->get();
            $hr = DB::table('history_records')
                    ->select('apprentices.id', 'apprentices.nombre_completo', 'history_records.fecha')
                    ->join('apprentices', 'apprentices.id', '=', 'history_records.apprentice_id')
                    ->whereBetween(DB::raw('cast(fecha as date)'), [$fechaInicio, $fechaFin])
                    ->groupBy('apprentices.id', 'apprentices.nombre_completo', 'history_records.fecha')
                    ->get();
            return view('history_records.ajax')->with('hr', $hr);
        }
    }
}
