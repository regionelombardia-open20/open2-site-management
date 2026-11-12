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

namespace amos\sitemanagement\models\base;

use Yii;

/**
* This is the base-model class for table "site_management_template_fields".
*
    * @property integer $id
    * @property integer $template_id
    * @property integer $field_id
    * @property string $created_at
    * @property string $updated_at
    * @property string $deleted_at
    * @property integer $created_by
    * @property integer $updated_by
    * @property integer $deleted_by
    *
            * @property \amos\sitemanagement\models\SiteManagementFieldsType $field
            * @property \amos\sitemanagement\models\SiteManagementTemplate $template
    */
class SiteManagementTemplateFields extends \open20\amos\core\record\Record
{


/**
* @inheritdoc
*/
public static function tableName()
{
return 'site_management_template_fields';
}

/**
* @inheritdoc
*/
public function rules()
{
return [
            [['template_id', 'field_id'], 'required'],
            [['template_id', 'field_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['field_id'], 'exist', 'skipOnError' => true, 'targetClass' => SiteManagementFieldsType::className(), 'targetAttribute' => ['field_id' => 'id']],
            [['template_id'], 'exist', 'skipOnError' => true, 'targetClass' => SiteManagementTemplate::className(), 'targetAttribute' => ['template_id' => 'id']],
];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'id' => Yii::t('amossitemanagement', 'ID'),
    'template_id' => Yii::t('amossitemanagement', 'Element'),
    'field_id' => Yii::t('amossitemanagement', 'Field'),
    'created_at' => Yii::t('amossitemanagement', 'Created at'),
    'updated_at' => Yii::t('amossitemanagement', 'Updated at'),
    'deleted_at' => Yii::t('amossitemanagement', 'Deleted at'),
    'created_by' => Yii::t('amossitemanagement', 'Created by'),
    'updated_by' => Yii::t('amossitemanagement', 'Updated at'),
    'deleted_by' => Yii::t('amossitemanagement', 'Deleted at'),
];
}

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getField()
    {
    return $this->hasOne(\amos\sitemanagement\models\SiteManagementFieldsType::className(), ['id' => 'field_id']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getTemplate()
    {
    return $this->hasOne(\amos\sitemanagement\models\SiteManagementTemplate::className(), ['id' => 'template_id']);
    }
}
