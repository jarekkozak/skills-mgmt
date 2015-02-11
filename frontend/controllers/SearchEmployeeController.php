<?php

namespace frontend\controllers;

use common\models\SkillLevel;
use frontend\models\EmployeeSearchExt;
use frontend\models\SkillSearchExt;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Controller;

class SearchEmployeeController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['by-skill', 'index', 'all-employees'],
                'rules' => [
                    [
                        'actions' => ['by-skill', 'index', 'all-employees'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionBySkill() {
        Yii::$app->session->set('profileBackUrl', Yii::$app->request->getAbsoluteUrl());

        $skillSearch = new SkillSearchExt();
        $categories = $skillSearch->allWithCategories();

        $params = Yii::$app->request->getQueryParams();

        $employeeSearch = new EmployeeSearchExt();
        $employees = $employeeSearch->searchBySkills($params);

        return $this->render('by-skill', ['categories' => $categories,
                    'skillsList' => ArrayHelper::getValue($params, 'skills_list', []),
                    'searchModel' => $employeeSearch,
                    'dataProvider' => $employees,
                    'skillLevels' => SkillLevel::find()->asArray()->all()]);
    }

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionAllEmployees() {
        Yii::$app->session->set('profileBackUrl', Yii::$app->request->getAbsoluteUrl());

        $searchModel = new EmployeeSearchExt();
        $dataProvider = $searchModel->searchAll(Yii::$app->request->getQueryParams());

        return $this->render('all-employees', ['searchModel' => $searchModel,
                    'dataProvider' => $dataProvider]);
    }

}