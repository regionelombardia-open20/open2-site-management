<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   amos\sitemanagement\views\metadata
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

use amos\sitemanagement\models\MetadataType;
use amos\sitemanagement\Module;
use open20\amos\core\forms\editors\Select;
use open20\amos\core\helpers\Html;
use open20\amos\core\utilities\ArrayUtility;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var amos\sitemanagement\models\search\MetadataSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>
<div class="<?= Yii::$app->controller->id ?>-search element-to-toggle" data-toggle-element="form-search">

    <?php $form = ActiveForm::begin([
        'action' => Yii::$app->controller->action->id,
        'method' => 'get',
        'options' => [
            'class' => 'default-form'
        ]
    ]);
    ?>

    <?= Html::hiddenInput("enableSearch", "1") ?>

    <div class="col-xs-12">
        <h2 class="title">
            <?= Module::tHtml('amoscore', 'Search by'); ?>:
        </h2>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'metadata_type_id')->widget(Select::className(), [
            'data' => ArrayUtility::translateArrayValues(ArrayHelper::map(MetadataType::find()->asArray()->all(), 'id', 'type'), 'amossitemanagement'),
            'options' => [
                'lang' => substr(Yii::$app->language, 0, 2),
                'multiple' => false,
                'placeholder' => Module::t('amoscore', 'Select/Choose') . '...',
                'data-model' => 'metadata_type',
                'data-field' => 'type'
            ],
            'pluginOptions' => [
                'allowClear' => true
            ]
        ]) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'key_value')->textInput(['placeholder' => Module::t('amossitemanagement', 'Search by key')]) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'content')->textInput(['placeholder' => Module::t('amossitemanagement', 'Search by content')]) ?>
    </div>

    <div class="col-xs-12">
        <div class="pull-right">
            <?= Html::resetButton(Module::tHtml('amoscore', 'Reset'), ['class' => 'btn btn-secondary']) ?>
            <?= Html::submitButton(Module::tHtml('amoscore', 'Search'), ['class' => 'btn btn-navigation-primary']) ?>
        </div>
    </div>

    <div class="clearfix"></div>
    <?php ActiveForm::end(); ?>
</div>
