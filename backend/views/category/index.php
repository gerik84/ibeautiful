<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use \app\models\Category;
use yii\widgets\ActiveForm;
use \app\models\MimeType;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'title') ?>
<?= $form->field($model, 'rating')->dropDownList(Category::$rating) ?>
<?= $form->field($model, 'parent')->dropDownList(ArrayHelper::map(Category::find()->all(), 'identifier', 'title')) ?>
<?= $form->field($model, 'type')->dropDownList(ArrayHelper::map(MimeType::find()->all(), 'identifier', 'mime_type')) ?>
<?= $form->field($model, 'visible')->radioList(['1'=>'visible', '0'=>'invisible'], array ('separator'=>' ' )) ?>

<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
