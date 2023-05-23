<?php

namespace amos\sitemanagement\models\base;

use Yii;

/**
 * This is the base-model class for table "site_management_slider_elem".
 *
 * @property integer $id
 * @property integer $slider_id
 * @property string $title
 * @property string $description
 * @property string $link
 * @property integer $type
 * @property string $url_video
 * @property string path_video
 * @property integer text_position
 * @property integer $order
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 */
class SiteManagementSliderElem extends \open20\amos\core\record\Record
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_management_slider_elem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slider_id', 'text_position', 'type', 'order', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['description', 'link'], 'string'],
            [['slider_id','type'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['title', 'url_video', 'path_video'], 'string', 'max' => 255],
            [['link'], 'url'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('amossitemanagement', 'ID'),
            'slider_id' => Yii::t('amossitemanagement', 'Slider'),
            'title' => Yii::t('amossitemanagement', 'Title'),
            'description' => Yii::t('amossitemanagement', 'Description'),
            'type' => Yii::t('amossitemanagement', 'Type'),
            'url_video' => Yii::t('amossitemanagement', 'Url video'),
            'text_position' => Yii::t('amossitemanagement', 'Text position'),
            'order' => Yii::t('amossitemanagement', 'Ordinamento'),
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
    public function getSlider()
    {
        return $this->hasOne(\amos\sitemanagement\models\SiteManagementSlider::className(), ['id' => 'slider_id']);
    }
}
