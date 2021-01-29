<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Module
 * @package App\Models
 * @mixin Builder
 */
class Module extends Model
{
    use HasFactory;

    protected $table='modules';

    protected $fillable=['module_name'];


    public static $createRules=[
        'module_name'=>'required'
    ];

    public static function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new \Exception("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);

    }
}
