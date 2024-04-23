<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use lluminate\Contracts\Auth\Authenticatable;
use App\Models\Admins;

class AdminController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function logout(Request $req){
        $req->session()->flush();
        return redirect('/');
    }

    public function loginAction(Request $req)
    {   
            $req->validated();

            $email = request('email');
            $password = request('password');
            $admin = Admins::login($email,$password);
            if($admin==null){
                return back()->withErrors([ 'email'=>'check EMAIL or password'])->withInput();
            }
            $admin->password=null;
            $req->session()->put('admin',$admin);
            return redirect('/Region');

            /*if(Auth::attempt($credentials)){
                $request->session()->regenerate;
                return redirect()->intended(route('index'));
            }
    
            return back()->withErrors([
                'email' => 'Aucun utilisateur'
            ])->onlyInput('email');*/

            /*$user = Auth::user();
            if ($user) {
                $admin = Admins::where('email', $user->email)->first();
                dd($admin);
            } else {
                // Gérer le cas où l'utilisateur n'est pas trouvé ou n'est pas un objet
                return response()->json(['message' => 'User not found or not an object'], 404);
            }*/
        
        //dd(Auth::attempt($credentials));
        
        //$valider = $request->validated();
        /*$data = Admins::find($email,$password);
        dd(Auth::attempt($valider));*/
    }

    public function index()
    {
        // Affiche la liste des ressources
    }

    public function create()
    {
        // Affiche le formulaire de création
    }

    public function show($id)
    {
            // Assurez-vous que l'utilisateur est authentifié
        if (Auth::check()) {
            $admin = Admins::find(Auth::id());
            return view('admins.dashboard', ['admin' => $admin]);
        } else {
            // Rediriger vers la page de connexion ou effectuer une autre action
            return redirect()->route('');
        }
    }

    public function edit($id)
    {
        // Affiche le formulaire d'édition
    }

    public function update(Request $request, $id)
    {
        // Traite la mise à jour de la ressource
    }

    public function destroy($id)
    {
        // Traite la suppression de la ressource
    }

}
