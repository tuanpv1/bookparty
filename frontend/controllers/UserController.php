<?php

namespace frontend\controllers;

use common\models\Comment;
use common\models\Course;
use common\models\UserSearch;
use DateTime;
use Yii;
use common\models\User;
use yii\base\Response;
use yii\data\Pagination;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $listComment = null;
        $query = Comment::find()
            ->andWhere(['id_teacher'=>$id])
            ->orderBy(['id'=>SORT_DESC]);
        $countQuery = clone  $query;
        $pages = new Pagination(['totalCount'=>$countQuery->count()]);
        $pageSize = Yii::$app->params['page_size'];
        $pages->setPageSize($pageSize);
        $comment = $query->offset($pages->offset)->limit(10)->all();
        $j =0 ;
        foreach($comment as $item ){
            $listComment[$j] = new \stdClass();
            $listComment[$j]->content  = $item->des;
            $listComment[$j]->user = User::findOne(['id'=>$item->id_teacher]);
            $listComment[$j]->updated_at = $item->updated_at;
            $j++;
        }
        $student = User::find()
            ->innerJoin('book','book.user_id = user.id')
            ->andWhere(['user.status'=>User::STATUS_ACTIVE])
            ->andWhere(['user.type'=>User::TYPE_STUDENTS])
            ->andWhere(['book.teacher_id'=>$id])
            ->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'student'=>$student,
            'listComment'=>$listComment,
            'pages'=>$pages
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = User::find()->andWhere(['id'=>$id])->andWhere(['status' => User::STATUS_ACTIVE])->one();
        if(!$model){
            throw  new BadRequestHttpException('Người dùng không tồn tại');
        }

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        $avatar_old = $model->image;

        $model->birthday = $model->birthday?date('d/m/Y',strtotime($model->birthday)):'';

        if ($model->load(Yii::$app->request->post())) {
            $avatar  = UploadedFile::getInstance($model, 'image');
            if ($avatar) {
                $avatar_name = Yii::$app->user->id . '.' . uniqid() . time() . '.' . $avatar->extension;
                if ($avatar->saveAs(Yii::getAlias('@webroot') . "/" . Yii::getAlias('@avatar') . "/" . $avatar_name)) {
                    $model->image = $avatar_name;
                    $model->birthday = $model->birthday?date('Y-m-d H:i:s',strtotime(DateTime::createFromFormat("d/m/Y", $model->birthday)->setTime(0,0)->format('Y-m-d H:i:s'))):'';
                    if ($model->save()) {
                        Yii::$app->session->setFlash('success', 'Cập nhật thành công thông tin người dùng!');
                        return $this->redirect(['my-page', 'id' => $model->id]);
                    } else {
                        Yii::$app->getSession()->setFlash('error', 'Lỗi hệ thống vui lòng thử lại');
                        Yii::error($model->getErrors());
                        return $this->redirect(['my-page', 'id' => $model->id]);
                    }
                } else {
                    Yii::$app->getSession()->setFlash('error', 'Lỗi hệ thống, vui lòng thử lại');
                    return $this->redirect(['my-page', 'id' => $model->id]);
                }
            }else {
                $model->image = $avatar_old;
                $model->birthday = $model->birthday?date('Y-m-d H:i:s',strtotime(DateTime::createFromFormat("d/m/Y", $model->birthday)->setTime(0,0)->format('Y-m-d H:i:s'))):'';
                $model->save();
                Yii::$app->getSession()->setFlash('success', 'Cập nhật thành công thông tin người dùng');
                return $this->redirect(['my-page', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public  function actionMyPage($id){
        return $this->render('my-page',[
            'model'=>User::findOne(['id'=>$id]),
            'dataCourse' => Course::find()->andWhere(['id_user'=>$id])->all(),
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionChangeMyPassword(){
        $id = Yii::$app->user->identity->id;
        /** @var User $model */
        $model = User::findOne($id);
        if (!$model) {
            throw  new BadRequestHttpException('Người dùng không tồn tại');
        }

        $model->setScenario('user-setting');

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            echo "<pre>";
//            print_r($model);
//            die();
            $model->setPassword($model->setting_new_password);
            $model->password_reset_token = $model->setting_new_password;
            if ($model->save(false)) {
                Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Đổi mật khẩu thành công'));
                return $this->redirect(['my-page','id'=>$id]);
            } else {
                Yii::warning($model->getErrors());
                Yii::$app->getSession()->setFlash('danger', Yii::t('app', 'Đổi mật khẩu không thành công'));
                return $this->redirect(['my-page','id'=>$id]);
            }
        }
        return $this->render('change-my-password',[
            'model'=>$model,
        ]);
    }
}
