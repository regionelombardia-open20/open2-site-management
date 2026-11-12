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
 * Created by PhpStorm.
 * User: michele.lafrancesca
 * Date: 04/09/2018
 * Time: 16:42
 */

namespace amos\sitemanagement\models;


use yii\base\Model;

class SiteManagmentLandingRoutes extends Model
{
    public $whiteListModuleRoutes;
    public $blackListModuleRoutes;


    public function init()
    {
        $module = \Yii::$app->getModule('sitemanagement');
        if($module){
            $this->whiteListModuleRoutes = $module->whiteListModuleRoutes;
            $this->blackListModuleRoutes = $module->blackListModuleRoutes;
        }
        parent::init(); //
    }

    /**
     * @return array
     */
    public function getRoutes(){
        $route = new \mdm\admin\models\Route();
        $modules = \Yii::$app->getModules();
        $rotte = [];
        foreach ($modules as $key => $value) {
            if((!empty($this->whiteListModuleRoutes ) && in_array($key, $this->whiteListModuleRoutes)) || empty($this->whiteListModuleRoutes ) && !in_array($key, $this->blackListModuleRoutes)) {
                $rotte = array_merge($rotte, $route->getAppRoutes($key));
            }
        }
        $Rotte = [];
        foreach ($rotte as $rotta) {
            if (!strpos($rotta, '*')) {
                $Rotte[$rotta] = $rotta;
            } else if (strpos($rotta, '*')) {
                $rotta = str_replace('/*', '', $rotta);
                $Rotte[$rotta] = $rotta;
            }
        }


        return $Rotte;
    }

}