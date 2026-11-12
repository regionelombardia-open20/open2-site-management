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
<?php if(count($sliderElements)>1): ?>
  <div class="it-carousel-wrapper it-carousel-landscape-abstract-three-cols">
    <div class="it-carousel-all owl-carousel it-card-bg">
      <?php
                      $i = 0;
                      foreach ($sliderElements as $element){
                          $active = false;
                          if($i < 3){
                              $active = true;
                          }
                          if($element->type == SiteManagementSliderElem::TYPE_IMG){
                              echo $this->render('_item_imageBS4', ['element' => $element, 'active' => $active]);
                          } else {
                              echo $this->render('_item_videoBS4', ['element' => $element, 'active' => $active, 'optionsVideo' => $optionsVideo]);
                          }
                          $i++;
                      }
        ?>



    </div>
  </div>
<?php else: ?>
  <div class="single-item">
    <?php
                        $i = 0;
                        foreach ($sliderElements as $element){
                            $active = false;
                            if($i < 3){
                                $active = true;
                            }
                            if($element->type == SiteManagementSliderElem::TYPE_IMG){
                                echo $this->render('_item_imageBS4', ['element' => $element, 'active' => $active]);
                            } else {
                                echo $this->render('_item_videoBS4', ['element' => $element, 'active' => $active, 'optionsVideo' => $optionsVideo]);
                            }
                            $i++;
                        }
    ?>
  </div>
<?php endif;

