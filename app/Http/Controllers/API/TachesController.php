<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Taches;
use Illuminate\Http\Request;

class TachesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ListeTaches()
    {
        //vérifons si il y a une une tâche avec ce ID
        $tache1 = Taches::get();
        if($tache1){
            return response()->json([
                "statut" => "1",
                "message" => "Tâche trouvée",
                "data" => $tache1
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $request->validate([
            "type" => "required",
            "difficulte"=> "required",
        ]);

        $tache = new Taches();
        $tache->type = $request->type;
        $tache->difficulte = $request->difficulte;
        $tache->save();

        return response()->json([
            "statut" => "1",
            "message" => "Tâche enregistrée avec succès"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function getTaches(string $id)
    {
         //vérifons si il y a une une tâche avec ce ID
         $tache1 = Taches::where("id", $id)->exists();
         if($tache1){

            $tache1 = Taches::find($id);
            return response()->json([
                "statut" => "1",
                "message" => "Tâche trouvée",
                "data" => $tache1
            ], 200);
         }else{
             return response()->json([
                 "statut" => "0",
                 "message" => "Tâche introuvable",
             ], 404);    
         }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         //vérifons si il y a une une tâche avec ce ID
         $tache1 = Taches::where("id", $id)->exists();
         if($tache1){

            $tache1 = Taches::find($id);
            $tache1->type = $request->type;
            $tache1->difficulte = $request->difficulte;
            $tache1->save();

            return response()->json([
                "statut" => "1",
                "message" => "Tâche modifié avec succès",
                "data" => $tache1
            ]);
         }else{
             return response()->json([
                 "statut" => "0",
                 "message" => "erreur",
             ]);    
         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //vérifons si il y a une une tâche avec ce ID
        $tache1 = Taches::where("id", $id)->exists();
        if($tache1){

           $tache1 = Taches::find($id);
        
           $tache1->delete();

            return response()->json([
                "statut" => "1",
                "message" => "Tâche suprimmée avec succès",
            ]);
        }else{
            return response()->json([
                "statut" => "0",
                "message" => "erreur",
            ]);    
        }
    }
}
