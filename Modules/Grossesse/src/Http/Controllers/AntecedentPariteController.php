<?php
namespace Jdnk\Grossesse\Http\Controllers;


use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Jdnk\Grossesse\Models\AntecedentParite;

class AntecedentPariteController extends Controller{

    public function index()
    {
        $antecedentparites = AntecedentParite::all();
        return response()->json([
            "success"=>true,
            "message"=>"listes des Antecedents Parite",
            "data"=>$antecedentparites ,
            "count"=>$antecedentparites ->count()
        ],200);
    }


    public function store(Request $request)
    {
        $rules = [
            "sexe"=>"required|string",
            "type_naissance"=>"required|string"
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json([
                "success"=>false,
                "message"=>collect($validator->errors())->flatten(),
            ],500);
        }

        try {
            $antecedent = new AntecedentParite();
            $antecedent->sexe = $request->sexe;
            $antecedent->type_naissance = $request->type_naissance;
            $antecedent->cas_deces = $request->cas_deces;
            $antecedent->age_deces = $request->age_deces;
            $antecedent->cause_deces = $request->cause_deces;
            $antecedent->id_grossesse = $request->id_grossesse;
            $antecedent->save();
            return response()->json([
                "success"=>true,
                "message"=>"Antecedent Parite créé avec succès",
                "data"=>$antecedent
            ],201);
        } catch (Exception $e) {
            // Log::channel("msp")->error($e->getMessage());
            return response()->json([
                "success"=>false,
                "message"=>"Une erreur est survenue"
            ],500);
        }
    }

    // Afficher une grossesse spécifique
    public function show($id)
    {
        $antecedent = AntecedentParite::find($id);
        if (!$antecedent) {
            return response()->json(['message' => 'Antecedent parite non trouvée'], 404);
        }
        return response()->json($antecedent, 200);
    }

    // Mettre à jour une grossesse existante
    public function update(Request $request, $id)
    {
        $rules = [
           "sexe"=>"required|string",
            "type_naissance"=>"required|string"
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json([
                "success"=>false,
                "message"=>collect($validator->errors())->flatten(),
            ],500);
        }

        $antecedent = AntecedentParite::find($id);

        if($antecedent == null){
            return response()->json([
                "success"=>false,
                "message"=>"Aucune Grossesse trouvée"
            ],404);
        }

        try {
            $antecedent->sexe = $request->sexe;
            $antecedent->type_naissance = $request->type_naissance;
            $antecedent->cas_deces = $request->cas_deces;
            $antecedent->age_deces = $request->age_deces;
            $antecedent->cause_deces = $request->cause_deces;
            $antecedent->id_grossesse = $request->id_grossesse;
            $antecedent->save();
            return response()->json([
                "success"=>true,
                "message"=>"Antecedent modifié avec succès",
                "data"=>$antecedent
            ],202);
        } catch (Exception $e) {
            // Log::channel("msp")->error($e->getMessage());
            return response()->json([
                "success"=>false,
                "message"=>"Une erreur est survenue"
            ],500);
        }
    }

    // Supprimer une grossesse
    public function destroy($id)
    {
        $antecedent = AntecedentParite::find($id);

        if($antecedent == null){
            return response()->json([
                "success"=>false,
                "message"=>"Aucun Antecedent trouvé"
            ],404);
        }

        $antecedent->delete();
        return response()->json([
            "success"=>true,
            "message"=>"Antecedent supprimé avec succès"
        ],200);
    }
}
