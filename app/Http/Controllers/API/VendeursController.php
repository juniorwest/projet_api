<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Vendeurs;
use Illuminate\Http\Request;

class VendeursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ListeVendeur()
    {
        //vérifions si un vendeur a ce ID
        $vendeur = Vendeurs::get();
        return response()->json([
            "statut" => "1",
            "message" => "Etudiant trouvé",
            "data" => $vendeur
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getVendeur($id)
    { 
          //verifions si un vendeur a ce ID
        $vendeur = Vendeurs::where("id", $id)->exists();
        if($vendeur){

            $info = Vendeurs::find($id);
            return response()->json([
                "statut" => "1",
                "message" => "Etudiant trouvé",
                "data" => $info
            ], 200);
        }else{
            return response()->json([
                "statut" => "0",
                "message" => "Etudiant introuble",
            ], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $request->validate([
            "nom" => "required",
            "email" => "required|email|unique:vendeurs",
            "password" => "required"
        ]);

        $vendeur = new Vendeurs();
        $vendeur->nom = $request->nom;
        $vendeur->email = $request->email;
        $vendeur->password = $request->password;
        $vendeur->save();

        return response()->json([
            "statut" => "1",
            "message" => "Vendeur créé avec succès"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
        //verifions si un vendeur a ce ID
        $vendeur = Vendeurs::where("id", $id)->exists();
        if($vendeur){

            $info = Vendeurs::find($id);
            $info->nom = $request->nom;
            $info->email = $request->email;
            $info->password = $request->password;
            $info->save();

            return response()->json([
                "statut" => "1",
                "message" => "Etudiant trouvé",
                "data" => $info
            ], 200);
        }else{
            return response()->json([
                "statut" => "0",
                "message" => "Etudiant introuble",
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
         //verifions si un vendeur a ce ID
         $vendeur = Vendeurs::where("id", $id)->exists();
         if($vendeur){
 
            $vendeur = Vendeurs::find($id);
            $vendeur->delete();
 
             return response()->json([
                 "statut" => "1",
                 "message" => "Vendeur supprimé",
             ], 200);
         }else{
             return response()->json([
                 "statut" => "0",
                 "message" => "échec",
             ], 404);
    }
}
}