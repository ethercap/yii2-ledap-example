<?php

namespace ethercap\ledapExample\controllers;

use Yii;
use ethercap\ledapExample\models\Student;
use ethercap\ledapExample\forms\StudentSearchForm;
use ethercap\apiBase\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use ethercap\common\helpers\SysMsg;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends Controller
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
                    $query = Student::find()
                        ->select(['id', 'name as text'])
                        ->asArray()
                        ->andFilterWhere(['id' => $model->id]);
                    if ($model->keyword) {
                        $query->andWhere(['or',
                            ['like', 'name', $model->keyword],
                            ['like', 'mobile', $model->keyword],
                        ]);
                    }
                    return $query;
                },
            ],
        ];
    }

    /**
     * Lists all Student models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->request->isAjax) {
            return $this->render('index', []);
        }
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $searchModel = new StudentSearchForm();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderApi('list.api', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Student model.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_HTML;
        $type = Yii::$app->request->get('type', 'view');
        $id = Yii::$app->request->get('id', 0);
        if (!in_array($type, ['view', 'update', 'create'])) {
            $type = 'view';
        }
        $model = $this->findModel($id);
        if ($model->isNewRecord && $type !== 'create') {
            throw new NotFoundHttpException('该数据不存在');
        }
        $data = $this->renderApi('model.api', ['model' => $model]);
        return $this->render('view', [
            'model' => $data['data'],
            'type' => $type,
        ]);
    }

    /**
     * Creates a new Student model.
     * @return mixed
     */
    public function actionCreate()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = new Student();

        if ($model->load(Yii::$app->request->post(), '') && $model->save()) {
            return SysMsg::getOkData('操作成功');
        }
        return $this->renderApi('model.api', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Student model.
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
     * Deletes an existing Student model.
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
     * Finds the Student model based on its primary key value.
     * If the model is not found, return a new Model()
     * @param int $id
     * @return Student the loaded model
     */
    protected function findModel($id)
    {
        if (($model = Student::findOne($id)) !== null) {
            return $model;
        }
        return new Student();
    }
}
