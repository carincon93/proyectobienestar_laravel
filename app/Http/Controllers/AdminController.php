<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Http\Requests\PasswordRequest;

use Auth;

use App\User;
use App\Apprentice;
use App\HistoryRecord;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataApprentice  = Apprentice::all()->sortBy('nombre_completo');
        $nroApprentices  = Apprentice::all()->count();
        return view('admins.dashboard', compact('dataApprentice', 'nroApprentices'));
    }

    public function password(){
        return View('admins.password');
    }

    public function updatePassword(PasswordRequest $request){
        $admin = Auth::User();
        if (Hash::check($request->mypassword, $admin->password)){
            $admin2 = new User();
            $admin2->where('email', '=', $admin->email)
                 ->update(['password' => bcrypt($request->password)]);
            return redirect('admin')->with('status', 'Contraseña cambiada con éxito');
        }
        else
        {
            return redirect('admin/password')->with('message', 'Su contraseña actual es incorrecta');
        }
    }

    public function truncateAll()
    {
        Schema::disableForeignKeyConstraints();
        Apprentice::truncate();
        HistoryRecord::truncate();
        Schema::enableForeignKeyConstraints();

        return redirect('/admin')->with('status', 'Todos los registros de los aprendices fueron eliminados con éxito!');
    }

}
