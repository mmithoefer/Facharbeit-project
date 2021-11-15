<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schueler;
use Illuminate\Support\Facades\Log;

class SchuelerController extends Controller
{
    public function show($schuelerId)
    {
        $schueler = Schueler::find($schuelerId);
        return response()->json($schueler);
    }

    public function store(Request $request)
    {
        validator($request->all(), [
            'name' => 'required',
            'age' => 'required',
            'user.name' => 'required'
        ])->validate();

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
        $request->validate([
            'name'=>'required',
            'age'=>'required',
            'username'=>'required'
        ]);

        $schueler = Schueler::find($schuelerId);
        $schueler->name = $request->name;
        $schueler->age = $request->age;
        $schueler->username = $request->username;
        $schueler->save();

        return response()->json(["result" => "ok"], 201);
    }
}
