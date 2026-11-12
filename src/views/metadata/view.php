<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   amos\sitemanagement\views\metadata
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

use amos\sitemanagement\controllers\MetadataController;
use amos\sitemanagement\Module;
use open20\amos\core\forms\CloseButtonWidget;
use open20\amos\core\forms\ContextMenuWidget;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var amos\sitemanagement\models\Metadata $model
 */

$this->title = Module::t('amossitemanagement', 'Page Contents');
$this->params['breadcrumbs'][] = $this->title;

/** @var MetadataController $appController */
$appController = Yii::$app->controller;

?>
<div class="<?= Yii::$app->controller->id ?>-view col-xs-12">
    <div class="row">
        <div class="col-xs-12">
            <?= ContextMenuWidget::widget([
                'model' => $model,
                'actionModify' => '/sitemanagement/metadata/update?id=' . $model->id,
                'actionDelete' => '/sitemanagement/metadata/delete?id=' . $model->id
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'metadataType.type',
                    'key_value',
                    'content',
                ]
            ]) ?>
        </div>
    </div>
    <?= CloseButtonWidget::widget(['urlClose' => $appController->getViewCloseUrl()]) ?>
</div>
