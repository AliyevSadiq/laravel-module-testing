<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ModuleController extends Controller
{

    public function index(){
        $modules=Module::all();
        return view('modules.index',compact('modules'));
    }


    public function create(){

        return view('modules.create');
    }





    public function store(Request $request){
         Validator::make($request->all(),Module::$createRules)->validate();

        DB::beginTransaction();
        try{
            Module::create($request->all());
            $return=$output=[];
            exec("cd .. && cd app/Modules && git clone git@github.com:AliyevSadiq/{$request->all()['module_name']}.git",$output,$return);
            if($return!=0){
                return 'error';
            }else{
                Artisan::call("migrate --path=/app/Modules/{$request->all()['module_name']}/database/migrations/");
            }
            $request->session()->flash('success_module','MODULE IS CREATED');
            DB::commit();
            return redirect()->back();
        }catch (\Exception $e){
            DB::rollback();
        }

    }


    public function delete($id){
        if($id>0){
        $module=Module::find($id);


        if(!empty($module)){
            DB::beginTransaction();
            try{
                Artisan::call("migrate:reset --path=/app/Modules/{$module->module_name}/database/migrations/");
                $return=$output=[];
                exec("cd .. && cd app/Modules && rm -r {$module->module_name}",$output,$return);
                if($return!=0){
                    return 'error';
                }else{
                    $module->delete();
                    Setting::where('module_id','=',$id)->delete();
                }
                DB::commit();
                return  redirect('/module');
            }catch (\Exception $e){
                DB::rollback();
            }
        }
        }
    }


    public function setting($id) {
        if($id>0){
            $module_settings=Setting::where('module_id','=',$id)->with('web')->get();

            if(!empty($module_settings)){
               return view('modules.settings',compact('module_settings'));
            }
    }
    }

    public function moduleSetting(Request $request){
           $data=$request->all();
           Validator::make($data,Setting::$addSettingToModule,Setting::$errorMsg)->validate();


             for($i=0;$i<count($data['field_name']);$i++){
                 Setting::where('field_name', '=', $data['field_name'][$i])->update(['field_value'=>$data['field_value'][$i]]);
             }
        $request->session()->flash('success_setting_module','THESE SETTING PARAMETERS ADDED FOR THIS MODULE');

     return redirect('/module');

    }



}
