<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $areas app\models\Area */
/* @var $shows app\models\Show */

$this->title = 'Create Event';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'areas' => $areas,
        'shows' => $shows,
    ]) ?>

</div>
