<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Event;

/**
 * EventSearch represents the model behind the search form about `app\models\Event`.
 */
class EventSearch extends Event
{
    public $date_from;

    public $date_to;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'show_id', 'area_id'], 'integer'],
            [['date_from', 'date_to'], 'safe'],
            [['title'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Event::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'show_id' => $this->show_id,
            'area_id' => $this->area_id,
        ]);
        if ($this->title) {
            $query->andWhere(['like', 'title', $this->title]);
        }

        if ($this->date_from && $this->date_to) {
            $query->andWhere(['between', 'date', $this->date_from, $this->date_to]);
        }

        return $dataProvider;
    }
}
