<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   amos\sitemanagement
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
class m181115_124201_update_template extends \yii\db\Migration {

    public function safeUp() {


        $this->insert('site_management_fields_type', ['id'=> 18, 'name' => 'text_editor', 'type' => 'html']);
        $this->insert('site_management_template_fields', ['template_id' => 7, 'field_id' => 18]);
        $this->delete('site_management_template_fields', ['template_id' => 7, 'field_id' => 1]);
        $this->delete('site_management_template_fields', ['template_id' => 7, 'field_id' => 2]);

    }

    public function safeDown() {
        $this->delete('site_management_fields_type', ['id'=> 18, 'name' => 'text_editor', 'type' => 'editor']);
        $this->delete('site_management_template_fields', ['id' => 18, 'template_id' => 7, 'field_id' => 18]);
    }

}
