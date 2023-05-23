<?php

namespace amos\sitemanagement\models;

use open20\amos\core\record\Record;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "site_management_section".
 */
class SiteManagementSection extends \amos\sitemanagement\models\base\SiteManagementSection
{
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


    public static function getEditFields()
    {
        $labels = self::attributeLabels();

        return [
            [
                'slug' => 'name',
                'label' => $labels['name'],
                'type' => 'string'
            ],
            [
                'slug' => 'description',
                'label' => $labels['description'],
                'type' => 'string'
            ],
        ];
    }

    /**
     * @param Record $model
     * @return mixed
     */
    public static function getAvailableSections($model)
    {
        $tableName = $model->tableName();
        $siteManagementSectionTable = SiteManagementSection::tableName();
        $siteManagementContainerTable = SiteManagementContainer::tableName();
        $siteManagementSliderTable = SiteManagementSlider::tableName();
        $siteManagementPageContentTable = PageContent::tableName();
        $containerSectionId = ($tableName == $siteManagementContainerTable) ? $model->section_id : null;
        $sliderSectionId = ($tableName == $siteManagementSliderTable) ? $model->section_id : null;
        $pageContentSectionId = ($tableName == $siteManagementPageContentTable) ? $model->section_id : null;

        /** @var ActiveQuery $query */
        $query = \amos\sitemanagement\models\SiteManagementSection::find();

        $query->leftJoin($siteManagementContainerTable, $siteManagementContainerTable . '.section_id = ' . $siteManagementSectionTable . '.id')
            ->andWhere([
                'or',
                [$siteManagementContainerTable . '.section_id' => $containerSectionId],
                [$siteManagementContainerTable . '.section_id' => null]
            ]);
//            ->orWhere(['IS NOT', $siteManagementContainerTable . '.deleted_at', null]);

        $query->leftJoin($siteManagementSliderTable, $siteManagementSliderTable . '.section_id = ' . $siteManagementSectionTable . '.id')
            ->andWhere([
                'or',
                [$siteManagementSliderTable . '.section_id' => $sliderSectionId],
                [$siteManagementSliderTable . '.section_id' => null]
            ]);
//            ->orWhere(['IS NOT', $siteManagementSliderTable . '.deleted_at' , null]);

        $query->leftJoin($siteManagementPageContentTable, $siteManagementPageContentTable . '.section_id = ' . $siteManagementSectionTable . '.id')
            ->andWhere([
                'or',
                [$siteManagementPageContentTable . '.section_id' => $pageContentSectionId],
                [$siteManagementPageContentTable . '.section_id' => null]
            ]);
//            ->orWhere(['IS NOT', $siteManagementSliderTable . '.deleted_at', null]);

//        pr($query->createCommand()->getRawSql());
        return $query;
    }
}
