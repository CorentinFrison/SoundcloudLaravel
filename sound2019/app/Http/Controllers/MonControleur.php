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

    public function nouvelle(){
        return view('nouvelle');
    }

    public function creer(Request $request){
        if($request->hasFile('chanson') && $request->file('chanson')->isValid()){
            $c=new Chanson();
            $c->nom = $request->input('nom');
            $c->style = $request->input("style");
            $c->utilisateur_id=Auth::id();

            $c->fichier=$request->file('chanson')->store("public/audio/".Auth::id());
            $c->fichier=str_replace("public/","/storage/", $c->fichier);
            $c->save();
        }
        return redirect("/");
    }

    public function recherche($s){
       $users = User::whereRaw("name LIKE CONCAT(?,'%')",[$s])->get();
       $chansons = Chanson::whereRaw("nom LIKE CONCAT(?,'%')",[$s])->get();
       return view("recherche",['utilisateurs'=>$users, 'chansons'=>$chansons]);
    }

}
