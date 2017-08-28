<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CollaboratorRequest;


use App\User;

class CollaboratorController extends Controller
{
    protected $dataCollaborator = [];

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataCollaborator = User::all()->sortBy('name');
        return view('collaborators.index')->with('dataCollaborator', $dataCollaborator);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('collaborators.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollaboratorRequest $request)
    {
        $dataCollaborator = new User();
        $dataCollaborator->name = $request->get('name');
        $dataCollaborator->email = $request->get('email');
        $dataCollaborator->password = bcrypt($request->get('password'));
        if ($dataCollaborator->save()){
            return redirect('/admin/collaborator')->with('status', 'El administrador fue adicionada con éxito');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('collaborators.show')->with('dataCollaborator', User::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataCollaborator = User::find($id);
        return view('collaborators.edit')
            ->with('dataCollaborator', $dataCollaborator);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CollaboratorRequest $request, $id)
    {
        $dataCollaborator = User::find($id);
        $dataCollaborator->name = $request->get('name');
        $dataCollaborator->email = $request->get('email');
        $dataCollaborator->password = bcrypt($request->get('password'));
        if ($dataCollaborator->save()){
            return redirect('/admin/collaborator')->with('status', 'El administrador fue modificado con éxito');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/admin/collaborator')->with('status', 'El administrador fue eliminado con éxito');
    }
}
