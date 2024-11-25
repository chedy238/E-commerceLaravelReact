<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parameter = Parameter::first();
        return view('pages.parameter', compact('parameter'));
    }

    public function editParam(Request $request){
        $nbParam=Parameter::count();
        $logoName='';
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('img'), $logoName);
        }
    
        if($nbParam == 0){
            Parameter::create([
                'nom'=> $request->input('nom'),
                'logo'=> $logoName,
                'email'=> $request->input('email'),
                'adresse'=> $request->input('adresse'),
                'telephone'=> $request->input('telephone'),
            ]);
        }else{
            $pram=Parameter::first();
            $pram->nom=$request->nom;
            if($logoName!='')
                $pram->logo=$logoName;
            $pram->email=$request->email;
            $pram->adresse=$request->adresse;
            $pram->telephone=$request->telephone;
            $pram->update();
        }
        return redirect()->route('parameter.index');
    }
}
