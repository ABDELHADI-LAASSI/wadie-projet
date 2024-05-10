<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tache;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeController extends Controller
{
    public function index() {
        $employe = Auth::user();
        return view('employe.profile',  compact('employe'));
    }

    public function mesTaches() {
        $employe = Auth::user();
        $taches = $employe->tache;
        $done = 0;
        $progress = 0;
        $all = 0;

        foreach ($taches as $tache) {
            if ($tache->status == "done") {
                $done ++ ;
                $all ++ ;
            };
            if ($tache->status == "inProgress") {
                $progress ++ ;
                $all ++ ;
            };
        }

        return view('employe.employeTaches' ,  compact(['taches' , 'done' , 'progress' , 'all']));
    }

    public function makeTacheDone (Tache $tache) {
        $tache->status = 'done';
        $tache->save();
        return back()->with([
            "success" => "la tache est fait avec success"
        ]);
    }

    public function modifierImage(Request $request ,  User $employe) {
        // dd('hi');
        $request->validate([
            'image' => 'required | image'
        ]);


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('employesImages', 'public');
            $employe->image = $imagePath;
        }

        $employe->save();

        return back()->with([
            "images" => "image update successfully"
        ]);
    }
}
