<?php

namespace ethercap\ledapExample\controllers;

use Yii;
use ethercap\ledapExample\models\Lesson;
use ethercap\ledapExample\forms\LessonSearchForm;
use ethercap\apiBase\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use ethercap\common\helpers\SysMsg;

/**
 * LessonController implements the CRUD actions for Lesson model.
 */
class LessonController extends Controller
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

    public function actions()
    {
        return [
            'search' => [
                'class' => '\ethercap\ledap\actions\SearchAction',
                'processQuery' => function ($model) {
                    $query = Lesson::find()
                        ->select(['id', 'name as text'])
                        ->asArray()
                        ->andFilterWhere(['id' => $model->id]);
                    if ($model->keyword) {
                        $query->andWhere(['or',
                            ['like', 'name', $model->keyword],
                        ]);
                    }
                    return $query;
                },
            ],
        ];
    }

    /**
     * Lists all Lesson models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->request->isAjax) {
            $model = new Lesson();
            $_GET['withConfig'] = true;
            $data = $this->renderApi('model.api', ['model' => $model]);
            return $this->render('index', [
                'model' => $data['data'],
            ]);
        }
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $searchModel = new LessonSearchForm();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderApi('list.api', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lesson model.
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
     * Creates a new Lesson model.
     * @return mixed
     */
    public function actionCreate()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = new Lesson();

        if ($model->load(Yii::$app->request->post(), '') && $model->save()) {
            return SysMsg::getOkData('操作成功');
        }
        return $this->renderApi('model.api', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Lesson model.
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
     * Deletes an existing Lesson model.
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
     * Finds the Lesson model based on its primary key value.
     * If the model is not found, return a new Model()
     * @param int $id
     * @return Lesson the loaded model
     */
    protected function findModel($id)
    {
        if (($model = Lesson::findOne($id)) !== null) {
            return $model;
        }
        return new Lesson();
    }
}
