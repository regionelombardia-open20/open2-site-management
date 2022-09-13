<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    amos\sitemanagement\models\base
 * @category   CategoryName
 */

namespace amos\sitemanagement\models\base;

use amos\sitemanagement\Module;
use open20\amos\core\record\Record;

/**
 * Class PageContent
 *
 * This is the base-model class for table "site_management_page_content".
 *
 * @property integer $id
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
            [['tag'], 'required'],
            [['tag'], 'unique'],
            [['tag'], 'string', 'max' => 100],
            [['title'], 'string', 'max' => 255],
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
        return [
            'id' => Module::t('amossitemanagement', 'ID'),
            'tag' => Module::t('amossitemanagement', 'Tag'),
            'title' => Module::t('amossitemanagement', 'Page Title'),
            'content' => Module::t('amossitemanagement', 'Page Content'),
            'created_at' => Module::t('amoscore', '#created_at'),
            'updated_at' => Module::t('amoscore', '#updated_at'),
            'deleted_at' => Module::t('amoscore', '#deleted_at'),
            'created_by' => Module::t('amoscore', '#created_by'),
            'updated_by' => Module::t('amoscore', '#updated_by'),
            'deleted_by' => Module::t('amoscore', '#deleted_by')
        ];
    }
}
