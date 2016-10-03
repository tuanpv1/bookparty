<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OrderBook */

$this->title = 'Create Order Book';
$this->params['breadcrumbs'][] = ['label' => 'Order Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
