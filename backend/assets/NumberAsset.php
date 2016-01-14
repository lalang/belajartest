<?php
/**
 * Created by PhpStorm.
 * User: rio
 * Date: 03/10/15
 * Time: 20:59
 */

namespace backend\assets;


use yii\web\AssetBundle;

class NumberAsset extends AssetBundle
{
    public $sourcePath = '@bower/jquery-number';
    public $baseUrl = '@web';
    public $css = [

    ];
    public $js = [
        'jquery.number.min.js',
    ];
}