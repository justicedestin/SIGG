<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jdnk\Grossesse\Models\AntecedentObstetricaux;

class AntecedentObstetricauxController extends Controller
{
    public function index()
    {
        $antecedents = AntecedentObstetricaux::all();
        return response()->json($antecedents);
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
        $validated = $request->validate([
            'issue_grossesse' => 'required|string|max:3',
            'mode_accouchement' => 'required|string|max:2',
            'complications' => 'nullable|string',
            'id_grossesse' => 'required|exists:grossesses,id',
        ]);

        $antecedent = AntecedentObstetricaux::create($validated);
        return response()->json($antecedent, 201);
    }

    public function update(Request $request, $id)
    {
        $antecedent = AntecedentObstetricaux::find($id);
        if (!$antecedent) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $validated = $request->validate([
            'issue_grossesse' => 'sometimes|string|max:3',
            'mode_accouchement' => 'sometimes|string|max:2',
            'complications' => 'nullable|string',
            'id_grossesse' => 'sometimes|exists:grossesses,id',
        ]);

        $antecedent->update($validated);
        return response()->json($antecedent);
    }

    public function destroy($id)
    {
        $antecedent = AntecedentObstetricaux::find($id);
        if (!$antecedent) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $antecedent->delete();
        return response()->json(['message' => 'Deleted Successfully']);
    }
}
