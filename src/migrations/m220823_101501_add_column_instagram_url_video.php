<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    amos\sitemanagement\migrations
 * @category   CategoryName
 */

use yii\db\Migration;

class m220823_101501_add_column_instagram_url_video extends Migration
{

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('site_management_slider_elem', 'instagram_url_video', $this->string()->null()->defaultValue(null)->comment('Instagram video URL')->after('path_video')) ;

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->execute('SET FOREIGN_KEY_CHECKS = 0;');

        $this->dropColumn('site_management_slider_elem', 'instagram_url_video');

        $this->execute('SET FOREIGN_KEY_CHECKS = 1;');

        return true;
    }
}
