<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    amos\sitemanagement\controllers\base
 * @category   CategoryName
 */

namespace amos\sitemanagement\controllers\base;

use amos\sitemanagement\models\search\SiteManagementContainerSearch;
use amos\sitemanagement\models\SiteManagementContainer;
use amos\sitemanagement\Module;
use amos\sitemanagement\widgets\icons\WidgetIconSiteManagementContainerFather;
use open20\amos\core\controllers\CrudController;
use open20\amos\core\helpers\Html;
use open20\amos\core\icons\AmosIcons;
use open20\amos\dashboard\controllers\TabDashboardControllerTrait;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

/**
 * Class SiteManagementContainerController
 * SiteManagementContainerController implements the CRUD actions for SiteManagementContainer model.
 *
 * @property \amos\sitemanagement\models\SiteManagementContainer $model
 * @property \amos\sitemanagement\models\search\SiteManagementContainerSearch $modelSearch
 *
 * @package amos\sitemanagement\controllers\base
 */
class SiteManagementContainerController extends CrudController
{
    /**
     * Trait used for initialize the tab dashboard
     */
    use TabDashboardControllerTrait;

    public $module;
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setModelObj(new SiteManagementContainer());
        $this->setModelSearch(new SiteManagementContainerSearch());

        $this->viewGrid = [
            'name' => 'grid',
            'label' => AmosIcons::show('view-list-alt') . Html::tag('p', Module::tHtml('amoscore', 'Table')),
            'url' => '?currentView=grid'
        ];

        $this->setAvailableViews([
            'grid' => $this->viewGrid
        ]);

        parent::init();
        $this->module = \Yii::$app->getModule('sitemanagement');
        $this->layout = 'main';
        $this->setUpLayout();
    }

    /**
     * Used for set page title and breadcrumbs.
     * @param string $pageTitle
     */
    public function setTitleAndBreadcrumbs($pageTitle)
    {
        Yii::$app->view->title = $pageTitle;
        Yii::$app->view->params['breadcrumbs'] = [
            ['label' => $pageTitle]
        ];
    }

    /**
     * Set a view param used in \open20\amos\core\forms\CreateNewButtonWidget
     */
    private function setCreateNewBtnLabel()
    {
        Yii::$app->view->params['createNewBtnParams'] = [
            'createNewBtnLabel' => Module::t('amossitemanagement', 'Add container')
        ];
    }

    /**
     * This method is useful to set all idea params for all list views.
     */
    protected function setListViewsParams($setCurrentDashboard = true)
    {
        $this->setCreateNewBtnLabel();
        $this->setUpLayout('list');
        if ($setCurrentDashboard) {
            $this->view->params['currentDashboard'] = $this->getCurrentDashboard();
            $this->child_of = WidgetIconSiteManagementContainerFather::className();

        }
        Yii::$app->session->set(Module::beginCreateNewSessionKey(), Url::previous());
        Yii::$app->session->set(Module::beginCreateNewSessionKeyDateTime(), date('Y-m-d H:i:s'));
    }

    /**
     * This method returns the close url for close button in action view.
     * @return string
     */
    public function getViewCloseUrl()
    {
        return Yii::$app->session->get(Module::beginCreateNewSessionKey());
    }

    /**
     * Lists all models.
     * @param string|null $layout
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionIndex($layout = NULL)
    {
        Url::remember();
        $this->setDataProvider($this->getModelSearch()->search(Yii::$app->request->getQueryParams()));
        $this->setTitleAndBreadcrumbs(Module::t('amossitemanagement', 'Containers'));
        $this->setListViewsParams();
        if (!is_null($layout)) {
            $this->layout = $layout;
        }
        return parent::actionIndex();
    }

    /**
     * Displays a single model.
     * @param integer $id
     * @return string|\yii\web\Response
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionView($id)
    {
        Url::remember();

        $this->model = $this->findModel($id);

        if ($this->model->load(Yii::$app->request->post()) && $this->model->save()) {
            return $this->redirect(['view', 'id' => $this->model->id]);
        } else {
            return $this->render('view', ['model' => $this->model]);
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->setUpLayout('form');

        $this->model = new SiteManagementContainer();

        if($this->module->enableFixedContainers){
            $this->model->scenario = SiteManagementContainer::SCENARIO_FIXED_CONTAINER;
        }
        if ($this->model->load(Yii::$app->request->post()) && $this->model->validate()) {
            if ($this->model->save()) {
                Yii::$app->getSession()->addFlash('success', Module::t('amoscore', 'Element successfully created.'));
                return $this->redirect(['update', 'id' => $this->model->id]);
            } else {
                Yii::$app->getSession()->addFlash('danger', Module::t('amoscore', 'Element not created, check the data entered.'));
            }
        }

        return $this->render('create', [
            'model' => $this->model,
        ]);
    }

    /**
     * Updates an existing model.
     * If update is successful, the browser will be redirected to the 'list' page.
     * @param integer $id
     * @return string|\yii\web\Response
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        Url::remember();
        $this->setUpLayout('form');

        $this->model = $this->findModel($id);
        if($this->module->enableFixedContainers){
            $this->model->scenario = SiteManagementContainer::SCENARIO_FIXED_CONTAINER;
        }

        $dataProviderElements = new ActiveDataProvider([
            'query' => $this->model->getSiteManagementContainerElementMms()->orderBy('elem_order')
        ]);

        if ($this->model->load(Yii::$app->request->post()) && $this->model->validate()) {
            if ($this->model->save()) {
                Yii::$app->getSession()->addFlash('success', Module::t('amoscore', 'Element successfully updated.'));
                return $this->redirect(['update', 'id' => $this->model->id]);
            } else {
                Yii::$app->getSession()->addFlash('danger', Module::t('amoscore', 'Element not updated, check the data entered.'));
            }
        }

        return $this->render('update', [
            'model' => $this->model,
            'dataProviderElements' => $dataProviderElements
        ]);
    }

    /**
     * Deletes an existing model.
     * If deletion is successful, the browser will be redirected to the previous list page.
     * @param int $id
     * @return \yii\web\Response
     * @throws \yii\db\StaleObjectException
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $this->model = $this->findModel($id);
        if ($this->model) {
            $this->model->delete();
            if (!$this->model->hasErrors()) {
                Yii::$app->getSession()->addFlash('success', Module::t('amoscore', 'Element deleted successfully.'));
            } else {
                Yii::$app->getSession()->addFlash('danger', Module::t('amoscore', 'You are not authorized to delete this element.'));
            }
        } else {
            Yii::$app->getSession()->addFlash('danger', Module::tHtml('amoscore', 'Element not found.'));
        }
        return $this->redirect(Yii::$app->session->get(Module::beginCreateNewSessionKey()));
    }
}
