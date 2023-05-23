<?php

use amos\sitemanagement\Module;
use open20\amos\core\forms\ActiveForm;
use open20\amos\core\forms\CloseSaveButtonWidget;
use open20\amos\core\forms\Tabs;
use kartik\select2\Select2;
use open20\amos\attachments\components\CropInput;

/**
 * @var yii\web\View $this
 * @var \amos\sitemanagement\models\SiteManagementSliderElem $model
 * @var yii\widgets\ActiveForm $form
 */
$module                  = \Yii::$app->getModule('sitemanagement');
$enableUploadVideoSlider = $module->enableUploadVideoSlider;
$enableTextSlider        = $module->enableTextSlider;
$videoType               = \amos\sitemanagement\models\SiteManagementSliderElem::TYPE_VIDEO;
$js                      = <<<JS

     if($('#type-elem').val() == $videoType){
         $('#url-video').show();
         $('.img-profile').hide();
        console.log($('#url-video-1').val().length);
         if(($('#url-video-1 input').val().length) !== 0){
            $('#url-video-1').show();
            $('#type-of-video input[value=0]').prop("checked", true);
        }
        else {
           $('#path-video').show();
           $('#type-of-video input[value=1]').prop("checked", true);
        }
     }
     
     
    $('#type-elem').on('select2:select', function(){
        if($(this).val() == $videoType){
            $('#url-video').show();
            $('.img-profile').hide();
        } else {
            $('#url-video').hide();
            $('.img-profile').show();
        }
    });

$('#type-of-video input[type=radio]').click(function(){
    if($(this).val() == 1){
        $('#path-video').show();
        $('#url-video-1').hide();
        $('#url-video-1 input').val('');
    }
    else {
        $('#url-video-1').show();
        $('#path-video').hide();
         $('#path-video select').val('');

    }
});
JS;

$this->registerJs($js);
?>

<div class="site-management-slider-elem-form col-xs-12 nop">

    <?php $form = ActiveForm::begin(); ?>




    <?php $this->beginBlock('generale'); ?>

    <div class="col-lg-12 col-sm-12 m-t-30">
        <strong><?= \Yii::t('app', 'Slider').': ' ?></strong>
        <?= $slider->title ?>
    </div>

    <div class="col-lg-6 col-sm-6">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-lg-3 col-sm-3">
        <?=
        $form->field($model, 'type')->widget(Select2::className(),
            [
            'options' => [
                'id' => 'type-elem',
                'placeholder' => Module::t('amossitemanagement', 'Select...')
            ],
            'data' => [
                \amos\sitemanagement\models\SiteManagementSliderElem::TYPE_IMG => Module::t('amossitemanagement',
                    'Immagine'),
                \amos\sitemanagement\models\SiteManagementSliderElem::TYPE_VIDEO => Module::t('amossitemanagement',
                    'Video'),
            ],
//                'pluginOptions' =>[
//                        'allowClear' => true
//                ]
        ])
        ?>
    </div>

    <div class="col-lg-3 col-sm-3">
        <?= $form->field($model, 'order')->textInput() ?>
    </div>


    <div class="col-sm-6 col-md-6 col-xs-12">
        <div class="img-profile">
            <?php if (!empty($useCrop) && $useCrop == true) { ?>
                <?=
                $form->field($model, 'fileImage')->widget(CropInput::classname(),
                    [
                    'options' => [// Options of the Kartik's FileInput widget
                        'accept' => "image/*"
                    ],
                    'jcropOptions' => [
                        'aspectRatio' => (!empty($ratioCrop) ? $ratioCrop : '1.7'),
                        'maxFileCount' => 1, // Client max files,
                        'allowedPreviewTypes' => ['image'],
                        'showPreview' => true,
                    ],
                ])->label(Module::t('amossitemanagement', 'Image'));
                ?>
            <?php } else { ?>
                <?=
                $form->field($model, 'fileImage')->widget(\open20\amos\attachments\components\AttachmentsInput::classname(),
                    [
                    'options' => [// Options of the Kartik's FileInput widget
                        'accept' => "image/*"
                    ],
                    'pluginOptions' => [// Plugin options of the Kartik's FileInput widget
                        'maxFileCount' => 1, // Client max files,
                        'allowedPreviewTypes' => ['image'],
                        'showPreview' => true,
                    ]
                ])->label(Module::t('amossitemanagement', 'Image'))
                ?>
            <?php } ?>
        </div>
    </div>




    <div id='url-video' class="col-lg-12 col-sm-12" hidden>
        <?php if ($enableUploadVideoSlider) { ?>
            <div id="type-of-video" class="col-lg-6 col-sm-12">
                <?=
                $form->field($model, 'typeOfvideo')->radioList([0 => 'Video da Url', 1 => 'Video da file'])->label(Module::t('amossitemanagement',
                        'Tipo di video'))
                ?>
            </div>
            <div id="url-video-1" class="col-lg-6 col-sm-12" hidden>
                <?=
                $form->field($model, 'url_video')->textInput(['maxlength' => true])->label(Module::t('amossitemanagement',
                        'Url video youtube'))
                ?>
            </div>
            <div id="path-video" class="col-lg-6 col-sm-12" hidden>
                <?=
                $form->field($model, 'path_video')->widget(Select2::className(),
                    [
                    'data' => $files,
                    'options' => ['placeholder' => Module::t('amossitemanagement', 'Select...')]
                ])->label(Module::t('amossitemanagement', ''))
                ?>
            </div>
        <?php } else { ?>
            <div style= "display:none;">
                <?php $model->typeOfvideo = 1; ?>
                <?=
                $form->field($model, 'typeOfvideo')->radioList([0 => 'Video da Url', 1 => 'Video da file'])->label(Module::t('amossitemanagement',
                        'Tipo di video'))
                ?>
            </div>
            <div id="url-video-1" class="col-lg-6 col-sm-12 nop">
                <?=
                $form->field($model, 'url_video')->textInput(['maxlength' => true])->label(Module::t('amossitemanagement',
                        'Url video youtube'))
                ?>
            </div>
        <?php } ?>
    </div>

    <?php if ($enableTextSlider) { ?>
        <hr>

        <div class="col-lg-6 col-sm-12">
            <?= $form->field($model, 'link')->textInput() ?>
        </div>
        <div class="col-lg-6 col-sm-12">
            <?=
            $form->field($model, 'text_position')->widget(Select2::className(),
                [
                'data' => $model->getAllTextPositionLabel(),
                'options' => ['placeholder' => Module::t('amossitemanagement', 'Select...')]
            ])
            ?>
        </div>
        <div class="col-lg-12 col-sm-12">
            <?=
            $form->field($model, 'description')->widget(\open20\amos\core\forms\TextEditorWidget::className(),
                [
                'clientOptions' => [
                    'lang' => substr(Yii::$app->language, 0, 2)
                ]
            ])
            ?>
        </div>
    <?php } ?>

    <div class="clearfix"></div>
    <?php $this->endBlock('generale'); ?>

    <?php
    $itemsTab[] = [
        'label' => Module::t('amossitemanagement', 'generale'),
        'content' => $this->blocks['generale'],
    ];
    ?>

    <?=
    Tabs::widget(
        [
            'encodeLabels' => false,
            'items' => $itemsTab
        ]
    );
    ?>
    <?=
    CloseSaveButtonWidget::widget([
        'model' => $model,
        'urlClose' => ((\Yii::$app->request->referrer && strpos(\Yii::$app->request->referrer, 'create') === false ) ? \Yii::$app->request->referrer
                : \yii\helpers\Url::previous()),
    ]);
    ?>
    <?php ActiveForm::end(); ?>
</div>
