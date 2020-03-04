<?php
/**
 * Created by PhpStorm.
 * User: 2000
 * Date: 28.03.2019
 * Time: 10:18
 */

namespace app\common\widgets\AbsatractMicroMarkup;

use app\common\helpers\YamaguchiHelper;
use yii\base\Widget;

class AbsatractMicroMarkup extends Widget
{
    public $type;
    public $items;

    //JSON-LD
    //или в каждой модели есть метод возвращения для микроразметки, или
    // функция описывает определенные действия
    public function init()
    {
//        echo "<pre>"; print_r(\Yii::$app->request->pathInfo);die();
        parent::init();
    }

    // возвращаем результат
    public function run()
    {
        $fullStr = '<script type="application/ld+json">';

        $fullStr.= $this->render($this->type, [
            'items' => $this->items,
        ]);

        $fullStr .= '</script>';
//        echo "<pre>"; print_r($fullStr);die();
        return $fullStr;

    }
}