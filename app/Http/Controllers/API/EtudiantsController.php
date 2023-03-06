<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Etudiants;

class EtudiantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ListEtudiant()
    {
        //vérifier si un étudiant a ce ID
        $etudiant = Etudiants::get();
            return response()->json([
                "statut" => 1,
                "message" => "Etudiant trouvé",
                "data" => $etudiant
            ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getEtudiant($id)
    {
         //vérifier si un étudiant a ce ID
         $etudiant = Etudiants::where("id", $id)->exists();
         if($etudiant){

            $info = Etudiants::find($id);
             return response()->json([
                 "statut" => 1,
                 "message" => "Etudiant trouvé",
                 "data" => $info
             ],200);
         }else{
             return response()->json([
                 "statut" => 0,
                 "message" => "Aucune donnée trouvé"
             ], 404);
         }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        //return $request 
        //validation

        $request->validate([
            "nom" => "required",
            "email" => "required|email|unique:etudiants",
            "password" => "required"
        ]);

        $etudiant = new Etudiants();
        $etudiant->nom = $request->nom;
        $etudiant->email = $request->email;
        $etudiant->password = $request->password;
        $etudiant->save();

        //renvoie de reponse personnalisée
        return response()->json([
            "statut" => 1,
            "message" => "etudiant créé avec succès"
        ]);
    }
        
       
    

    /**
     * Display the specified resource.
     */
    public function Et(string $id)
    {
        //
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
         //vérifier si un étudiant a ce ID
         $etudiant = Etudiants::where("id", $id)->exists();
         if($etudiant){

            $info = Etudiants::find($id);
            $info->nom = $request->nom;
            $info->email = $request->email;
            $info->password = $request->password;
            $info->save();
             return response()->json([
                 "statut" => 1,
                 "message" => "mise à jour réussie",
             ]);
         }else{
             return response()->json([
                 "statut" => 0,
                 "message" => "échec"
             ]);
         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $etudiant = Etudiants::where("id", $id)->exists();
         if($etudiant){

            $etudiant = Etudiants::find($id);

            $etudiant->delete();
            
             return response()->json([
                 "statut" => 1,
                 "message" => "suppression réussie",
             ]);
         }else{
             return response()->json([
                 "statut" => 0,
                 "message" => "échec"
             ]);
         }
    }
}
