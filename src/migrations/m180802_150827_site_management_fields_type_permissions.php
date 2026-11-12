<?php
/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   amos\site-management
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
use yii\rbac\Permission;


/**
* Class m180802_150827_site_management_fields_type_permissions*/
class m180802_150827_site_management_fields_type_permissions extends AmosMigrationPermissions
{

    /**
    * @inheritdoc
    */
    protected function setRBACConfigurations()
    {
        $prefixStr = '';

        return [
                [
                    'name' =>  'SITEMANAGEMENTFIELDSTYPE_CREATE',
                    'type' => Permission::TYPE_PERMISSION,
                    'description' => 'Permesso di CREATE sul model SiteManagementFieldsType',
                    'ruleName' => null,
                    'parent' => ['SITE_MANAGEMENT_TEMPLATE_CREATOR']
                ],
                [
                    'name' =>  'SITEMANAGEMENTFIELDSTYPE_READ',
                    'type' => Permission::TYPE_PERMISSION,
                    'description' => 'Permesso di READ sul model SiteManagementFieldsType',
                    'ruleName' => null,
                    'parent' => ['SITE_MANAGEMENT_TEMPLATE_CREATOR']
                    ],
                [
                    'name' =>  'SITEMANAGEMENTFIELDSTYPE_UPDATE',
                    'type' => Permission::TYPE_PERMISSION,
                    'description' => 'Permesso di UPDATE sul model SiteManagementFieldsType',
                    'ruleName' => null,
                    'parent' => ['SITE_MANAGEMENT_TEMPLATE_CREATOR']
                ],
                [
                    'name' =>  'SITEMANAGEMENTFIELDSTYPE_DELETE',
                    'type' => Permission::TYPE_PERMISSION,
                    'description' => 'Permesso di DELETE sul model SiteManagementFieldsType',
                    'ruleName' => null,
                    'parent' => ['SITE_MANAGEMENT_TEMPLATE_CREATOR']
                ],
            
            // ---------------

            [
                'name' =>  'SITEMANAGEMENTCONTAINERELEMFIELDSVAL_CREATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di CREATE sul model SiteManagementContainerElemFieldsVal',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_TEMPLATE_CREATOR']
            ],
            [
                'name' =>  'SITEMANAGEMENTCONTAINERELEMFIELDSVAL_READ',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di READ sul model SiteManagementContainerElemFieldsVal',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_TEMPLATE_CREATOR']
            ],
            [
                'name' =>  'SITEMANAGEMENTCONTAINERELEMFIELDSVAL_UPDATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di UPDATE sul model SiteManagementContainerElemFieldsVal',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_TEMPLATE_CREATOR']
            ],
            [
                'name' =>  'SITEMANAGEMENTCONTAINERELEMFIELDSVAL_DELETE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di DELETE sul model SiteManagementContainerElemFieldsVal',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_TEMPLATE_CREATOR']
            ],
            // ---------------------------

            [
                'name' =>  'SITEMANAGEMENTTEMPLATEFIELDS_CREATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di CREATE sul model SiteManagementTemplateFields',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_TEMPLATE_CREATOR']
            ],
            [
                'name' =>  'SITEMANAGEMENTTEMPLATEFIELDS_READ',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di READ sul model SiteManagementTemplateFields',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_TEMPLATE_CREATOR']
            ],
            [
                'name' =>  'SITEMANAGEMENTTEMPLATEFIELDS_UPDATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di UPDATE sul model SiteManagementTemplateFields',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_TEMPLATE_CREATOR']
            ],
            [
                'name' =>  'SITEMANAGEMENTTEMPLATEFIELDS_DELETE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di DELETE sul model SiteManagementTemplateFields',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_TEMPLATE_CREATOR']
            ],

        ];
    }
}
