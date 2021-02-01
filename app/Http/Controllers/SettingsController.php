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
        $settings=Setting::with(['web','module'])->get();
        return view('settings.index',compact('settings'));
    }


    public function create(){
        $modules=Module::all();
        $webs=Web::all();
        $field_types=['image','email'];
        return view('settings.create',compact('modules','webs','field_types'));
    }

    public function store(Request $request){
        $data=$request->all();
        Validator::make($data,Setting::$creaateRules,Setting::$errorMsg)->validate();
        $module=Module::where('id','=',$data['module_id'])->first();
        $data['module_name']=$module->module_name;

        Setting::create($data);
        $request->session()->flash('success_settings','SETTINGS IS CREATED');
        return redirect()->back();
    }


    public function delete($id){
        if($id>0){
            $setting=Setting::find($id);

            if(!empty($setting)){
                $setting->delete();
                return redirect()->back();
            }

        }
    }
}
