<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   amos\sitemanagement\views\site-management-container
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

use amos\sitemanagement\Module;
use open20\amos\core\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var amos\sitemanagement\models\search\SiteManagementContainerSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="site-management-container-search element-to-toggle" data-toggle-element="form-search">
    <div class="col-xs-12"><h2><?= Module::t('amossitemanagement', 'Search by') ?>:</h2></div>

    <?php $form = ActiveForm::begin([
        'action' => Yii::$app->controller->action->id,
        'method' => 'get',
        'options' => [
            'class' => 'default-form'
        ]
    ]);

    echo Html::hiddenInput("enableSearch", "1");
    echo Html::hiddenInput("currentView", Yii::$app->request->getQueryParam('currentView'));
    ?>

    <div class="col-sm-6 col-lg-4">
        <?= $form->field($model, 'section_id')->widget(\kartik\select2\Select2::className(),[
            'data' => \yii\helpers\ArrayHelper::map(\amos\sitemanagement\models\SiteManagementSection::find()->all(), 'id', 'name'),
            'options' => ['placeholder' => Module::t('amosistemanagement', 'Select...')]
        ]) ?>
    </div>
    <div class="col-sm-6 col-lg-4">
        <?= $form->field($model, 'page_name')->widget(\kartik\select2\Select2::className(),[
            'data' => \yii\helpers\ArrayHelper::map(\amos\sitemanagement\models\SiteManagementContainer::find()->distinct('page_name')->all(), 'page_name', 'page_name'),
            'options' => ['placeholder' => Module::t('amosistemanagement', 'Select...')]
        ]) ?>
    </div>
    <div class="col-sm-6 col-lg-4">
        <?= $form->field($model, 'is_masonry')->widget(\kartik\select2\Select2::className(),[
            'data' => [1 => 'Si', 0 => 'No'],
            'options' => ['placeholder' => Module::t('amosistemanagement', 'Select...')]
        ]) ?>
    </div>
    <div class="col-sm-6 col-lg-4">    <?= $form->field($model, 'title') ?></div>
    <div class="col-sm-6 col-lg-4">    <?= $form->field($model, 'description') ?></div>

    <div class="col-xs-12">
        <div class="pull-right">
            <?= Html::resetButton(Module::t('amossitemanagement', 'Reset'), ['class' => 'btn btn-secondary']) ?>
            <?= Html::submitButton(Module::t('amossitemanagement', 'Search'), ['class' => 'btn btn-navigation-primary']) ?>
        </div>
    </div>

    <div class="clearfix"></div>
    <!--a><p class="text-center">Ricerca avanzata<br>
                < ?=AmosIcons::show('caret-down-circle');?>
            </p></a-->
    <?php ActiveForm::end(); ?>
</div>
