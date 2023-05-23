<?php

use amos\sitemanagement\Module;
use yii\helpers\HtmlPurifier;

/**
 * @var yii\web\View $this
 * @var amos\sitemanagement\models\SiteManagementSliderElem $model
 */
$tipoElemento = HtmlPurifier::process(Yii::$app->request->get('slider_type'));
$getTitle = HtmlPurifier::process(Yii::$app->request->get('slider_title'));

$this->title = (!empty($getTitle))? $getTitle: Module::t('amossitemanagement', 'Aggiorna');
$this->params['breadcrumbs'][] = ['label' => Module::t('amossitemanagement', 'Site Management Slider Elem'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('amossitemanagement', 'Aggiorna');
?>
<div class="site-management-slider-elem-update">

    <?= $this->render('_form', [
        'model' => $model,
        'slider' => $slider,
        'files' => $files,
        'useCrop' => $useCrop,
        'ratioCrop' => $ratioCrop,
    ]) ?>

</div>
