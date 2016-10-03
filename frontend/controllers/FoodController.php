<?php
namespace frontend\controllers;
use common\models\Food;
use yii\web\Controller;

/**
 * Site controller
 */
class FoodController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actionView($id){
        return $this->render('view', [
            'model' => Food::findOne(['id'=>$id]),
        ]);
    }
    public function actionIndex(){
        $food = Food::find()->andWhere(['status'=>Food::STATUS_ACTIVE])->all();
        return $this->render('index', [
            'food' => $food,
        ]);
    }
}
