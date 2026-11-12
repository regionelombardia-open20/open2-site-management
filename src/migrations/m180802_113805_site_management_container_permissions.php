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
* Class m180802_113805_site_management_container_permissions*/
class m180802_113805_site_management_container_permissions extends AmosMigrationPermissions
{

    /**
    * @inheritdoc
    */
    protected function setRBACConfigurations()
    {
        $prefixStr = '';

        return [
                [
                    'name' =>  'SITE_MANAGEMENT_TEMPLATE_CREATOR',
                    'type' => Permission::TYPE_ROLE,
                    'description' => 'Manage templates',
                    'ruleName' => null,
                    'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
                ],
            // -------------
                [
                    'name' =>  'SITEMANAGEMENTCONTAINER_CREATE',
                    'type' => Permission::TYPE_PERMISSION,
                    'description' => 'Permesso di CREATE sul model SiteManagementContainer',
                    'ruleName' => null,
                    'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
                ],
                [
                    'name' =>  'SITEMANAGEMENTCONTAINER_READ',
                    'type' => Permission::TYPE_PERMISSION,
                    'description' => 'Permesso di READ sul model SiteManagementContainer',
                    'ruleName' => null,
                    'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
                    ],
                [
                    'name' =>  'SITEMANAGEMENTCONTAINER_UPDATE',
                    'type' => Permission::TYPE_PERMISSION,
                    'description' => 'Permesso di UPDATE sul model SiteManagementContainer',
                    'ruleName' => null,
                    'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
                ],
                [
                    'name' =>  'SITEMANAGEMENTCONTAINER_DELETE',
                    'type' => Permission::TYPE_PERMISSION,
                    'description' => 'Permesso di DELETE sul model SiteManagementContainer',
                    'ruleName' => null,
                    'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
                ],
            //----------------------

            [
                'name' =>  'SITEMANAGEMENTTEMPLATE_CREATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di CREATE sul model SiteManagementTemplate',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_TEMPLATE_CREATOR']
            ],
            [
                'name' =>  'SITEMANAGEMENTTEMPLATE_READ',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di READ sul model SiteManagementTemplate',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_TEMPLATE_CREATOR']
            ],
            [
                'name' =>  'SITEMANAGEMENTTEMPLATE_UPDATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di UPDATE sul model SiteManagementTemplate',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_TEMPLATE_CREATOR']
            ],
            [
                'name' =>  'SITEMANAGEMENTTEMPLATE_DELETE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di DELETE sul model SiteManagementTemplate',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_TEMPLATE_CREATOR']
            ],
            // ----------------
            [
                'name' =>  'SITEMANAGEMENTELEMENT_CREATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di CREATE sul model SiteManagementElement',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],
            [
                'name' =>  'SITEMANAGEMENTELEMENT_READ',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di READ sul model SiteManagementElement',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],
            [
                'name' =>  'SITEMANAGEMENTELEMENT_UPDATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di UPDATE sul model SiteManagementElement',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],
            [
                'name' =>  'SITEMANAGEMENTELEMENT_DELETE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di DELETE sul model SiteManagementElement',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],

            // -------------------

            [
                'name' =>  'SITEMANAGEMENTCONTAINERELEMENTMM_CREATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di CREATE sul model SiteManagementContainerElementMm',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],
            [
                'name' =>  'SITEMANAGEMENTCONTAINERELEMENTMM_READ',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di READ sul model SiteManagementContainerElementMm',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],
            [
                'name' =>  'SITEMANAGEMENTCONTAINERELEMENTMM_UPDATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di UPDATE sul model SiteManagementContainerElementMm',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],
            [
                'name' =>  'SITEMANAGEMENTCONTAINERELEMENTMM_DELETE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di DELETE sul model SiteManagementContainerElementMm',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],
            //----------------

            [
                'name' =>  'SITEMANAGECONTELEMPUBBLICATION_CREATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di CREATE sul model SiteManageContElemPubblication',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],
            [
                'name' =>  'SITEMANAGECONTELEMPUBBLICATION_READ',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di READ sul model SiteManageContElemPubblication',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],
            [
                'name' =>  'SITEMANAGECONTELEMPUBBLICATION_UPDATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di UPDATE sul model SiteManageContElemPubblication',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],
            [
                'name' =>  'SITEMANAGECONTELEMPUBBLICATION_DELETE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di DELETE sul model SiteManageContElemPubblication',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],
            // ----------------

            [
                'name' =>  'SITEMANAGEPUBBLICATIONTYPE_CREATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di CREATE sul model SiteManagePubblicationType',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],
            [
                'name' =>  'SITEMANAGEPUBBLICATIONTYPE_READ',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di READ sul model SiteManagePubblicationType',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],
            [
                'name' =>  'SITEMANAGEPUBBLICATIONTYPE_UPDATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di UPDATE sul model SiteManagePubblicationType',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],
            [
                'name' =>  'SITEMANAGEPUBBLICATIONTYPE_DELETE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di DELETE sul model SiteManagePubblicationType',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],

            // ---------------
            [
                'name' =>  'SITEMANAGECONTELEMPUBBLICATIONCLASS_CREATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di CREATE sul model SiteManageContElemPubblicationClass',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],
            [
                'name' =>  'SITEMANAGECONTELEMPUBBLICATIONCLASS_READ',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di READ sul model SiteManageContElemPubblicationClass',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],
            [
                'name' =>  'SITEMANAGECONTELEMPUBBLICATIONCLASS_UPDATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di UPDATE sul model SiteManageContElemPubblicationClass',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],
            [
                'name' =>  'SITEMANAGECONTELEMPUBBLICATIONCLASS_DELETE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di DELETE sul model SiteManageContElemPubblicationClass',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],
            
            // -------------

            [
                'name' =>  'SITEMANAGECONTELEMPUBBLICATIONUSERMM_CREATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di CREATE sul model SiteManageContElemPubblicationUserMm',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],
            [
                'name' =>  'SITEMANAGECONTELEMPUBBLICATIONUSERMM_READ',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di READ sul model SiteManageContElemPubblicationUserMm',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],
            [
                'name' =>  'SITEMANAGECONTELEMPUBBLICATIONUSERMM_UPDATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di UPDATE sul model SiteManageContElemPubblicationUserMm',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],
            [
                'name' =>  'SITEMANAGECONTELEMPUBBLICATIONUSERMM_DELETE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permesso di DELETE sul model SiteManageContElemPubblicationUserMm',
                'ruleName' => null,
                'parent' => ['SITE_MANAGEMENT_ADMINISTRATOR']
            ],



        ];
    }
}
