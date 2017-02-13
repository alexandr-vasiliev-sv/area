<?php

use yii\helpers\{
    Html, Url
};

/* @var $this yii\web\View */

$this->title = 'Areas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="public-areas">
    <div class="row">
        <div class="col-lg-12">
            <h1>
                <?= Html::encode($this->title) ?>
            </h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <?php foreach ($areas as $area) :?>
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <div class="img-area-block">
                        <?= Html::a(
                                Html::img(
                                    '/' . $area->fullImagePath(),
                                    ['class' => 'img-responsive']
                                ),
                                Url::to(['public/area', 'id' => $area->id])
                        )?>
                    </div>
                    <div class="caption">
                        <div class="area-title-block">
                            <h3>
                                <?php if (strlen($area->name) > 35) :?>
                                    <?= substr(Html::encode($area->name), 0, 35) . '...'?>
                                <?php else :?>
                                    <?= Html::encode($area->name)?>
                                <?php endif;?>
                            </h3>
                        </div>
                        <div class="area-description-block">
                            <p>
                                <?php if (strlen($area->description) > 100) :?>
                                    <?= substr(Html::encode($area->description), 0, 100) . '...'?>
                                <?php else :?>
                                    <?= Html::encode($area->description)?>
                                <?php endif;?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>

    </div>
</div>
