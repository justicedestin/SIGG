<?php

namespace Jdnk\Grossesse\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Jdnk\Grossesse\Models\Grossesse as ModelsGrossesse;

class GrossesseController extends Controller{
    // Afficher toutes les grossesses
    public function index()
    {
        $grossesses = ModelsGrossesse::all();
        return response()->json([
            "success"=>true,
            "message"=>"listes des grossesses",
            "data"=>$ $grossesses ,
            "count"=>$ $grossesses ->count()
        ],200);
    }

    // Créer une nouvelle grossesse
    public function store(Request $request)
    {
        $rules = [
            "date_derniere_regle"=>"required|string"
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json([
                "success"=>false,
                "message"=>collect($validator->errors())->flatten(),
            ],500);
        }

        try {
            $grossesses = new Grossesse();
            $grossesses->date_derniere_regle = $request->date_derniere_regle;
            $grossesses->date_probable_debut = $request->date_probable_debut;
            $grossesses->date_terme_echographie = $request->date_terme_echographie;
            $grossesses->date_prevue_accouchement = $request->date_prevue_accouchement;
            $grossesses->csg_gestite = $request->csg_gestite;
            $grossesses->dormez_sous_milda = $request->dormez_sous_milda;
            $grossesses->situation_familiale = $request->situation_familiale;
            $grossesses->nbr_enfant_au_foyer = $request->nbr_enfant_au_foyer;
            $grossesses->id_patient = $request->id_patient;
            $grossesses->id_structure = $request->id_structure;
            $grossesses->id_agent = $request->id_agent;
            $grossesses->id_prestation = $request->id_prestation;
            $grossesses->af_diabete = $request->af_diabete;
            $grossesses->af_hypertension_arterielle = $request->af_hypertension_arterielle;
            $grossesses->af_maladies_hereditaires = $request->af_maladies_hereditaires;
            $grossesses->autres_af = $request->autres_af;
            $grossesses->af_a_preciser = $request->af_a_preciser;
            $grossesses->am_diabete = $request->am_diabete;
            $grossesses->am_hypertension_arterielle = $request->am_hypertension_arterielle;
            $grossesses->am_hepatite_virale = $request->am_hepatite_virale;
            $grossesses->am_herpes_genital = $request->am_herpes_genital;
            $grossesses->am_infection_urinaire_recidivante = $request->am_infection_urinaire_recidivante;
            $grossesses->am_allergie_aux_medicaments = $request->am_allergie_aux_medicaments;
            $grossesses->am_prise_permanente_de_medicaments = $request->am_prise_permanente_de_medicaments;
            $grossesses->am_phlebites = $request->am_phlebites;
            $grossesses->autres_am = $request->autres_am;
            $grossesses->am_a_preciser = $request->am_a_preciser;
            $grossesses->ac_gynecologiques = $request->ac_gynecologiques;
            $grossesses->acg_a_preciser = $request->acg_a_preciser;
            $grossesses->autres_ac = $request->autres_ac;
            $grossesses->ac_a_preciser = $request->ac_a_preciser;
            $grossesses->ag_cycle_menstruel = $request->ag_cycle_menstruel;
            $grossesses->ag_infertilite = $request->ag_infertilite;
            $grossesses->autres_ag = $request->autres_ag;
            $grossesses->ag_a_preciser = $request->ag_a_preciser;
            $grossesses->ag_dernier_type_de_contraception = $request->ag_dernier_type_de_contraception;
            $grossesses->save();
            return response()->json([
                "success"=>true,
                "message"=>"Grossesse créé avec succès",
                "data"=>$grossesses
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
        $grossesse = Grossesse::find($id);
        if (!$grossesse) {
            return response()->json(['message' => 'Grossesse non trouvée'], 404);
        }
        return response()->json($grossesse, 200);
    }

    // Mettre à jour une grossesse existante
    public function update(Request $request, $id)
    {
        $rules = [
            "date_derniere_regle"=>"required|string"
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json([
                "success"=>false,
                "message"=>collect($validator->errors())->flatten(),
            ],500);
        }

        $grossesses = Grossesse::find($id);

        if($grossesses == null){
            return response()->json([
                "success"=>false,
                "message"=>"Aucune Grossesse trouvée"
            ],404);
        }

        try {
            $grossesses->date_derniere_regle = $request->date_derniere_regle;
            $grossesses->date_probable_debut = $request->date_probable_debut;
            $grossesses->date_terme_echographie = $request->date_terme_echographie;
            $grossesses->date_prevue_accouchement = $request->date_prevue_accouchement;
            $grossesses->csg_gestite = $request->csg_gestite;
            $grossesses->dormez_sous_milda = $request->dormez_sous_milda;
            $grossesses->situation_familiale = $request->situation_familiale;
            $grossesses->nbr_enfant_au_foyer = $request->nbr_enfant_au_foyer;
            $grossesses->id_patient = $request->id_patient;
            $grossesses->id_structure = $request->id_structure;
            $grossesses->id_agent = $request->id_agent;
            $grossesses->id_prestation = $request->id_prestation;
            $grossesses->af_diabete = $request->af_diabete;
            $grossesses->af_hypertension_arterielle = $request->af_hypertension_arterielle;
            $grossesses->af_maladies_hereditaires = $request->af_maladies_hereditaires;
            $grossesses->autres_af = $request->autres_af;
            $grossesses->af_a_preciser = $request->af_a_preciser;
            $grossesses->am_diabete = $request->am_diabete;
            $grossesses->am_hypertension_arterielle = $request->am_hypertension_arterielle;
            $grossesses->am_hepatite_virale = $request->am_hepatite_virale;
            $grossesses->am_herpes_genital = $request->am_herpes_genital;
            $grossesses->am_infection_urinaire_recidivante = $request->am_infection_urinaire_recidivante;
            $grossesses->am_allergie_aux_medicaments = $request->am_allergie_aux_medicaments;
            $grossesses->am_prise_permanente_de_medicaments = $request->am_prise_permanente_de_medicaments;
            $grossesses->am_phlebites = $request->am_phlebites;
            $grossesses->autres_am = $request->autres_am;
            $grossesses->am_a_preciser = $request->am_a_preciser;
            $grossesses->ac_gynecologiques = $request->ac_gynecologiques;
            $grossesses->acg_a_preciser = $request->acg_a_preciser;
            $grossesses->autres_ac = $request->autres_ac;
            $grossesses->ac_a_preciser = $request->ac_a_preciser;
            $grossesses->ag_cycle_menstruel = $request->ag_cycle_menstruel;
            $grossesses->ag_infertilite = $request->ag_infertilite;
            $grossesses->autres_ag = $request->autres_ag;
            $grossesses->ag_a_preciser = $request->ag_a_preciser;
            $grossesses->ag_dernier_type_de_contraception = $request->ag_dernier_type_de_contraception;
            $grossesse->save();
            return response()->json([
                "success"=>true,
                "message"=>"Grossesse modifiée avec succès",
                "data"=>$grossesse
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
        $Grossesse = Grossesse::find($id);

        if($Grossesse == null){
            return response()->json([
                "success"=>false,
                "message"=>"Aucune grossesse trouvée"
            ],404);
        }

        $Grossesse->delete();
        return response()->json([
            "success"=>true,
            "message"=>"Grossesse supprimée avec succès"
        ],200);
    }
}
