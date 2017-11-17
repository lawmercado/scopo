<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\base\models\Produtor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produtor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cnpj')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pessoa_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
