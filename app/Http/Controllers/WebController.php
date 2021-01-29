<?php

namespace App\Http\Controllers;

use App\Models\Web;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    public function index(){
        $webs=Web::all();
        return view('webs.index',compact('webs'));
    }


    public function create(){
        return view('webs.create');
    }


    public function store(Request $request){
        Validator::make($request->all(),Web::$createRules,Web::$errorMsg)->validate();

        Web::create($request->all());
        $request->session()->flash('success_web','WEB SITE IS ADDING');
        return redirect()->back();
    }


    public function delete($id){
        if($id>0){
            $web=Web::find($id);

            if(!empty($web)){
                $web->delete();
                return redirect()->back();
            }

    }
    }
}
