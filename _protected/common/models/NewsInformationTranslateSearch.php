<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NewsInformationTranslate;

/**
 * NewsInformationTranslateSearch represents the model behind the search form about `common\models\NewsInformationTranslate`.
 */
class NewsInformationTranslateSearch extends NewsInformationTranslate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'news_info_id', 'lang_id'], 'integer'],
            [['information'], 'safe'],
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
        $query = NewsInformationTranslate::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'news_info_id' => $this->news_info_id,
            'lang_id' => $this->lang_id,
        ]);

        $query->andFilterWhere(['like', 'information', $this->information]);

        return $dataProvider;
    }
}
