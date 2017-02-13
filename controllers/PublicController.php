<?php

namespace app\controllers;

use app\models\Area;
use app\models\Event;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PublicController extends Controller
{
    public function actionIndex()
    {
        $eventsQuery = Event::find()->where(['>=', 'date', date('Y-m-d')]);

        $countQuery = clone $eventsQuery;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $models = $eventsQuery->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'events' => $models,
            'pages' => $pages,
        ]);
    }

    public function actionAreas()
    {
        $areas = Area::find()->orderBy('order')->all();

        return $this->render('areas', [
            'areas' => $areas
        ]);
    }

    public function actionArea($id)
    {
        $area = $this->findArea($id);

        $eventsQuery = $area->getEvents();

        $countQuery = clone $eventsQuery;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $events = $eventsQuery->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('area', [
            'area' => $area,
            'events' => $events,
            'pages' => $pages,
        ]);
    }

    /**
     * Finds the Area model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Area the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findArea($id)
    {
        if (($model = Area::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}