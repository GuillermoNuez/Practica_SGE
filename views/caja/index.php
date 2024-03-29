<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CajaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cajas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caja-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Caja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idCaja',
            'nombre',
            'descripcion',
            'monto',
            'fechaCreacion',
            // 'fechaUltimoMovimiento',
            // 'enable',
            // 'fk_idServicio',
            // 'fk_idSucursal',
            // 'fk_idCaja',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
