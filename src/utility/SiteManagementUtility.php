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
use yii\base\Object;

/**
 * Class SiteManagementUtility
 * @package amos\sitemanagement\utility
 */
class SiteManagementUtility extends Object
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
}
