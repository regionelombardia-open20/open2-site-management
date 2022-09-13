<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    amos\sitemanagement
 * @category   CategoryName
 */

namespace amos\sitemanagement;

use amos\sitemanagement\widgets\icons\WidgetIconSiteManagementDashboard;
use amos\sitemanagement\widgets\icons\WidgetIconSiteManagementPageContent;
use open20\amos\core\module\AmosModule;
use open20\amos\core\module\ModuleInterface;

/**
 * Class Module
 * @package amos\sitemanagement
 */
class Module extends AmosModule implements ModuleInterface
{
    /**
     * @var string|boolean the layout that should be applied for views within this module. This refers to a view name
     * relative to [[layoutPath]]. If this is not set, it means the layout value of the [[module|parent module]]
     * will be taken. If this is false, layout will be disabled within this module.
     */
    public $layout = 'main';

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'amos\sitemanagement\controllers';

    public $newFileMode = 0666;

    public $name = 'Amos Site Management';

    /**
     * @inheritdoc
     */
    public static function getModuleName()
    {
        return 'sitemanagement';
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        \Yii::setAlias('@amos/' . static::getModuleName() . '/controllers/', __DIR__ . '/controllers/');
        // custom initialization code goes here
        \Yii::configure($this, require(__DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php'));
    }

    /**
     * @inheritdoc
     */
    public function getWidgetIcons()
    {
        return [
            WidgetIconSiteManagementDashboard::className(),
            WidgetIconSiteManagementPageContent::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getWidgetGraphics()
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    protected function getDefaultModels()
    {
        return [
            'PageContent' => __NAMESPACE__ . '\\' . 'models\PageContent',
            'PageContentSearch' => __NAMESPACE__ . '\\' . 'models\search\PageContentSearch'
        ];
    }

    /**
     * This method return the session key that must be used to add in session
     * the url from the user have started the content creation.
     * @return string
     */
    public static function beginCreateNewSessionKey()
    {
        return 'beginCreateNewUrl_' . self::getModuleName();
    }

    /**
     * This method return the session key that must be used to add in session
     * the url date and time creation from the user have started the content creation.
     * @return string
     */
    public static function beginCreateNewSessionKeyDateTime()
    {
        return 'beginCreateNewUrlDateTime_' . self::getModuleName();
    }
}
