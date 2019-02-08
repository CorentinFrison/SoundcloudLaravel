<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chanson;
use App\User;
use Illuminate\Support\Facades\Auth;


class MonControleur extends Controller
{
    public function index() {
        $chansons = Chanson::all();
        return view("index",["chansons"=>$chansons]);
    }

    public function utilisateur($id){
        $utilisateur=User::find($id);
        if($utilisateur==false){
            return abort(404);
        }
        return view("utilisateur",["utilisateur"=>$utilisateur]);
    }

    public function suivre($id){
        $utilisateur = User::find($id);
        if($utilisateur == false){
            return abort(404);
        }
        $utilisateur->ilsMeSuivent()->toggle(Auth::id());
        return back();
    }


}
