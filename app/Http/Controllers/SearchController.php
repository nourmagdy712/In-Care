<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class SearchController extends Controller
{
            public function search(Request $request){
                $search = $request->input('search');
                if ($request->type!=null){
                    $results=Hospital::query()->where([
                        ['Hospital_name', 'LIKE', "%{$search}%"],
                        ['availability','available'],
                        ['status','accepted'],
                        ['type',$request->type]
                    ])
                    ->orWhere([
                        ['address', 'LIKE', "%{$search}%"],
                        ['availability','available'],
                        ['status','accepted'],
                        ['type',$request->type]
                    ])->get();
                }
                else if ($request->price!=null) {
                    $results=Hospital::query()->where([
                        ['Hospital_name', 'LIKE', "%{$search}%"],
                        ['availability','available'],
                        ['status','accepted']
                    ])->orderBy('price', $request->price)
                    ->orWhere([
                        ['address', 'LIKE', "%{$search}%"],
                        ['availability','available'],
                        ['status','accepted']
                    ])->orderBy('price', $request->price)->get();
                }
                else{
                    $results=Hospital::query()->where([
                        ['Hospital_name', 'LIKE', "%{$search}%"],
                        ['availability','available'],
                        ['status','accepted']
                    ])->orWhere([
                        ['address', 'LIKE', "%{$search}%"],
                        ['availability','available'],
                        ['status','accepted']
                    ])->get();
                }
                $count=$results->count();
                return view('hospitals',compact(['results','search','count']));
            }        
            
            public function advsearch($id){
                $results=Hospital::query()->where('id',$id)->get();
                $count=$results->count();
                return view('hospitals',compact(['results','count']));
            }    
}