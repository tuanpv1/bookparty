<?php
namespace frontend\controllers;
use common\models\Package;
use yii\web\Controller;

/**
 * Site controller
 */
class PackageController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actionView($id){
        return $this->render('view', [
            'model' => Package::findOne(['id'=>$id]),
        ]);
    }
    public function actionIndex(){
        $package = Package::find()->andWhere(['status'=>Package::STATUS_ACTIVE])->all();
        return $this->render('index',[
            'package'=>$package,
        ]);
    }
}
