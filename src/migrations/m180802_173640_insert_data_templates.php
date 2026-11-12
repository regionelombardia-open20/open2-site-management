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
class m180802_173640_insert_data_templates extends Migration
{

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->insert('site_management_fields_type', ['id' => 1, 'name' => 'title', 'type' => 'string']);
        $this->insert('site_management_fields_type', ['id' => 2, 'name' => 'description', 'type' => 'text']);
        $this->insert('site_management_fields_type', ['id' => 3, 'name' => 'button_text', 'type' => 'string']);
        $this->insert('site_management_fields_type', ['id' => 4, 'name' => 'button_link', 'type' => 'string']);
        $this->insert('site_management_fields_type', ['id' => 5, 'name' => 'data','type' => 'date']);
        $this->insert('site_management_fields_type', ['id' => 6, 'name' => 'code','type' => 'string']);
        $this->insert('site_management_fields_type', ['id' => 7, 'name' => 'new','type' => 'string']);
        $this->insert('site_management_fields_type', ['id' => 8, 'name' => 'special','type' => 'string']);
        $this->insert('site_management_fields_type', ['id' => 9, 'name' => 'link_forward','type' => 'string']);
        $this->insert('site_management_fields_type', ['id' => 10, 'name' => 'image','type' => 'file']);



        $this->insert('site_management_template_fields', ['template_id' => 1, 'field_id' => 1]);
        $this->insert('site_management_template_fields', ['template_id' => 1, 'field_id' => 2]);
        $this->insert('site_management_template_fields', ['template_id' => 1, 'field_id' => 3]);
        $this->insert('site_management_template_fields', ['template_id' => 1, 'field_id' => 4]);
        $this->insert('site_management_template_fields', ['template_id' => 1, 'field_id' => 6]);
        $this->insert('site_management_template_fields', ['template_id' => 1, 'field_id' => 10]);


        $this->insert('site_management_template_fields', ['template_id' => 2, 'field_id' => 1]);
        $this->insert('site_management_template_fields', ['template_id' => 2, 'field_id' => 2]);
        $this->insert('site_management_template_fields', ['template_id' => 2, 'field_id' => 5]);
        $this->insert('site_management_template_fields', ['template_id' => 2, 'field_id' => 6]);
        $this->insert('site_management_template_fields', ['template_id' => 2, 'field_id' => 7]);
        $this->insert('site_management_template_fields', ['template_id' => 2, 'field_id' => 10]);


        $this->insert('site_management_template_fields', ['template_id' => 3, 'field_id' => 1]);
        $this->insert('site_management_template_fields', ['template_id' => 3, 'field_id' => 2]);
        $this->insert('site_management_template_fields', ['template_id' => 3, 'field_id' => 6]);
        $this->insert('site_management_template_fields', ['template_id' => 3, 'field_id' => 8]);
        $this->insert('site_management_template_fields', ['template_id' => 3, 'field_id' => 9]);
        $this->insert('site_management_template_fields', ['template_id' => 3, 'field_id' => 10]);

        $this->insert('site_management_template_fields', ['template_id' => 5, 'field_id' => 1]);
        $this->insert('site_management_template_fields', ['template_id' => 5, 'field_id' => 2]);
        $this->insert('site_management_template_fields', ['template_id' => 5, 'field_id' => 5]);
        $this->insert('site_management_template_fields', ['template_id' => 5, 'field_id' => 9]);
        $this->insert('site_management_template_fields', ['template_id' => 5, 'field_id' => 10]);


        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->execute('SET FOREIGN_KEY_CHECKS = 0;');

        $this->delete('site_management_fields_type', ['id' => 1, 'name' => 'title', 'type' => 'string']);
        $this->delete('site_management_fields_type', ['id' => 2, 'name' => 'description', 'type' => 'text']);
        $this->delete('site_management_fields_type', ['id' => 3, 'name' => 'button_text', 'type' => 'string']);
        $this->delete('site_management_fields_type', ['id' => 4, 'name' => 'button_link', 'type' => 'string']);
        $this->delete('site_management_fields_type', ['id' => 5, 'name' => 'data','type' => 'date']);
        $this->delete('site_management_fields_type', ['id' => 6, 'name' => 'code','type' => 'string']);
        $this->delete('site_management_fields_type', ['id' => 7, 'name' => 'new','type' => 'string']);
        $this->delete('site_management_fields_type', ['id' => 8, 'name' => 'special','type' => 'string']);
        $this->delete('site_management_fields_type', ['id' => 9, 'name' => 'link_forward','type' => 'string']);
        $this->delete('site_management_fields_type', ['id' => 10, 'name' => 'image','type' => 'file']);



        $this->delete('site_management_template_fields', ['template_id' => 1, 'field_id' => 1]);
        $this->delete('site_management_template_fields', ['template_id' => 1, 'field_id' => 2]);
        $this->delete('site_management_template_fields', ['template_id' => 1, 'field_id' => 3]);
        $this->delete('site_management_template_fields', ['template_id' => 1, 'field_id' => 4]);
        $this->delete('site_management_template_fields', ['template_id' => 1, 'field_id' => 6]);
        $this->delete('site_management_template_fields', ['template_id' => 1, 'field_id' => 10]);


        $this->delete('site_management_template_fields', ['template_id' => 2, 'field_id' => 1]);
        $this->delete('site_management_template_fields', ['template_id' => 2, 'field_id' => 2]);
        $this->delete('site_management_template_fields', ['template_id' => 2, 'field_id' => 5]);
        $this->delete('site_management_template_fields', ['template_id' => 2, 'field_id' => 6]);
        $this->delete('site_management_template_fields', ['template_id' => 2, 'field_id' => 7]);
        $this->delete('site_management_template_fields', ['template_id' => 2, 'field_id' => 10]);


        $this->delete('site_management_template_fields', ['template_id' => 3, 'field_id' => 1]);
        $this->delete('site_management_template_fields', ['template_id' => 3, 'field_id' => 2]);
        $this->delete('site_management_template_fields', ['template_id' => 3, 'field_id' => 6]);
        $this->delete('site_management_template_fields', ['template_id' => 3, 'field_id' => 8]);
        $this->delete('site_management_template_fields', ['template_id' => 3, 'field_id' => 9]);
        $this->delete('site_management_template_fields', ['template_id' => 3, 'field_id' => 10]);

        $this->delete('site_management_template_fields', ['template_id' => 5, 'field_id' => 1]);
        $this->delete('site_management_template_fields', ['template_id' => 5, 'field_id' => 2]);
        $this->delete('site_management_template_fields', ['template_id' => 5, 'field_id' => 5]);
        $this->delete('site_management_template_fields', ['template_id' => 5, 'field_id' => 9]);
        $this->delete('site_management_template_fields', ['template_id' => 5, 'field_id' => 10]);

        $this->execute('SET FOREIGN_KEY_CHECKS = 1;');

        return true;
    }
}
