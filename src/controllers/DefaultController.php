<?php

namespace ethercap\ledapExample\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Response;
use Yii;
use ethercap\common\helpers\SysMsg;

/**
 * DefaultController implements the CRUD actions for Passwd model.
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Passwd models.
     * @return mixed
     */
    public function actionIndex()
    {
        /** 正常的配置需要交给前端来渲染，有如下三种方式来设置配置（不推荐之前的在php模板中直接书写<?php?>方式）：
         *  1. registerJsData, 本例所示即为通过registerJsData来设置
         *  2. ajax模式，通过接口来获取。菜单就是采用的这种模式。
         *  3. 直接把配置写在js中。
         * */
        $data = [
            'saleData' => [
                ['title' => 'EARNINGS (MONTHLY)', 'subTitle' => '$40,000', 'icon' => 'fa-calendar', 'variant' => 'primary', 'progress' => '', ],
                ['title' => 'EARNINGS (ANNUAL)', 'subTitle' => '$215,000', 'icon' => 'fa-dollar-sign', 'variant' => 'success', 'progress' => '', ],
                ['title' => 'TASKS', 'subTitle' => '50%', 'icon' => 'fa-clipboard-list', 'variant' => 'info', 'progress' => 50, ],
                ['title' => 'PENDING REQUESTS', 'subTitle' => '18', 'icon' => 'fa-comments', 'variant' => 'warning', 'progress' => '', ],
            ],

            'colors' => [
                ['title' => 'Primary', 'bg' => 'bg-primary', 'value' => '#4e73df'],
                ['title' => 'Success', 'bg' => 'bg-success', 'value' => '#1cc88a'],
                ['title' => 'Info', 'bg' => 'bg-info', 'value' => '#36b9cc'],
                ['title' => 'Warning', 'bg' => 'bg-warning', 'value' => '#f6c23e'],
                ['title' => 'Danger', 'bg' => 'bg-danger', 'value' => '#e74a3b'],
                ['title' => 'Secondary', 'bg' => 'bg-secondary', 'value' => '#858796'],
                ['title' => 'Light', 'bg' => 'bg-light', 'value' => '#f8f9fc', 'textblack' => true],
                ['title' => 'Dark', 'bg' => 'bg-dark', 'value' => '#5a5c69'],
            ],
        ];
        return $this->render('index', ['data' => $data]);
    }

    public function actionMenu()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return SysMsg::getOkData($this->module->params['menu']);
    }

    public function actionBaseinput()
    {
        return $this->render('baseinput', []);
    }

    public function actionCheckbox()
    {
        return $this->render('checkbox', []);
    }

    public function actionDropdown()
    {
        return $this->render('dropdown', []);
    }

    public function actionFormitem()
    {
        return $this->render('form-item', []);
    }

    public function actionGrid()
    {
        return $this->render('grid', []);
    }

    public function actionGroupinput()
    {
        return $this->render('groupinput', []);
    }

    public function actionRadio()
    {
        return $this->render('radio', []);
    }

    public function actionSearchinput()
    {
        return $this->render('searchinput', []);
    }

    public function actionSelect2()
    {
        return $this->render('select2', []);
    }

    public function actionTab()
    {
        return $this->render('tab', []);
    }
}
