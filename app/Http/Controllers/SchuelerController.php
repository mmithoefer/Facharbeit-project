<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schueler;

class SchuelerController extends Controller
{
    public function show($slug)
    {
        return view('schueler', [
            'schueler' => Post::where('slug', '=', $slug)->first()
        ]);
    }

    public function store(Request $request)
    {
        $schueler = new Schueler;

        $schueler->name = $request->name;
        $schueler->age = $request->age;
        $schueler->username = $request->username;

        $schueler->save();

        return response()->json(["result" => "ok"], 201);
    }

    public function destroy($schuelerId)
    {
        $schueler = Schueler::find($schuelerId);
        $schueler->delete();

        return response()->json(["result" => "ok"], 200);
    }

    public function update(Request $request, $schuelerId)
    {
        $schueler = Schueler::find($schuelerId);
        $schueler->name = $request->name;
        $schueler->age = $request->age;
        $schueler->username = $request->username;
        $schueler->save();

        return response()->json(["result" => "ok"], 201);
    }
}
