<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    amos\sitemanagement\utility
 * @category   CategoryName
 */

namespace amos\sitemanagement\utility;

use amos\sitemanagement\models\Metadata;
use amos\sitemanagement\models\MetadataTypeOpt;
use yii\base\BaseObject;

/**
 * Class SiteManagementUtility
 * @package amos\sitemanagement\utility
 */
class SiteManagementUtility extends BaseObject
{
    /**
     * This method register all metadata in the application.
     */
    public static function registerMetadata()
    {
        $allMetadata = Metadata::find()->all();
        foreach ($allMetadata as $metadata) {
            /** @var Metadata $metadata */
            $typeKey = MetadataTypeOpt::getMetadataKeyValueAttribute($metadata->metadata_type_id);
            \Yii::$app->view->registerMetaTag([
                $typeKey => $metadata->key_value,
                'content' => $metadata->content
            ]);
        }
    }

    /**
     * @param $appLanguage
     * @return string
     */
    public static function convertLanguage($appLanguage){
        $language = \Yii::$app->language;
        $explode = explode('-', $language);
        if(count($explode) == 2){
            $language = $explode[0];
        }else {
            $language = 'it';
        }
        return $language;
//
//        if($appLanguage == 'it-IT'){
//            return 'IT';
//        }
//        if($appLanguage == 'en-EN'){
//            return 'EN';
//        }
//        if($appLanguage == 'es-ES'){
//            return 'ES';
//        }
//        if($appLanguage == 'de-DE'){
//            return 'DE';
//        }
//        if($appLanguage == 'fr-FR'){
//            return 'fr';
//        }
//        if($appLanguage == 're-RU'){
//            return 'RE';
//        }else {
//            return 'IT';
//        }
    }
}
