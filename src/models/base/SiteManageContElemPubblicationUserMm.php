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

namespace amos\sitemanagement\models\base;

use Yii;

/**
 * This is the base-model class for table "site_manage_cont_elem_pubblication_user_mm".
 *
 * @property integer $id
 * @property integer $cont_elem_pubblication_id
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 *
 * @property \amos\sitemanagement\models\SiteManageContElemPubblication $contElemPubblication
 * @property \open20\amos\core\user\User $user
 */
class SiteManageContElemPubblicationUserMm extends \open20\amos\core\record\Record
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_manage_cont_elem_pubblication_user_mm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cont_elem_pubblication_id', 'user_id'], 'required'],
            [['cont_elem_pubblication_id', 'user_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['cont_elem_pubblication_id'], 'exist', 'skipOnError' => true, 'targetClass' => SiteManageContElemPubblication::className(), 'targetAttribute' => ['cont_elem_pubblication_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \open20\amos\core\user\User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('amossitemanagement', 'ID'),
            'cont_elem_pubblication_id' => Yii::t('amossitemanagement', 'Pubblication'),
            'user_id' => Yii::t('amossitemanagement', 'User'),
            'created_at' => Yii::t('amossitemanagement', 'Created at'),
            'updated_at' => Yii::t('amossitemanagement', 'Updated at'),
            'deleted_at' => Yii::t('amossitemanagement', 'Deleted at'),
            'created_by' => Yii::t('amossitemanagement', 'Created by'),
            'updated_by' => Yii::t('amossitemanagement', 'Updated at'),
            'deleted_by' => Yii::t('amossitemanagement', 'Deleted at'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContElemPubblication()
    {
        return $this->hasOne(\amos\sitemanagement\models\SiteManageContElemPubblication::className(), ['id' => 'cont_elem_pubblication_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\open20\amos\core\user\User::className(), ['id' => 'user_id']);
    }
}
