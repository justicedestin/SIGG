<?php
namespace Jdnk\Grossesse\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Jdnk\Grossesse\Models\AntecedentObstetricaux;

class AntecedentObstetricauxController extends Controller
{
    public function index()
    {
        $antecedents = AntecedentObstetricaux::all();
        return response()->json([
            "success"=>true,
            "message"=>"listes des Antecedents Parite",
            "data"=>$antecedents ,
            "count"=>$antecedents ->count()
        ],200);

    }

    public function show($id)
    {
        $antecedent = AntecedentObstetricaux::find($id);
        if ($antecedent) {
            return response()->json($antecedent);
        }
        return response()->json(['message' => 'Not Found'], 404);
    }

    public function store(Request $request)
    {
        $rules = [
            'issue_grossesse' => 'required|string|max:3',
            'mode_accouchement' => 'required|string|max:2',
            'complications' => 'nullable|string',
            // 'id_grossesse' => 'required|exists:grossesses,id',
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json([
                "success"=>false,
                "message"=>collect($validator->errors())->flatten(),
            ],500);
        }

        try {
            $antecedent = new AntecedentObstetricaux();
            $antecedent->issue_grossesse = $request->issue_grossesse;
            $antecedent->mode_accouchement = $request->mode_accouchement;
            $antecedent->complications = $request->complications;
            $antecedent->save();
            return response()->json([
                "success"=>true,
                "message"=>"Antecedent créé avec succès",
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

    public function update(Request $request, $id)
    {
        $antecedent = AntecedentObstetricaux::find($id);
        if (!$antecedent) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $rules = [
            'issue_grossesse' => 'sometimes|string|max:3',
            'mode_accouchement' => 'sometimes|string|max:2',
            'complications' => 'nullable|string',
            // 'id_grossesse' => 'sometimes|exists:grossesses,id',
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json([
                "success"=>false,
                "message"=>collect($validator->errors())->flatten(),
            ],500);
        }

        try {

            $antecedent->issue_grossesse = $request->issue_grossesse;
            $antecedent->mode_accouchement = $request->mode_accouchement;
            $antecedent->complications = $request->complications;
            $antecedent->save();
            return response()->json([
                "success"=>true,
                "message"=>"Antecedent modifié avec succès",
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

    public function destroy($id)
    {
        $antecedent = AntecedentObstetricaux::find($id);

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
