<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
                'brandLabel' => 'ASOCAM-GLP',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            $items=[

                ['label' => 'Inicio', 'url' => ['/site/index']],
                ['label' => 'Paneles', 'items' => [
                        ['label' => 'User', 'url' => ['/site/admuser']],
                        ['label' => 'Asocam', 'url' => ['/site/admasocam']],
                        ['label' => 'SIS-Admin', 'url' => ['#']],
                    ]
                ],

                // ['label' => 'Acerca de ', 'url' => ['/site/about']],
                ['label' => 'Perfil', 'items' => [
                    ['label' => 'User', 'url' => ['/user']],
                    ['label' => 'Perfiles', 'url' => ['/profile']],

                    ]
                ],

//                ['label' => 'Evento', 'url' => ['/event']],

                ['label' => 'Evento','items' => [
                    ['label' => 'Eventos', 'url' => ['/event']],
                    ['label' => 'Respuesta', 'url' => ['/answer']],
                    ['label' => 'Respuesta por evento', 'url' => ['/eventanswer']],
                    ['label' => 'Pregunta General', 'url' => ['/generalquestion']],
                ]
                ],

                ['label' => 'Preguntas', 'url' => ['/question']],
                ['label' => 'Inscripción', 'url' => ['/inscription']],
                ['label' => 'Logistica', 'url' => ['/logistic']],
//                ['label' => 'Registrarse', 'url' => ['/site/about']],



                ['label' => 'Catálogo', 'items' => [
                    ['label' => 'Responsabilidad', 'url' => ['/responsibilitytype']],
                    ['label' => 'Institución', 'url' => ['/institutiontype']],
                    ['label' => 'Pais', 'url' => ['/country']],
                    ['label' => 'Tipos Eventos', 'url' => ['/eventtype']],
                    ['label' => 'Preguntas por Evento', 'url' => ['/eventquestion']],
                    ['label' => 'Tipo de Registro', 'url' => ['/registertype']],
                ]
                ],
                ['label' => 'Registro', 'url' => ['/site/signup'],'visible' => [Yii::$app->user->isGuest]],
                Yii::$app->user->isGuest ?
                    ['label' => 'Ingresar', 'url' => ['/site/login']] :
                    ['label' => 'Salir (' . Yii::$app->user->identity->username . '-'. Yii::$app->user->identity->id.')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']],
            ];

            if (Yii::$app->user->can('permission_admin'))
                $items[]=    ['label' => 'Roles', 'items' => [
                    ['label' => 'Asignaciones', 'url' => ['/admin']],
                    ['label' => 'Roles', 'url' => ['/admin/role']],
                    ['label' => 'Permisos', 'url' => ['/admin/permission']],

                ]
                ];

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $items,
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
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
