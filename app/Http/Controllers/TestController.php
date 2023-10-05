<?php

namespace App\Http\Controllers;

use App\Models\Vendeurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TestController extends Controller
{

    public function index()
    {
        /*
        $post = Vendeurs::find(8);
        $post->delete();
        dd('supprimé !');

        $posts = Vendeurs::orderBy('nom')->take(3)->get();
        */
        $posts = Vendeurs::all();

        return view('articles', [
            'posts' => $posts 
        ]);
    } 

    public function show($id)
    {

       $post = Vendeurs::findOrFail($id);
       //$post = Vendeurs::where('nom', 'rashford')->firstOrFail();

       /*
       if(!Gate::allows('access-admin')){
            abort(403);
       }
       */
      
        return view('article', [
            'post' => $post 
        ]);
    }

    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        /*
        $post = new Vendeurs();
        $post->nom = $request->title;
        $post->email = $request->context;
        $post->password = $request->password;
        $post->save();
        dd('post créé !');
        */

        Vendeurs::create([
            'nom' => $request->title,
            'email' => $request->context,
            'password' => $request->password,
        ]);
        
        dd('post créé !');
    }
}
