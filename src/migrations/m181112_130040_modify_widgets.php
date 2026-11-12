<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   amos\sitemanagement\migrations
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

use yii\db\Migration;

/**
 * Class m180308_094940_add_foreign_keys_site_management_metadata
 */
class m181112_130040_modify_widgets extends Migration
{

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->update('amos_widgets', ['dashboard_visible' => 0, 'child_of' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementAdministration'],
            ['classname' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementSection' ]);
        $this->update('amos_widgets', ['dashboard_visible' => 0,'child_of' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementAdministration'],
            ['classname' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementTemplate']);
        $this->update('amos_widgets', ['dashboard_visible' => 0,'child_of' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementAdministration'],
            ['classname' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementFields']);

        $this->update('amos_widgets', ['dashboard_visible' => 0, 'default_order' => 60, 'child_of' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementAdministration'],
            ['classname' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementLanding']);
//        $this->update('amos_widgets', ['dashboard_visible' => 0,'child_of' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementLandingFather'],
//            ['classname' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementLandingPubblication']);

        $this->update('amos_widgets', ['dashboard_visible' => 0,'child_of' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementContainerFather'],
            ['classname' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementElement']);
        $this->update('amos_widgets', ['dashboard_visible' => 0,'child_of' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementContainerFather'],
            ['classname' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementContainer']);




        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->update('amos_widgets', ['dashboard_visible' => 1,'child_of' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementDashboard'],
            ['classname' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementSection' ]);
        $this->update('amos_widgets', ['dashboard_visible' => 1,'child_of' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementDashboard'],
            ['classname' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementTemplate']);
        $this->update('amos_widgets', ['dashboard_visible' => 1,'child_of' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementDashboard'],
            ['classname' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementFields']);

        $this->update('amos_widgets', ['dashboard_visible' => 1,'child_of' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementDashboard'],
            ['classname' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementLanding']);
//        $this->update('amos_widgets', ['dashboard_visible' => 1,'child_of' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementDashboard'],
//            ['classname' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementLandingPubblication']);

        $this->update('amos_widgets', ['dashboard_visible' => 1,'child_of' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementDashboard'],
            ['classname' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementElement']);
        $this->update('amos_widgets', ['dashboard_visible' => 1,'child_of' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementDashboard'],
            ['classname' => 'amos\sitemanagement\widgets\icons\WidgetIconSiteManagementContainer']);


        return true;
    }
}
