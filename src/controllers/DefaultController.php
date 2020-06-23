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
        return $this->render('index', []);
    }

    public function actionMenu()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return SysMsg::getOkData($this->module->params['menu']);
    }
}
