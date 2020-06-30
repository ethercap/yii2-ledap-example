<?php

namespace ethercap\ledapExample\controllers;

use Yii;
use ethercap\ledapExample\models\Score;
use ethercap\ledapExample\forms\ScoreSearchForm;
use ethercap\apiBase\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use ethercap\common\helpers\SysMsg;

/**
 * ScoreController implements the CRUD actions for Score model.
 */
class ScoreController extends Controller
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
     * Lists all Score models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->request->isAjax) {
            $model = new Score();
            $_GET['withConfig'] = true;
            $data = $this->renderApi('model.api', ['model' => $model]);
            return $this->render('index', [
                'model' => $data['data'],
            ]);
        }
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $searchModel = new ScoreSearchForm();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderApi('list.api', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Score model.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $id = Yii::$app->request->get('id', 0);
        $model = $this->findModel($id);
        return $this->renderApi('model.api', ['model' => $model]);
    }

    /**
     * Creates a new Score model.
     * @return mixed
     */
    public function actionCreate()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = new Score();

        if ($model->load(Yii::$app->request->post(), '') && $model->save()) {
            return SysMsg::getOkData('操作成功');
        }
        return $this->renderApi('model.api', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Score model.
     * @param int $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = $this->findModel($id);
        if ($model->isNewRecord) {
            return SysMsg::getErrData('数据错误');
        }

        if ($model->load(Yii::$app->request->post(), '') && $model->save()) {
            return SysMsg::getOkData('操作成功');
        }

        return $this->renderApi('model.api', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Score model.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = $this->findModel($id);
        if (!$model->isNewRecord) {
            $model->delete();
        }
        return SysMsg::getOkData('操作成功');
    }

    /**
     * Finds the Score model based on its primary key value.
     * If the model is not found, return a new Model()
     * @param int $id
     * @return Score the loaded model
     */
    protected function findModel($id)
    {
        if (($model = Score::findOne($id)) !== null) {
            return $model;
        }
        return new Score();
    }
}
