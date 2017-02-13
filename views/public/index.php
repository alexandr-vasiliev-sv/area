<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <div class="row">
        <div class="col-lg-12">
            <h1>
                <?= Html::encode($this->title) ?>
                <small>Soon</small>
            </h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <?= $this->render('_events', [
            'events' => $events,
            'pages' => $pages,
        ])?>
    </div>
</div>
