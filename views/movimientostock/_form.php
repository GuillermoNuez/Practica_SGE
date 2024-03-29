<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Movimientostock */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movimientostock-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fk_idProducto')->textInput() ?>

    <?= $form->field($model, 'fk_idStockOrigen')->textInput() ?>

    <?= $form->field($model, 'fk_idStockDestino')->textInput() ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'fk_idUser')->textInput() ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cierre')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
