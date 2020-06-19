<?php

namespace ethercap\ledapExample;

use yii\web\Controller;
use yii\filters\VerbFilter;

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
}
