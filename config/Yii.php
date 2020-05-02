<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 7.11.2018 г.
 * Time: 19:41
 */

use app\components\User;

/**
 * Yii bootstrap file.
 * Used for enhanced IDE code autocompletion.
 */
class Yii extends \yii\BaseYii
{
    /**
     * @var BaseApplication|WebApplication|ConsoleApplication the application instance
     */
    public static $app;
}

/**
 * Class BaseApplication
 * Used for properties that are identical for both WebApplication and ConsoleApplication
 *
 * @property \nkostadinov\taxonomy\Taxonomy $taxonomy
 * @property \yii\authclient\Collection $authClientCollection
 * @property \yii\queue\Queue $queue The queue component
 */
abstract class BaseApplication extends yii\base\Application
{
}

/**
 * Class WebApplication
 * Include only Web application related components here
 *
 * @property User $user The user component. This property is read-only. Extended component.
 * @property \app\components\MyResponse $response The response component. This property is read-only. Extended component.
 * @property \app\components\ErrorHandler $errorHandler The error handler application component. This property is read-only. Extended component.
 */
class WebApplication extends yii\web\Application
{
}

/**
 * Class ConsoleApplication
 * Include only Console application related components here
 *
 * @property \app\components\ConsoleUser $user The user component. This property is read-only. Extended component.
 */
class ConsoleApplication extends yii\console\Application
{
}