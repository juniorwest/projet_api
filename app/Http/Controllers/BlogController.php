<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Most;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\SaveRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\FormMostRequest;
use App\Http\Requests\ConnexionRequest;


class BlogController extends Controller
{

    public function register(SaveRequest $request){
        
        $request->validated();

        $userdata = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        User::create($userdata);
        
        return to_route('blog.register')->with('success','Enregistré avec succès');
    }

    public function createRegister(){
        $user = new User();
        return view('blog.register', [
            'users' => $user
        ]);

    }


        public function login(ConnexionRequest $request)
        {
            $request->validated();
            
            $user = User::whereName($request->name)->first();

            if(!$user || Hash::check($request->password, $user->name)){
                return back()->with('error', 'Wrong Login Details');
            }
                return to_route('blog.create')->with('success','Signed in');
            
            return view('blog.connexion');
        }

        public function loginCall(){
            return view('blog.connexion');
        }
    

   
    public function create(){
         $most = new Most();
        return view('blog.create', [
            'most' => $most,
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get()
        ]);
    }

    public function store(FormMostRequest $request){
        $most = Most::create($request->validated());
        $most->tags()->sync($request->validated('tags'));
        return redirect()->route('blog.show', ['slug' => $most->slug, 'most' => $most->id])->with('success', "L'article  bien été sauvegardé");
    }

    public function edit(Most $most, Request $request){

        return view('blog.edit', [
            'most' => $most,
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get()
        ]);

        //return to_route('blog.edit', ['most' => $most->id, 'edit' => 'edit']);
    }

    public function update(Most $most, FormMostRequest $request){
        $most->update($request->validated());  
        $most->tags()->sync($request->validated('tags'));
        return redirect()->route('blog.show', ['slug' => $most->slug, 'most' => $most->id])->with('success', "L'article  bien été modifié");
    }
    
    public function delete(Most $most){
        $most->delete();
        
        return redirect()->route('blog.index')->with('success', "L'article  bien été supprimé");


    } 

    public function index(): view{
        //dd($most = Most::all('id', 'slug'));

        return view('blog.index', [
            'mosts' => Most::with('tags', 'category')->paginate(10)
        ]);
    }

    public function show(string $slug, string $id): RedirectResponse | View{
        $most = Most::findOrFail($id);
        if($most->slug != $slug){
            return to_route('blog.show', ['slug' => $most->slug, 'id' => $most->id]);
        }
        return view('blog.show', [
            'most' => $most
        ]);
    }
}
