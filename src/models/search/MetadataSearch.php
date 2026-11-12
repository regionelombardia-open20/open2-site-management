<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   amos\sitemanagement\models\search
 * @author    Aria S.p.A. <protocollo@pec.ariaspa.it>
 * @license   GNU General Public License v3.0 <https://www.gnu.org/licenses/gpl-3.0.html>
 * @link      https://www.ariaspa.it/
 *
 * This file is part of OPEN 2.0.
 *
 * OPEN 2.0 is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OPEN 2.0 is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OPEN 2.0. If not, see <https://www.gnu.org/licenses/>.
 */

namespace amos\sitemanagement\models\search;

use amos\sitemanagement\models\Metadata;
use amos\sitemanagement\models\MetadataType;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;

/**
 * Class MetadataSearch
 * MetadataSearch represents the model behind the search form about `amos\sitemanagement\models\Metadata`.
 * @package amos\sitemanagement\models\search
 */
class MetadataSearch extends Metadata
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'updated_by', 'deleted_by', 'metadata_type_id'], 'integer'],
            [['key_value', 'content', 'metadata_type_id', 'created_at', 'updated_at', 'deleted_at'], 'safe']
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
     * This is the base search.
     * @param array $params
     * @return ActiveQuery
     */
    public function baseSearch($params)
    {
        /** @var ActiveQuery $query */
        $query = Metadata::find();
        $query->innerJoinWith('metadataType');
        $this->initOrderVars(); // Init the default search values
        $this->setOrderVars($params); // Check params to get orders value
        return $query;
    }

    /**
     * Search sort.
     * @param ActiveDataProvider $dataProvider
     */
    protected function setSearchSort($dataProvider)
    {
        // Check if can use the custom module order
        $dataProvider->setSort([
            'attributes' => [
                'key_value' => [
                    'asc' => [self::tableName() . '.key_value' => SORT_ASC],
                    'desc' => [self::tableName() . '.key_value' => SORT_DESC]
                ],
                'content' => [
                    'asc' => [self::tableName() . '.content' => SORT_ASC],
                    'desc' => [self::tableName() . '.content' => SORT_DESC]
                ],
                'metadataType.type' => [
                    'asc' => [MetadataType::tableName() . '.type' => SORT_ASC],
                    'desc' => [MetadataType::tableName() . '.type' => SORT_DESC]
                ]
            ]
        ]);
    }

    /**
     * Base filter.
     * @param ActiveQuery $query
     * @return mixed
     */
    public function baseFilter($query)
    {
        $query->andFilterWhere([
            'metadata_type_id' => $this->metadata_type_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by
        ]);

        $query->andFilterWhere(['like', self::tableName() . '.key_value', $this->key_value]);
        $query->andFilterWhere(['like', self::tableName() . '.content', $this->content]);

        return $query;
    }

    /**
     * Generic search for this model. It return all records.
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = $this->baseSearch($params);
        $dataProvider = new ActiveDataProvider(['query' => $query]);
        $this->setSearchSort($dataProvider);
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $this->baseFilter($query);
        return $dataProvider;
    }
}
