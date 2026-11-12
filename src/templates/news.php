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

?>

<div class="wrap-evidence">
    <div class="box">
        <h1><?= !empty($widgetsValues['title']) ? $widgetsValues['title'] : '' ?></h1>
        <p class="code"><?= !empty($widgetsValues['data']) ? $widgetsValues['data'] : '' ?></p>
        <img class="img-responsive image-evidence"
             src="<?= !empty($widgetsValues['image']) ? $widgetsValues['image'] : '' ?>"
             alt="<?= !empty($widgetsValues['title']) ? $widgetsValues['title'] : '' ?>">
    </div>
    <div class="wrap-item-description">
        <div class="title"><?= Module::t('amossitemanagement', 'NEWS') ?></div>
        <p><?= !empty($widgetsValues['description']) ? $widgetsValues['description'] : '' ?></p>
        <a href="<?= !empty($widgetsValues['link_forward']) ? $widgetsValues['link_forward'] : '' ?>"
           title="<?= Module::t('amossitemanagement', '#go_details') ?>">
            <span class="glyphicon glyphicon-chevron-right"></span><span
                    class="sr-only"><?= Module::tHtml('amossitremanagement', '#go_details') ?></span></a>
    </div>
</div>