<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   amos\sitemanagement\widgets\graphics\views
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

use amos\sitemanagement\models\SiteManagementCommunitySliderMm;
use amos\sitemanagement\Module;
use amos\sitemanagement\widgets\SMSliderWidget;
use amos\sitemanagement\widgets\SMSliderWidgetBS4;
use open20\amos\core\helpers\Html;
use yii\web\View;
use amos\sitemanagement\assets\ModuleSiteManagementInterfacciaAsset;
use trk\uikit\helpers\HtmlHelper;
use yii\helpers\Html as HelpersHtml;
use yii\helpers\VarDumper;
use open20\amos\core\utilities\CurrentUser;

ModuleSiteManagementInterfacciaAsset::register($this);
/**
 * @var View $this
 * @var \amos\sitemanagement\widgets\graphics\WidgetCommunitySliderImage $widget
 * @var integer $communityId
 */

$userModule = CurrentUser::getUserProfile();

if (!is_null($communityId)) {
    $communityImageSlider = SiteManagementCommunitySliderMm::find()
        ->andWhere(['community_id' => $communityId])
        ->andWhere(['type' => SiteManagementCommunitySliderMm::TYPE_IMAGES])
        ->one();

    $slider = $communityImageSlider->siteManagementSlider;
}
?>


<?php
    if (!empty($communityImageSlider) && (!empty($slider)) && ($slider->getSliderElems()->count() > 0)) {
?>
<div class="widget-graphic-cms-bi-less container">
    <div class="page-header">
        <div class="flexbox">
            <!--<div>-->
                <!--<p class="h2 text-uppercase mb-0 no-margin">< ?= Module::t('amossitemanagement', 'Immagini') ?></p>-->
            <!--</div>-->
        </div>
    </div>
    <div>
        <div class="row flexbox flex-wrap m-t-25">
            <?php
                foreach ($slider->getSliderElems()->orderBy('order')->all() as $slider) {
                    $img = $slider->fileImage;
                    if(!is_null($img)){
                        if(!empty($slider->link)){
                            echo '<div class="col-md-4 col-sm-6 m-b-25"><a href="' . $slider->link . '" title="Vai alla pagina"><img src="' . $img->getWebUrl() . '" class="img-responsive" title="' . $slider->title . '"></a><div>' . $slider->description . '</div></div>';
                        } else {
                            echo '<div class="col-md-4 col-sm-6 m-b-25"><img src="' . $img->getWebUrl() . '" class="img-responsive" title="' . $slider->title . '"><div>' . $slider->description . '</div></div>';
                        }
                    }
                }
            ?>
        </div>
    </div>
</div>
<?php }

/* else{?>
    <div class="no-result-message mx-auto container">
        <div class="page-header">
            <div class="flexbox">
                <div>
                    <p class="h2 text-uppercase mb-0 no-margin"><?= Module::t('amossitemanagement', 'Immagini') ?></p>
                </div>
            </div>
        </div>

        <div class="flexbox flexbox-column">
                <p class="h4">Non ci sono contenuti che corrispondono ai tuoi interessi. </p>
                <div>
                    <?php if (CurrentUser::isPlatformGuest()){ ?><!--guest va all'accedi e secondo non si vede -->
                        <a class="btn btn-primary" href="/site/login">sii il primo a scrivere un contenuto</a>
                    <?php }else{ ?><!--loggato: vede entrambe: crea/update-->

                        <a href="/it/sitemanagement/site-management-community-slider-elements/images" class="btn btn-primary">sii il primo a scrivere un contenuto</a>
                        <a href="/amosadmin/user-profile/update?id=<?=$userModule->id ?>" class="btn btn-secondary"> aggiorna i tuoi interessi </a>

                    <?php } ?>
                </div>
        </div>
    </div>
<?php }  */ ?>