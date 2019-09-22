<?php

namespace App\Http\Controllers;

use App\BoardGameProvider;
use App\CustLibs\BoardGameProviders\BoardGameProviderFact;
use Illuminate\Http\Request;



class BoardGameProviderController extends Controller
{
    function index(){
        return BoardGameProvider::all();
    }

    function get_provider($id){
        $provider = BoardGameProvider::findOrFail($id);
        return $provider;
    }

    function search(Request $request,$id){
        $provider = BoardGameProvider::findOrFail($id);
        $q = $request->validate([
            'query'=> 'required|string'
        ]);
        $provider = BoardGameProviderFact::make($provider->id);
        $result = $provider->search($q['query']);
        return (array_map(function ($item){
            return $item->get_array();
        },$result));
    }

    function get(Request $request,$id){
        $q = $request->validate([
            'id'=> 'required|string'
        ]);
        $provider = BoardGameProvider::findOrFail($id);
        $provider = BoardGameProviderFact::make($provider->id);
        return $provider->get($q['id'])->get_array();

    }
}
