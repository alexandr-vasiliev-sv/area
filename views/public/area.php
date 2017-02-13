<?php

use yii\helpers\{
    Html, Url
};

/* @var $this yii\web\View */

$this->title = 'Area';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <div class="row">
        <div class="col-lg-12">
            <h1>
                <?= Html::encode($this->title) ?>
            </h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <?= Html::img('/' . $area->fullImagePath(), [
                    'class' => 'img-responsive'
            ])?>
        </div>
        <div class="col-md-4">
            <h1><?= Html::encode($area->name) ?></h1>
            <p><?= Html::encode($area->description) ?></p>
        </div>
    </div>
    <div class="row">
        <h1>Events</h1>
        <?= $this->render('_events', [
            'events' => $events,
            'pages' => $pages,
        ])?>
    </div>
</div>
