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

use amos\sitemanagement\Module;
use open20\amos\core\forms\ActiveForm;
use open20\amos\core\forms\CloseSaveButtonWidget;
use open20\amos\core\forms\Tabs;

/**
 * @var yii\web\View $this
 * @var amos\sitemanagement\models\SiteManagementTemplate $model
 * @var yii\widgets\ActiveForm $form
 */

$module = \Yii::$app->getModule('sitemanagement');
?>

<div class="site-management-template-form col-xs-12 nop">

    <?php $form = ActiveForm::begin(); ?>

    <?php $this->beginBlock('generale'); ?>

    <div class="col-lg-6 col-sm-6">
        <?= $form->field($model, 'name')->textInput() ?>
    </div>

    <div class="col-lg-6 col-sm-6">
        <?= $form->field($model, 'content_model')->widget(\kartik\select2\Select2::className(),[
            'data' => $module->getAvailableContentModels(),
            'options' => ['placeholder' => Module::t('amossitemanagement', 'Select...')],
            'pluginOptions' => [
                    'allowClear' => true
            ]
        ]) ?>
    </div>


    <div class="col-lg-12 col-sm-12">

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    </div>

    <div class="col-lg-6 col-sm-6">

        <?= $form->field($model, 'view_path')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-lg-6 col-sm-6">
        <?php $model->fieldTypes = $model->siteManagementFieldsTypes;?>
        <?= $form->field($model, 'fieldTypes')->widget(\kartik\select2\Select2::className(),[
            'data' => \yii\helpers\ArrayHelper::map(\amos\sitemanagement\models\SiteManagementFieldsType::find()->all(), 'id', 'name'),
            'pluginOptions' => [
                'multiple' => true
            ]
        ])->label(Module::t('amossitemanagement', 'Field types')) ?>
    </div>

    <div class="col-lg-12 col-sm-12"><h3><?= Module::t('amossitemanagement', 'Fields') ?></h3></div>
    <div class="col-lg-12 col-sm-12">
        <?php
        if (!$model->isNewRecord) {
            $dataProviderFields = new \yii\data\ActiveDataProvider([
                'query' => $model->getSiteManagementFieldsTypes()
            ]);
//            $dataProviderFields = \amos\sitemanagement\models\SiteManagementTemplateFields::
            ?>
            <?php echo \open20\amos\core\views\AmosGridView::widget([
                'dataProvider' => $dataProviderFields,
                'columns' => [
                    'name',
                    'type'
//                            [
//
//                                'class' => \open20\amos\core\views\grid\ActionColumn::className(),
//                                'controller' => 'site-management-container-element-mm',
//                                'template' => '{view}{update}{delete}',
//        //                            'buttons' => [
//        //                                    'view'
//        //                            ]
//                            ]
                ],
            ]);
        }?>
    </div>
    <div class="clearfix"></div>
    <?php $this->endBlock(); ?>

    <?php $itemsTab[] = [
        'label' => Module::t('amossitemanagement', 'generale'),
        'content' => $this->blocks['generale'],
    ];
    ?>

    <?= Tabs::widget(
        [
            'encodeLabels' => false,
            'items' => $itemsTab
        ]
    );
    ?>
    <?= CloseSaveButtonWidget::widget(['model' => $model]); ?>
    <?php ActiveForm::end(); ?>
</div>
