<?php

namespace App\Http\Controllers;

use App\Events\PostCreatedEvent;
use App\Models\Taches;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(Request $request)
    {

        $tache = Taches::create([
            'type' => 'balayage',
            'difficulte' => 'moyenne'
        ]);

        event(new PostCreatedEvent($tache));
        
        dd('POST CREEE');
    }
}
