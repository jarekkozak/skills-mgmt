<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Location $model
 */

$this->title = Yii::t('skills', 'Create {modelClass}', [
    'modelClass' => 'Location',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('skills', 'Locations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
