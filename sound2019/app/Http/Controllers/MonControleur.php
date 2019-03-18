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
            return redirect("/")->with('toastr',['statut'=>'error','message'=>'Utilisateur inconnu']);
        }
        return view("utilisateur",["utilisateur"=>$utilisateur]);
    }

    public function suivre($id){
        $utilisateur = User::find($id);
        if($utilisateur == false){
            return redirect("/")->with('toastr',['statut'=>'error','message'=>'Erreur']);
        }
        $utilisateur->ilsMeSuivent()->toggle(Auth::id());
        return back()->with('toastr',['statut'=>'success','message'=>'Changement de suivi']);
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
        return redirect("/")->with('toastr',['statut'=>'success','message'=>'Chanson uploadé']);;
    }

    public function recherche($s){
       $users = User::whereRaw("name LIKE CONCAT(?,'%')",[$s])->get();
       $chansons = Chanson::whereRaw("nom LIKE CONCAT(?,'%')",[$s])->get();
       return view("recherche",['utilisateurs'=>$users, 'chansons'=>$chansons]);
    }

    public function testajax(){
        return redirect('/recherche/ut');
    }

}
