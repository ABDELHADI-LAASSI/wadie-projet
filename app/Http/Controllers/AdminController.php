<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $employes = User::where('role','employe')->get();


        return view('admin.Taches' , compact('employes'));
    }

    public function ajoutEmploye(){
        return view('admin.AjouterEmploye') ;
    }

    public function storeEmploye(Request $request)
    {
        // Validation

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['required' , 'image']
        ]);
        // dd($data);


        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('employesImages', 'public');
            $user->image = $imagePath;
        }
        $user->role = 'employe';
        $user->save();
        return back()->with([
            "success" => "l'employe' été ajouteé avec success"
        ]);
    }

    public function listEmploye() {
        $employes = User::where('role','employe')->get();
        foreach ($employes as $employe) {
            $nbr = $employe->tache->count();
            $employe->nbrOfTaches = $nbr;
        }
        return view('admin.ListEmployes', compact('employes'));
    }

    public function deleteEmploye(User $employe) {
        $employe->delete();
        return back()->with([
            "delete" => "l'employe été supprimer avec success"
        ]);
    }

    public function editEmploy($id) {
        $employe = User::findOrFail($id);
        return view('admin.EditEmploye' , compact('employe')) ;
    }

    public function change (User $employe) {
        $employe->role = 'admin';
        $employe->save();
        return back()->with([
            "success" => "l'employe' est maintenant admin"
        ]);
    }



}
