<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class HomeController extends Controller
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
        return view('home');
    }

    public function admin ()
    {
        $admin =  User::paginate(10);
        return view('admin.index', compact('admin'));
    }

    public function admin_json () 
    {
        $admin = User::orderBy('created_at', 'DESC')
                    ->paginate(10);
        return response()
            ->json($admin);
    }

    public function admin_create () 
    {
        return view('admin.create');
    }
    public function admin_edit ($id) 
    {
        $admin = User::find($id);
        return view('admin.edit', compact('admin'));
    }
    public function admin_store (Request $request) 
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        toast('Administrador agregado.','success','top-right')->autoClose(6000);
        return redirect()->route('admin.index');
    }
    public function admin_update (Request $request, $id) 
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();
        toast('Administrador actualizado','success','top-right')->autoClose(6000);
        return redirect()->route('admin.index');
    }

    public function admin_delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()
            ->json('Eliminado correctamente');
    }

    public function account()
    {
        return view('account');
    }
    public function update_account(Request $request)
    {
        $user = Auth::user();
        if ($request->password) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = \Hash($request->password);
            $user->update();
            toast('Datos actualizados','success','top-right')->autoClose(6000);
            return redirect()->route('account.edit');
        } else {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->update();
            toast('Datos actualizados','success','top-right')->autoClose(6000);
            return redirect()->route('account.edit');
        }
    }
}
