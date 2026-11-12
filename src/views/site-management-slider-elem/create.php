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
use yii\helpers\HtmlPurifier;

/**
 * @var yii\web\View $this
 * @var \amos\sitemanagement\models\SiteManagementSliderElem $model
 * @var $slider \amos\sitemanagement\models\SiteManagementSlider
 */
$tipoElemento = HtmlPurifier::process(Yii::$app->request->get('slider_type'));
$getTitle = HtmlPurifier::process(Yii::$app->request->get('slider_title'));

if($tipoElemento == 1) {
    $this->title = (!empty($getTitle))? $getTitle: Yii::t('amossitemanagement', 'Aggiungi un\'immagine alla Galleria di') . ' "' . $slider->title . '"';
} else if($tipoElemento == 2) {
    $this->title = (!empty($getTitle))? $getTitle: Yii::t('amossitemanagement', 'Aggiungi un video alla Galleria di') . ' "' . $slider->title . '"';
} else if($tipoElemento == 3) {
    $this->title = Yii::t('amossitemanagement', 'Aggiungi un video Instagram alla Galleria di') . ' "' . $slider->title . '"';
} else {
    $this->title = (!empty($getTitle))? $getTitle: Yii::t('amossitemanagement', 'Create slider element') . ' "' . $slider->title . '"';
}
$externalSessionPreviousUrl = Yii::$app->session->get(Module::externalPreviousUrlSessionKey());
$externalSessionPreviousTitle = Yii::$app->session->get(Module::externalPreviousTitleSessionKey());
if (!is_null($externalSessionPreviousUrl)) {
    $this->params['breadcrumbs'][] = ['label' => $externalSessionPreviousTitle, 'url' => $externalSessionPreviousUrl];
} else {
    $this->params['breadcrumbs'][] = ['label' => Module::t('amossitemanagement', 'Site Management Slider Elem'), 'url' => ['index']];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-management-slider-elem-create">
    <?= $this->render('_form', [
        'model' => $model,
        'slider' => $slider,
        'files' => $files,
        'useCrop' => $useCrop,
        'ratioCrop' => $ratioCrop,
        'onlyImages' => $onlyImages,
        'onlyVideos' => $onlyVideos,
        'onlyInstagramVideos' => $onlyInstagramVideos
    ]) ?>

</div>
