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

$js = <<<JS
    $('#btn-search').click(function(e){
        e.preventDefault();
        var a = $('.search-div input').serialize();
        $.pjax.reload( {container: "#container-pjax", url: window.location.href+"&"+a  , timeout: 20000}).done(
            function(){
                    var selected_radio =$('input[type=radio]:checked');
                    $(selected_radio)
                    .parents('tr')
                    .addClass('success');
            });
    });
 $('#btn-search-cancel').click(function(e){
        e.preventDefault();
        $('.search-div input').val('');
        var a = $('.search-div input').serialize();
        $.pjax.reload( {container: "#container-pjax", url: window.location.href+"&"+a  , timeout: 20000}).done(
            function(){
                    var selected_radio =$('input[type=radio]:checked');
                    $(selected_radio)
                    .parents('tr')
                    .addClass('success');
            });
    });
 
 $('.search-div input').keypress(function(e){

    if(e.keyCode == 13)
    {
        e.preventDefault();
        var a = $('.search-div input').serialize();
        $.pjax.reload( {container: "#container-pjax", url: window.location.href+"&"+a  , timeout: 20000}).done(
            function(){
                    var selected_radio =$('input[type=radio]:checked');
                    $(selected_radio)
                    .parents('tr')
                    .addClass('success');
            });
    }
    });
JS;
$this->registerJs($js);
?>
<div class="container-change-view ">
    <div class="btn-tools-container">
        <div class="tools-right">
            <?= \open20\amos\core\icons\AmosIcons::show('search', [
                'class' => 'btn btn-tools-primary show-hide-element',
                'data-toggle-element' => 'form-search'
            ]);?>
        </div>

    </div>
</div>

<div class="search-div element-to-toggle"  data-toggle-element="form-search">
<?php foreach ($contentModelSearch->searchFieldsLike() as $searchField){ ?>
    <div class="col-lg-6 col-xs-12">
        <?= $form->field($contentModelSearch, $searchField)->textInput() ?>
    </div>
<?php } ?>
    <div class="col-xs-12">
        <div class="pull-right">
            <?php echo \yii\helpers\Html::a('Annulla', '', ['id' => 'btn-search-cancel', 'class' => 'btn btn-secondary-primary'])?>

            <?php echo \yii\helpers\Html::a('search', '', ['id' => 'btn-search', 'class' => 'btn btn-navigation-primary'])?>
        </div>
    </div>
</div>
