<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 * @package App\Models
 * @mixin Builder
 */
class Setting extends Model
{
    use HasFactory;

    protected $fillable=['module_id','web_id','field_name','field_title','field_type','field_value','module_name'];



    public static $creaateRules=[
      'module_id'=>['required','exists:modules,id'],
      'web_id'=>['required','exists:webs,id'],
      'field_name'=>['required','unique:settings'],
      'field_title'=>['required'],
      'field_type'=>['required'],
    ];


    public static $addSettingToModule=[
        'field_value.*'=>['required']
    ];


    public static $errorMsg=[
        'module_id.required'=>'THIS MODULE IS MUST NOT BE EMPTY',
        'module_id.exists'=>'THIS MODULE IS NOT FIND',
        'web_id.exists'=>'THIS WEB SITE IS NOT FIND',
        'web_id.required'=>'THIS WEB SITE MUST NOT BE EMPTY',
        'field_name.required'=>'THIS FIELD NAME IS MUST NOT BE EMPTY',
        'field_name.unique'=>'THIS FIELD NAME IS USING',
        'field_title.required'=>'THIS FIELD TITLE IS MUST NOT BE EMPTY',
        'field_type.required'=>'THIS FIELD TYPE IS MUST NOT BE EMPTY',
        'field_value.*.required'=>'THIS FIELD VALUE IS MUST NOT BE EMPTY'
    ];


    public function web(){
        return $this->belongsTo(Web::class);
    }

    public function module(){
        return $this->belongsTo(Module::class);
    }
}
