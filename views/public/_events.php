<?php
    use yii\helpers\Html;
?>
<?php foreach ($events as $event) :?>
    <div class="col-md-4">

        <div class="image-block">
            <a href="#" class="thumbnail">
                <?= Html::img('/' . $event->fullImagePath(), [
                    'class' => 'img-responsive',
                ])?>
            </a>
        </div>
        <h3>
            <?= Html::a($event->title, ['#']);?>
        </h3>
        <div class="description-block">
            <p>
                <?php if (strlen($event->description) > 100):?>
                    <?= substr(Html::encode($event->description), 0, 100) . '...'?>
                <?php else :?>
                    <?= Html::encode($event->description);?>
                <?php endif;?>
            </p>
        </div>
    </div>
<?php endforeach;?>

<?= \yii\widgets\LinkPager::widget([
    'pagination' => $pages,
]);?>
