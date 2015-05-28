<?php
use yii\helpers\Html;
?>
<p>Вы ввели следующую информацию:</p>

<ul>
    <li><label>Title</label>: <?= Html::encode($model->title) ?></li>
    <li><label>rating</label>: <?= Html::encode($model->rating) ?></li>
    <li><label>parent</label>: <?= Html::encode($model->parent) ?></li>
    <li><label>visible</label>: <?= Html::encode($model->visible) ?></li>
</ul>

<?= Html::a('Добавить еще...', ['/category/index'], ['class'=>'btn btn-primary']) ?>