<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
<?php $this->head() ?>
    </head>
    <body>
            <?php $this->beginBody() ?>
        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'My Company',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            //Menu po lewej stronie
            $menuItems = [
                ['label' => 'Frontend', 'url' => \yii\helpers\Url::to('frontend/web', TRUE)],
            ];
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => $menuItems,
            ]);

            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'CRUD', 'items' => [
                        ['label' => 'Business profile', 'url' => ['/crud/business-profile/index']],
                        ['label' => 'Category', 'url' => ['/crud/category/index']],
                        ['label' => 'Employee', 'url' => ['/crud/employee/index']],
                        ['label' => 'Employee Skill', 'url' => ['/crud/employee-skill/index']],
                        ['label' => 'Employee Role', 'url' => ['/crud/employee-role/index']],
                        ['label' => 'Location', 'url' => ['/crud/location/index']],
                        ['label' => 'Skill', 'url' => ['/crud/skill/index']],
                        ['label' => 'Skill Level', 'url' => ['/crud/skill-level/index']],
                        ['label' => 'User', 'url' => ['/crud/user/index']],

                    ]
                ];
                $menuItems[] = [
                    'label' => 'Logout ('.Yii::$app->user->identity->username.')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs']
                            : [],
                ])
                ?>
<?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
