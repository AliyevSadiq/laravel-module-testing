<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Setting;
use App\Models\Web;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function index(){
        return view('settings.index');
    }


    public function create(){
        $modules=Module::all();
        $webs=Web::all();
        $field_types=['image','email'];
        return view('settings.create',compact('modules','webs','field_types'));
    }

    public function store(Request $request){
        Validator::make($request->all(),Setting::$creaateRules,Setting::$errorMsg)->validate();

        Setting::create($request->all());

        $request->session()->flash('success_settings','SETTINGS IS CREATED');
        return redirect()->back();

    }
}
