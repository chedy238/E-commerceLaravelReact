<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Categories::where('etat',0)->get();
        $type=0;
        return view('pages.categorie.index', compact('categories','type'));
    }

    public function indexArchiv()
    {
        $categories=Categories::where('etat',1)->get();
        $type=1;
        return view('pages.categorie.index', compact('categories','type'));
    }

    public function create()
    {
        return view('pages.categorie.create');
    }

    public function store(Request $request){
        $logoName='';
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('img'), $logoName);
        }
        Categories::create([
            'nom'=> $request->input('nom'),
            'logo'=> $logoName,
            'etat'=> 0,
        ]);
        return redirect()->route('categories.index');
    }

    public function edit(Request $request,$id){
        $categorie=Categories::find($id);
        return view('pages.categorie.edit', compact('categorie'));
    }
    public function update(Request $request,$id)
    {
        $logoName='';
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('img'), $logoName);
        }
        $catg=Categories::find($id);
        $catg->nom=$request->input('nom');
        if($logoName!='')
            $catg->logo=$logoName;
        $catg->save();
        return redirect()->route('categories.index');
    }

    public function archive($id,$etat){
        $catg=Categories::find($id);
        $catg->etat=$etat;
        $catg->save();
        return redirect()->route('categories.index');
    }

}
