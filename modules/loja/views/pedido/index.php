<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\loja\models\PedidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidos';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="pedido-index">

    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ]) ?>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('Criar pedido', [ 'create' ], [ 'class' => 'btn btn-success' ]) ?>
    </p>
    <?=

    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [ 'class' => 'yii\grid\SerialColumn' ],
            'pedido_id',
            'momento',
            'quantidade',
            // 'oferta_id',
            // 'consumidor_id',
            // 'status_id',
            [ 'class' => 'yii\grid\ActionColumn' ],
        ],
    ]);

    ?>
</div>
