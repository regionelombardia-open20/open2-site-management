<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   amos\sitemanagement\models\base
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

namespace amos\sitemanagement\models\base;

use amos\sitemanagement\Module;
use open20\amos\core\record\Record;
use yii\helpers\ArrayHelper;

/**
 * Class MetadataType
 *
 * This is the base-model class for table "site_management_metadata_type".
 *
 * @property integer $id
 * @property string $type
 *
 * @property \amos\sitemanagement\models\Metadata[] $metadatas
 *
 * @package amos\sitemanagement\models\base
 */
class MetadataType extends Record
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_management_metadata_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'id' => Module::t('amossitemanagement', 'ID'),
            'type' => Module::t('amossitemanagement', 'Type')
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMetadatas()
    {
        return $this->hasMany(\amos\sitemanagement\models\Metadata::className(), ['metadata_type_id' => 'id']);
    }
}
