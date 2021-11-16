<?php

namespace App\Http\Controllers;

use App\Models\klasse;
use Illuminate\Http\Request;

class KlasseController extends Controller
{
    public function index()
    {
        $schueler = klasse::all();
        return response()->json($schueler);
    }

    public function show($klassenId)
    {
        $klasse = klasse::find($klassenId);
        return response()->json($klasse);
    }

    public function store(Request $request)
    {
        validator($request->all(), [
            'name' => 'required',
            'thema' => 'required'
        ])->validate();

        $klasse = new klasse;

        $klasse->name = $request->name;
        $klasse->thema = $request->thema;
        $klasse->save();

        return response()->json(["result" => "ok"], 201);

    }

    public function destroy($klassenId)
    {
        $klasse = klasse::find($klassenId);
        $klasse->delete();

        return response()->json(["result" => "ok"], 200);
    }

    public function update(Request $request, $klassenId)
    {
        $request->validate([
            'name'=>'required',
            'thema'=>'required'
        ]);

        $klasse = klasse::find($klassenId);
        $klasse->name = $request->name;
        $klasse->thema = $request->thema;
        $klasse->save();

        return response()->json(["result" => "ok"], 201);
    }
}
