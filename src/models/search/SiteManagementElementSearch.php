<?php
/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   amos\site-management
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

use amos\sitemanagement\models\SiteManagementContainer;
use amos\sitemanagement\models\SiteManagementContainerElementMm;
use amos\sitemanagement\utility\SiteManagementUtility;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use amos\sitemanagement\models\SiteManagementElement;

/**
* SiteManagementElementSearch represents the model behind the search form about `amos\sitemanagement\models\SiteManagementElement`.
*/
class SiteManagementElementSearch extends SiteManagementElement
{
    public function rules()
    {
        return [
            [['id', 'template_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['title', 'description', 'elem_order', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function getScope($params)
    {
        $scope = $this->formName();
        if( !isset( $params[$scope]) ){
            $scope = '';
        }
        return $scope;
    }

    public function search($params)
    {
        $permissions = SiteManagementUtility::getEnabledPermissionsForUpdate();
        $query = SiteManagementElement::find();

        // if you don't set  in the platform the permission you can't filter for permission
        if (!empty($permissions)) {
            if (!\Yii::$app->user->can('SITE_MANAGEMENT_ADMINISTRATOR')) {
                $canModify = SiteManagementUtility::getPermissionUserCan($permissions);
                $a = SiteManagementContainerElementMm::find()
                                ->joinWith('container')
                                ->andWhere([
                                    'OR',
                                    ['site_management_container.permission' => $canModify],
                                    ['site_management_container.permission' => null],
                                ])->all();

                $elementsIds = [];

                foreach ($a as $elemMm) {
                    $elementsIds [] = $elemMm->element_id;
                }

                $query->andWhere(['site_management_element.id' => $elementsIds]);
            }
        }


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $scope = $this->getScope($params);

        if (!($this->load($params, $scope) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'template_id' => $this->template_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'elem_order', $this->elem_order]);
        return $dataProvider;
    }
}