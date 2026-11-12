<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   amos\sitemanagement\models
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

namespace amos\sitemanagement\models;

use amos\sitemanagement\i18n\grammar\PageContentGrammar;
use open20\amos\core\interfaces\ModelLabelsInterface;
use open20\amos\core\interfaces\ViewModelInterface;
use yii\helpers\Url;

/**
 * Class PageContent
 * This is the model class for table "site_management_page_content".
 * @package amos\sitemanagement\models
 */
class PageContent extends \amos\sitemanagement\models\base\PageContent implements ViewModelInterface, ModelLabelsInterface
{
    /**
     * @inheritdoc
     */
    public function representingColumn()
    {
        return [
            'title'
        ];
    }

    /**
     * Return the columns to show as default in GridViewWidget
     * @return array
     */
    public function getGridViewColumns()
    {
        return [
            'title',
            'section.name',
            [
                'class' => 'open20\amos\core\views\grid\ActionColumn'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function getViewUrl()
    {
        return "sitemanagement/page-content/view";
    }

    /**
     * @inheritdoc
     */
    public function getFullViewUrl()
    {
        return Url::toRoute(["/" . $this->getViewUrl(), "id" => $this->id]);
    }

    /**
     * @return mixed
     */
    public function getGrammar()
    {
        return new PageContentGrammar();
    }
}
