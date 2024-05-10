<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tache;
use App\Models\User;
use Illuminate\Http\Request;

class TacheController extends Controller
{

    public function index() {
        $taches = Tache::all();
        foreach ($taches as $tache) {
            $user = User::find($tache->user_id) ;
            $tache->employe = $user->name ;
        }
        return view('admin.ListTaches', compact('taches'));
    }
    public function store(Request $request) {
        // dd($request->all());
        $request->validate([
            'description' => 'required',
            'durée'=>'required',
            'user_id' => 'required'
        ]);


        $tache = new Tache ;
        $tache->description = $request->description;
        $tache->durée = $request->durée;
        $tache->status = 'inProgress';
        $tache->user_id = $request->user_id;

        $tache->save();

        return back()->with([
            "success" => "la tache été ajouteé avec success"
        ]);
    }

    public function edit($id) {
        $tache = Tache::findOrFail($id);
        $employes = User::where('role','employe')->get();
        return view('admin.EditTache', compact(['tache' , 'employes']));
    }

    public function update(Request $request , Tache $tache) {

        // dd('hi');
        $request->validate([
            'description' => 'required',
            'durée'=>'required',
            'user_id' => 'required',
            'status' => 'required',
        ]);

        $tache->description = $request->description;
        $tache->durée = $request->durée;
        $tache->status = $request->status;
        $tache->user_id = $request->user_id;

        $tache->save();

        return to_route('tache.listTaches')->with([
            "edit" => "la tache été modifié avec success"
        ]);
    }

    public function delete (Tache $tache) {
        $tache->delete();
        return back()->with([
            "delete" => "la tache été supprimer avec success"
        ]);
    }
}

