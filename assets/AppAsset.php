<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use Yii;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $manifestPath = '@webroot/dist/manifest.json';

    public $js = [
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init()
    {
        parent::init();
        if(!Yii::$app->user->isGuest) {
            $this->depends = [];
            $this->css = [];
//            $this->js[] = YII_ENV_DEV ? 'http://localhost:8080/app.js' : '';
//            if(!YII_ENV_DEV)
//                $this->js[] = $this->Vue('chunk-vendors.js');

//            $this->js[] = $this->Vue('chunk-vendors.js');
            $this->js[] = $this->Vue('app.js');
//            $this->css[] = $this->Vue('app.css');
        }
    }

    public function Vue($filename) {
        $manifest = Yii::getAlias($this->manifestPath);
        if(file_exists($manifest)) {
            $data = Json::decode(file_get_contents($manifest));
            if($data[$filename])
                return '/dist/'.$data[$filename];
        }

        return (YII_ENV_DEV ? 'http://localhost:8080/' : '') . $filename;
    }
}
