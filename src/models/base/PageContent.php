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
 * Class PageContent
 *
 * This is the base-model class for table "site_management_page_content".
 *
 * @property integer $id
 * @property integer $section_id
 * @property string $tag
 * @property string $title
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 *
 * @package amos\sitemanagement\models\base
 */
class PageContent extends Record
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_management_page_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section_id'], 'required'],
            [['tag'], 'string', 'max' => 100],
            [['title','permission'], 'string', 'max' => 255],
            [['content'], 'string'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['created_by', 'updated_by', 'deleted_by'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'id' => Module::t('amossitemanagement', 'ID'),
            'tag' => Module::t('amossitemanagement', 'Tag'),
            'section_id' => Module::t('amossitemanagement', 'Section'),
            'title' => Module::t('amossitemanagement', 'Page Title'),
            'content' => Module::t('amossitemanagement', 'Page Content'),
            'created_at' => Module::t('amoscore', '#created_at'),
            'updated_at' => Module::t('amoscore', '#updated_at'),
            'deleted_at' => Module::t('amoscore', '#deleted_at'),
            'created_by' => Module::t('amoscore', '#created_by'),
            'updated_by' => Module::t('amoscore', '#updated_by'),
            'deleted_by' => Module::t('amoscore', '#deleted_by')
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(\amos\sitemanagement\models\SiteManagementSection::className(), ['id' => 'section_id']);
    }
}
