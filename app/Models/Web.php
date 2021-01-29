<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Web
 * @package App\Models
 * @mixin Builder
 */
class Web extends Model
{
    use HasFactory;


    protected $fillable=['title','web_url'];


    public static $createRules=[
        'title'=>['required','unique:webs'],
        'web_url'=>['required','unique:webs'],
    ];

    public static $errorMsg=[
      'title.required'=>'THIS TITLE MUST NOT BE EMPTY',
      'title.unique'=>'THIS TITLE MUST IS USING',
      'web_url.required'=>'THIS URL MUST NOT BE EMPTY',
      'web_url.unique'=>'THIS URL MUST IS USING',
    ];
}
