<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;



/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
// Botón HOME todos tiene el botón
$items[] = ['label' => '<span class="glyphicon glyphicon-home"></span> Inicio', 'url' => ['/site/index']];
$items[] = ['label' => '<span class="glyphicon glyphicon-comment"></span> Foro', 'url' => ['/foro']];

// Botones solo para usuarios que no están logeados todavia
if (Yii::$app->user->isGuest) {
    $items[] = ['label' => '<span class="glyphicon glyphicon-user"></span> Registro', 'url' => ['/site/signup'], 'visible' => [Yii::$app->user->isGuest], 'class' => 'btn btn-success btn-md'];
    $items[] = ['label' => '<span class="glyphicon glyphicon-circle-arrow-right"></span> Ingresar', 'url' => ['/site/login'], 'visible' => [Yii::$app->user->isGuest]];
}

// Botones para usuario ASOCAM
if (Yii::$app->user->can('permission_admin')) {
    $items[] = ['label' => 'Evento', 'items' => [
            ['label' => 'Eventos', 'url' => ['/event']],
            ['label' => 'Respuesta', 'url' => ['/answer']],
            ['label' => 'Respuesta por evento', 'url' => ['/eventanswer']],
            ['label' => 'Pregunta por evento', 'url' => ['/eventquestion']],
            ['label' => 'Pregunta General', 'url' => ['/generalquestion']],
        ]];
    $items[] = ['label' => 'Foro', 'items' => [
        ['label' => 'Foros', 'url' => ['/phforum']],
        ['label' => 'Documentos', 'url' => ['/phforum-document']],
        ['label' => 'Videos', 'url' => ['/phforum-video']],
        ['label' => 'Imagen', 'url' => ['/phforum-imagen']],
        '<li class="divider"></li>',
        ['label' => 'Temas', 'url' => ['/topic']],
        ['label' => 'Documentos', 'url' => ['/topic-document']],
        ['label' => 'Videos', 'url' => ['/topic-video']],
        ['label' => 'Imagen', 'url' => ['/topic-imagen']],

        '<li class="divider"></li>',
        ['label' => 'Aportes', 'url' => ['/post']],
        ['label' => 'Documentos', 'url' => ['/post-document']],
        ['label' => 'Videos', 'url' => ['/post-video']],
        ['label' => 'Imagen', 'url' => ['/post-imagen']],

        '<li class="divider"></li>',
        ['label' => 'Comentarios', 'url' => ['/comment']],
        '<li class="divider"></li>',
        ['label' => 'Documentos', 'url' => ['/document']],
        ['label' => 'Video', 'url' => ['/video']],
        ['label' => 'Imagen', 'url' => ['/imagen']],
    ]
    ];

    $items[]=

        ['label' => 'Notificaciones', 'items' => [
            ['label' => 'Solicitudes', 'url' => ['/request']],
            ['label' => 'Respuestas', 'url' => ['/reply']],
            ['label' => 'Notificaciones', 'url' => ['/notification']],

        ]
        ];
    $items[]=['label' => 'Inscripción', 'url' => ['/inscription']];

    $items[]=    ['label' => 'Catálogos', 'items' => [
            ['label' => 'Responsabilidad', 'url' => ['/responsibilitytype']],
            ['label' => 'Institución', 'url' => ['/institutiontype']],
            '<li class="divider"></li>',
            ['label' => 'Pais', 'url' => ['/country']],
            ['label' => 'Tipos Eventos', 'url' => ['/eventtype']],
            ['label' => 'Tipo de Registro', 'url' => ['/registertype']],
            '<li class="divider"></li>',
            ['label' => 'Preguntas', 'url' => ['/question']],
            ['label' => 'Pregunta General', 'url' => ['/generalquestion']],
        ]
        ];

    if (Yii::$app->user->can('permission_admin'))
        $items[] = ['label' => 'Roles', 'items' => [
            ['label' => 'Asignaciones', 'url' => ['/admin']],
            ['label' => 'Roles', 'url' => ['/admin/role']],
            ['label' => 'Permisos', 'url' => ['/admin/pe
            rmission']],

        ]
        ];

}

//temporal
$temp = false;
if ($temp) {
    $items = [

        ['label' => 'Inicio', 'url' => ['/site/index'], 'class' => 'fa fa-user fa-fw'],
        /* ['label' => 'Paneles', 'items' => [
             ['label' => 'User', 'url' => ['/site/admuser']],
             ['label' => 'Asocam', 'url' => ['/site/admasocam']],
             ['label' => 'SIS-Admin', 'url' => ['#']],
         ]
         ],*/
        ['label' => 'Foro', 'url' => ['/foro']],

        ['label' => 'Foro', 'items' => [
            ['label' => 'Foros', 'url' => ['/phforum']],
            ['label' => 'Documentos', 'url' => ['/phforum-document']],
            ['label' => 'Videos', 'url' => ['/phforum-video']],
            ['label' => 'Imagen', 'url' => ['/phforum-imagen']],
            '<li class="divider"></li>',
            ['label' => 'Topicos', 'url' => ['/topic']],
            ['label' => 'Documentos', 'url' => ['/topic-document']],
            ['label' => 'Videos', 'url' => ['/topic-video']],
            ['label' => 'Imagen', 'url' => ['/topic-imagen']],

            '<li class="divider"></li>',
            ['label' => 'Post', 'url' => ['/post']],
            ['label' => 'Documentos', 'url' => ['/post-document']],
            ['label' => 'Videos', 'url' => ['/post-video']],
            ['label' => 'Imagen', 'url' => ['/post-imagen']],

            '<li class="divider"></li>',
            ['label' => 'Comentarios', 'url' => ['/comment']],
            '<li class="divider"></li>',
            ['label' => 'Documentos', 'url' => ['/document']],
            ['label' => 'Video', 'url' => ['/video']],
            ['label' => 'Imagen', 'url' => ['/imagen']],
        ]
        ],

        ['label' => 'Usuario', 'items' => [
            ['label' => 'Solicitudes', 'url' => ['/request/index']],
            ['label' => 'Notificaciones', 'url' => ['/notification/index']],
            ['label' => 'SIS-Admin', 'url' => ['#']],
        ]
        ],
        ['label' => 'Asocam', 'items' => [
            /*        ['label' => 'User', 'url' => ['/site/admuser']],
                    ['label' => 'Asocam', 'url' => ['/site/admasocam']],
                    ['label' => 'SIS-Admin', 'url' => ['#']],*/
            /*'<li class="divider"></li>',*/
            ['label' => 'Inscripción', 'url' => ['/inscription']],
            '<li class="divider"></li>',
            ['label' => 'User', 'url' => ['/user']],
            ['label' => 'Perfiles', 'url' => ['/profile']],
            '<li class="divider"></li>',
            ['label' => 'Eventos', 'url' => ['/event']],
            ['label' => 'Respuesta', 'url' => ['/answer']],
            ['label' => 'Respuesta por evento', 'url' => ['/eventanswer']],
            ['label' => 'Pregunta por evento', 'url' => ['/eventquestion']],
            ['label' => 'Pregunta General', 'url' => ['/generalquestion']],
            '<li class="divider"></li>',
            ['label' => 'Solicitudes', 'url' => ['/request']],
            ['label' => 'Respuestas', 'url' => ['/reply']],
            ['label' => 'Notificaciones', 'url' => ['/notification']],


        ]

        ],
        ['label' => 'Administrador', 'items' => [
//        ['label' => 'User', 'url' => ['/site/admuser']],
//        ['label' => 'Asocam', 'url' => ['/site/admasocam']],
//        ['label' => 'SIS-Admin', 'url' => ['#']],
            '<li class="divider"></li>',
            ['label' => 'Inscripción', 'url' => ['/inscription']],
            '<li class="divider"></li>',
            ['label' => 'User', 'url' => ['/user']],
            ['label' => 'Perfiles', 'url' => ['/profile']],
            '<li class="divider"></li>',
            ['label' => 'Eventos', 'url' => ['/event']],
            ['label' => 'Respuesta', 'url' => ['/answer']],
            ['label' => 'Respuesta por evento', 'url' => ['/eventanswer']],
            ['label' => 'Pregunta por evento', 'url' => ['/eventquestion']],
            ['label' => 'Pregunta General', 'url' => ['/generalquestion']],
            '<li class="divider"></li>',
            ['label' => 'Solicitudes', 'url' => ['/request']],
            ['label' => 'Respuestas', 'url' => ['/reply']],
            ['label' => 'Notificaciones', 'url' => ['/notification']],
            '<li class="divider"></li>',
            ['label' => 'Asignaciones', 'url' => ['/admin']],
            ['label' => 'Roles', 'url' => ['/admin/role']],
            ['label' => 'Permisos', 'url' => ['/admin/permission']],


        ]
        ],


        // ['label' => 'Acerca de ', 'url' => ['/site/about']],


//                ['label' => 'Evento', 'url' => ['/event']],


        //['label' => 'Logistica', 'url' => ['/logistic']],
//                ['label' => 'Registrarse', 'url' => ['/site/about']],


        ['label' => 'Catálogo', 'items' => [
            ['label' => 'Responsabilidad', 'url' => ['/responsibilitytype']],
            ['label' => 'Institución', 'url' => ['/institutiontype']],
            '<li class="divider"></li>',
            ['label' => 'Pais', 'url' => ['/country']],
            ['label' => 'Tipos Eventos', 'url' => ['/eventtype']],
            ['label' => 'Tipo de Registro', 'url' => ['/registertype']],
            '<li class="divider"></li>',
//            ['label' => 'Preguntas', 'url' => ['/question']],
            ['label' => 'Pregunta General', 'url' => ['/generalquestion']],
        ]
        ],
    ];
}


if (!Yii::$app->user->isGuest) {
    $items[] = ['label' => '<span class="glyphicon glyphicon-user"></span> ' . Yii::$app->user->identity->username, 'items' => [
        ['label' => ' Perfil', 'url' => ['/profile/viewown']],
        '<li class="divider"></li>',
        ['label' => 'Salir', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
    ]
    ];

}
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


    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => $items,
    ]);
    NavBar::end();

    ?>

    <div class="container">
        <?=
        Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
        
    </div>
</div>

<footer class="footer">
    <div class="container">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1">
                <?= Html::img('imgs/logos/asocam.png',['class' => 'img_footer']); ?>

            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-11">
                <p style="text-align:justify">ASOCAM es el Servicio de Gestión del Conocimiento para América Latina que apoya procesos de construcción colectiva de conocimientos, que permite compartir y avanzar en temas específicos, generando productos   de alta calidad y utilidad para los actores de desarrollo. Cuenta con metodologías probadas de trabajo para apoyar estos procesos y ha colaborado con  agencias de cooperación, proyectos, entidades públicas-privadas y organizaciones ciudadanas que promueven procesos de desarrollo. Los servicios de ASOCAM incluyen también asesorías específicas o de acompañamiento, intercambios de experiencias,  sistematización, redes, cursos de entrenamiento y facilitación de eventos. ASOCAM cuenta con un equipo especializado y con una red de consultores asociados a nivel de America Latina comprometidos con brindar servicios para fortalecer los procesos de desarrollo. Con Sede Regional en Ecuador y oficinas filiales en Perú, Nicaragua y Bolivia, ASOCAM garantiza una cobertura regional.</p>
            </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
