<?php

namespace ethercap\ledapExample\controllers;

use Yii;
use ethercap\ledapExample\models\Document;
use ethercap\apiBase\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use ethercap\common\helpers\SysMsg;
use yii\helpers\Url;

/**
 * DocumentController implements the CRUD actions for Document model.
 */
class DocumentController extends Controller
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

    public function actionUpload()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $fileArr = $_FILES['file'] ?? [];
        if (empty($fileArr) || empty($fileArr['tmp_name'])) {
            return SysMsg::getErrData('文件不存在');
        }
        $fileName = $fileArr['name'] ?? '';
        $destName = md5(date('YmdHis').$fileName);
        $filePath = $fileArr['tmp_name'];
        copy($filePath, Yii::getAlias('@webroot/js/ledap/img/'.$destName));
        return SysMsg::getOkData(['url' => Url::to('/js/ledap/img/'.$destName, true)]);
    }

    /**
     * Displays a single Document model.
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
     * Creates a new Document model.
     * @return mixed
     */
    public function actionCreate()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = new Document();

        if ($model->load(Yii::$app->request->post(), '') && $model->save()) {
            return $this->renderApi('model.api', [
                'model' => $model,
            ]);
        }
        return $this->renderApi('model.api', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Document model.
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
            return $this->renderApi('model.api', [
                'model' => $model,
            ]);
        }

        return $this->renderApi('model.api', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Document model.
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
     * Finds the Document model based on its primary key value.
     * If the model is not found, return a new Model()
     * @param int $id
     * @return Document the loaded model
     */
    protected function findModel($id)
    {
        if (($model = Document::findOne($id)) !== null) {
            return $model;
        }
        return new Document(['content' => '']);
    }
}
