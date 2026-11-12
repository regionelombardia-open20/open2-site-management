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

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace amos\sitemanagement\widgets\graphics;

use amos\sitemanagement\Module;
use open20\amos\core\widget\WidgetGraphic;


class WidgetCommunityImagesSlider extends WidgetGraphic
{
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->setCode('COMMUNITY_IMAGES_SLIDER');
        $this->setLabel(Module::t('amossitemanagement', 'Slider immagini'));
        $this->setDescription(Module::t('amossitemanagement', 'Consente di visualizzare lo slider nella sezione widget grafici'));
    }

    /**
     * 
     * @return type
     */
    public function getHtml()
    {
        $viewToRender = 'community_images_slider';

        $moduleCwh = \Yii::$app->getModule('cwh');
        $communityId = null;
        if (isset($moduleCwh) && !empty($moduleCwh->getCwhScope())) {
            $scope = $moduleCwh->getCwhScope();
            if (isset($scope['community'])) {
                $communityId = $scope['community'];
            }
        }


        return $this->render($viewToRender, [
            'widget' => $this,
            'communityId' => $communityId,
        ]);
    }
}

