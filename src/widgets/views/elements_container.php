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
 * @var $elements array
 */
?>
<?php
$isMasonry = 1;
if(!empty($container)){
    $isMasonry = $container->is_masonry;
}
?>

    <div class="<?= $isMasonry ? 'grid' : ''?> <?= !empty($options['class']) ? $options['class'] : ''?>" <?= !empty($options['id']) ? "id='".$options['id']."'" : ''?>>
        <?php if($isMasonry){ ?>
            <div class="grid-sizer"></div>
            <div class="gutter-sizer"></div>
        <?php } ?>
        <?php
        /** @var  $element \amos\sitemanagement\models\SiteManagementElement*/
        foreach ($elements as $element){
            if(!empty($template)){
                $widgetsValues = \amos\sitemanagement\widgets\SMContainerWidget::getWidgetExampleValuesFromTemplate($template);
                $view_path = $template->view_path;
            } else {
                $widgetsValues = \amos\sitemanagement\widgets\SMContainerWidget::getWidgetValuesFromElement($element);
                $view_path = $element->siteManagementTemplate->view_path;
            }
            ?>
            <div class="<?= $isMasonry ? 'grid-item' : 'col-md-'.(12/$container->num_columns) . ' ' . 'col-xs-12 item-no-masonry'?>">
                <div class="wrap-item-sitemanagement">
                    <?php echo $this->render($view_path, ['element' => $element, 'widgetsValues' => $widgetsValues])?>
                </div>
            </div>
        <?php } ?>
    </div>