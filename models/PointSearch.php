<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Point;

/**
 * PointSearch represents the model behind the search form of `common\models\Point`.
 */
class PointSearch extends Point
{
    public $languageName;
    public $cityName;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pointId', 'languageId', 'cityId'], 'integer'],
            [['macAddress', 'languageName', 'cityName'], 'safe'],
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
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Point::find();
        $query->joinWith(['language']);
        $query->joinWith(['city']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
         ]);

        $dataProvider->sort->attributes['languageName'] = [
            'asc' => ['language.name' => SORT_ASC],
            'desc' => ['language.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['cityName'] = [
            'asc' => ['city.name' => SORT_ASC],
            'desc' => ['city.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'pointId' => $this->pointId,
        ]);

        $query->andFilterWhere(['like', 'language.name', $this->languageName]);

        $query->andFilterWhere(['like', 'city.name', '%' . $this->cityName, false]);

        $query->andFilterWhere(['like', 'macAddress', '%' . $this->macAddress . '%', false]);

        return $dataProvider;
    }
}