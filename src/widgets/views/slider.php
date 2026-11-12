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

/**
 * @var $sliderElements \amos\sitemanagement\models\SiteManagementSliderElem
 * @var $slider \amos\sitemanagement\models\SiteManagementSlider
 */
use amos\sitemanagement\Module;
use \amos\sitemanagement\models\SiteManagementSliderElem;

$sliderElements = $slider->getSliderElems()->orderBy('order ASC')->all();

?>
 <div class="wrap-slider">
        <!--Carousel Wrapper-->
        <div id="<?= $key ?>" class="carousel slide sitemanagement-carousel" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php
                if(count($sliderElements) > 1) {
                    for ($i = 0; $i < count($sliderElements); $i++) { ?>
                        <li data-target="#<?= $key ?>" data-slide-to="<?= $i ?>"
                            class="<?= $i == 0 ? 'active' : '' ?>"></li>
                        <?php
                    }
                }
                ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php
                $i = 0;
                foreach ($sliderElements as $element){
                    $active = false;
                    if($i == 0){
                        $active = true;
                    }
                    if($element->type == SiteManagementSliderElem::TYPE_IMG){
                        echo $this->render('_item_image', ['element' => $element, 'active' => $active, 'crop' => $crop]);
                    } else {
                        echo $this->render('_item_video', ['element' => $element, 'active' => $active, 'optionsVideo' => $optionsVideo]);
                    }
                    $i++;
                }
                ?>


            </div>
            <!-- Left and right controls -->
            <?php   if(count($sliderElements) > 1) {?>
                <a class="left carousel-control" href="#<?= $key ?>" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only"><?= Module::tHtml('amossitemanagement', '#previous') ?></span>
                </a>
                <a class="right carousel-control" href="#<?= $key ?>" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only"><?= Module::tHtml('amossitemanagement', '#next') ?></span>
                </a>
            <?php  } ?>
        </div>
<!--Carousel Wrapper-->
</div>