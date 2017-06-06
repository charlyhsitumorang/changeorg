<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetitionRequest;
use App\Petition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Builder\ParamTest;

class PetitionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function indeks(){
        $petitions = Petition::all();
        return view('petition.indeks',compact('petitions'));
    }
    public function show($id){
        $petition  = Petition::where('id',$id)->first();
        return view('petition.show',compact('petition'));
        /*
         *
         */
    }

    public function create(){
        return view('petition.create');
    }
    public function store(PetitionRequest $request){
        $input = $request->input();
        $petitions = new Petition($input);
        Auth::user()->petitions()->save($petitions);
        return redirect(url('petitions'));
    }


    public function edit($id){
        $petition  = Petition::where('id',$id)->first();
        return view('petition/edit',compact('petition'));

    }
    public function update(PetitionRequest $request, $id){
        $petition = Petition::find($id);

        $input = $request-> input();
        $petition->update($input);
        return redirect(url('petitions/'.$id));
    }
    public function destroy($id){
        $petition = Petition::find($id);
        $petition->delete();
        return  redirect(url('petitions'));
    }
//    public function delete(){
//
//    }

}
