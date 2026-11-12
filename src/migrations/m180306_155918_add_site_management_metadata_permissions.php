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

use open20\amos\core\migration\AmosMigrationPermissions;
use yii\helpers\ArrayHelper;
use yii\rbac\Permission;

/**
 * Class m180306_155918_add_site_management_metadata_permissions
 */
class m180306_155918_add_site_management_metadata_permissions extends AmosMigrationPermissions
{
    /**
     * @inheritdoc
     */
    protected function setRBACConfigurations()
    {
        return ArrayHelper::merge(
            $this->setModelPermissions(),
            $this->setWidgetsPermissions()
        );
    }

    private function setModelPermissions()
    {
        return [

            // Permissions for model Metadata
            [
                'name' => 'METADATA_CREATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Create permission for model Metadata',
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR', 'SITE_MANAGEMENT_REDACTOR']
            ],
            [
                'name' => 'METADATA_READ',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Read permission for model Metadata',
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR', 'SITE_MANAGEMENT_REDACTOR']
            ],
            [
                'name' => 'METADATA_UPDATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Update permission for model Metadata',
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR', 'SITE_MANAGEMENT_REDACTOR']
            ],
            [
                'name' => 'METADATA_DELETE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Delete permission for model Metadata',
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR', 'SITE_MANAGEMENT_REDACTOR']
            ]
        ];
    }

    private function setWidgetsPermissions()
    {
        $prefixStr = 'Permissions for the dashboard for the widget ';
        return [
            [
                'name' => \amos\sitemanagement\widgets\icons\WidgetIconSiteManagementMetadata::className(),
                'type' => Permission::TYPE_PERMISSION,
                'description' => $prefixStr . 'WidgetIconSiteManagementMetadata',
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR', 'SITE_MANAGEMENT_REDACTOR']
            ]
        ];
    }
}
