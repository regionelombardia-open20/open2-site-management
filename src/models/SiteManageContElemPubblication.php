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

namespace amos\sitemanagement\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "site_manage_cont_elem_pubblication".
 */
class SiteManageContElemPubblication extends \amos\sitemanagement\models\base\SiteManageContElemPubblication
{
    public $pubblicationClasses;
    public $pubblicationUsers;

    public function representingColumn()
    {
        return [
            //inserire il campo o i campi rappresentativi del modulo
        ];
    }



    public function attributeHints()
    {
        return [
        ];
    }

    /**
     * Returns the text hint for the specified attribute.
     * @param string $attribute the attribute name
     * @return string the attribute hint
     */
    public function getAttributeHint($attribute)
    {
        $hints = $this->attributeHints();
        return isset($hints[$attribute]) ? $hints[$attribute] : null;
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['pubblicationClasses', 'pubblicationUsers'], 'safe']
        ]);
    }

    public function attributeLabels()
    {
        return
            ArrayHelper::merge(
                parent::attributeLabels(),
                [
                ]);
    }


    public function getEditFields()
    {
        $labels = $this->attributeLabels();

        return [
            [
                'slug' => 'container_id',
                'label' => $labels['container_id'],
                'type' => 'integer'
            ],
            [
                'slug' => 'container_elem_id',
                'label' => $labels['container_elem_id'],
                'type' => 'integer'
            ],
            [
                'slug' => 'pubblication_type_id',
                'label' => $labels['pubblication_type_id'],
                'type' => 'integer'
            ],
            [
                'slug' => 'start_date',
                'label' => $labels['start_date'],
                'type' => 'datetime'
            ],
            [
                'slug' => 'end_date',
                'label' => $labels['end_date'],
                'type' => 'datetime'
            ],
            [
                'slug' => 'start_time',
                'label' => $labels['start_time'],
                'type' => 'time'
            ],
            [
                'slug' => 'end_time',
                'label' => $labels['end_time'],
                'type' => 'datetime'
            ],
        ];
    }
}
