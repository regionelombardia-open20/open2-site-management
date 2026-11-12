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
class m180830_104640_insert_data_templates_html_base extends Migration
{

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->update('site_management_template', ['view_path' => '@vendor/amos/site-management/src/templates/html_base'], ['id' => 4] );
        $this->insert('site_management_fields_type', ['id' => 11, 'name' => 'html_code', 'type' => 'html']);
        $this->insert('site_management_template_fields', ['template_id' => 4, 'field_id' => 11]);



        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->execute('SET FOREIGN_KEY_CHECKS = 0;');

        $this->update('site_management_template', ['view_path' => null], ['id' => 4]);
        $this->delete('site_management_fields_type', ['id' => 11, 'name' => 'html_code', 'type' => 'html']);
        $this->delete('site_management_template_fields', ['template_id' => 4, 'field_id' => 11]);

        $this->execute('SET FOREIGN_KEY_CHECKS = 1;');

        return true;
    }
}
