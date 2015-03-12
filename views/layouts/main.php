<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
$items = [];
if (Yii::$app->user->isGuest) {
    $items = [

        ['label' => 'Inicio', 'url' => ['/site/index'], 'class' => 'fa fa-user fa-fw'],
        ['label' => 'Registro', 'url' => ['/site/signup'], 'visible' => [Yii::$app->user->isGuest]],
        ['label' => 'Ingresar', 'url' => ['/site/login'], 'visible' => [Yii::$app->user->isGuest]]
    ];
} elseif (Yii::$app->user->can('user')) {
    $items = [

        ['label' => 'Inicio', 'url' => ['/site/index'], 'class' => 'fa fa-user fa-fw'],
        ['label' => 'Notificaciones', 'items' => [
            ['label' => 'Solicitudes', 'url' => ['/request']],
            ['label' => 'Respuestas', 'url' => ['/reply']],
            ['label' => 'Notificaciones', 'url' => ['/notification']],

        ]
        ],


    ];


} elseif (Yii::$app->user->can('asocam')) {
    $items = [

        ['label' => 'Inicio', 'url' => ['/site/index'], 'class' => 'fa fa-user fa-fw'],

        ['label' => 'Evento', 'items' => [
            ['label' => 'Eventos', 'url' => ['/event']],
            ['label' => 'Respuesta', 'url' => ['/answer']],
            ['label' => 'Respuesta por evento', 'url' => ['/eventanswer']],
            ['label' => 'Pregunta por evento', 'url' => ['/eventquestion']],
            ['label' => 'Pregunta General', 'url' => ['/generalquestion']],
        ]
        ],

        ['label' => 'Notificaciones', 'items' => [
            ['label' => 'Solicitudes', 'url' => ['/request']],
            ['label' => 'Respuestas', 'url' => ['/reply']],
            ['label' => 'Notificaciones', 'url' => ['/notification']],

        ]
        ],
        ['label' => 'Inscripción', 'url' => ['/inscription']],

        ['label' => 'Catálogos', 'items' => [
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
        ],
    ];
    if (Yii::$app->user->can('permission_admin'))
        $items[] = ['label' => 'Roles', 'items' => [
            ['label' => 'Asignaciones', 'url' => ['/admin']],
            ['label' => 'Roles', 'url' => ['/admin/role']],
            ['label' => 'Permisos', 'url' => ['/admin/permission']],

        ]
        ];

} elseif (Yii::$app->user->can('permission_admin')) {
    $items = [

        ['label' => 'Inicio', 'url' => ['/site/index'], 'class' => 'fa fa-user fa-fw'],
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

        ['label' => 'Evento', 'items' => [
            ['label' => 'Eventos', 'url' => ['/event']],
            ['label' => 'Respuesta', 'url' => ['/answer']],
            ['label' => 'Respuesta por evento', 'url' => ['/eventanswer']],
            ['label' => 'Pregunta por evento', 'url' => ['/eventquestion']],
            ['label' => 'Pregunta General', 'url' => ['/generalquestion']],
        ]
        ],

        ['label' => 'Notificaciones', 'items' => [
            ['label' => 'Solicitudes', 'url' => ['/request']],
            ['label' => 'Respuestas', 'url' => ['/reply']],
            ['label' => 'Notificaciones', 'url' => ['/notification']],

        ]
        ],


        ['label' => 'Inscripción', 'url' => ['/inscription']],
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
            ['label' => 'Preguntas', 'url' => ['/question']],
            ['label' => 'Pregunta General', 'url' => ['/generalquestion']],
        ]
        ],
    ];
    if (Yii::$app->user->can('permission_admin'))
        $items[] = ['label' => 'Roles', 'items' => [
            ['label' => 'Asignaciones', 'url' => ['/admin']],
            ['label' => 'Roles', 'url' => ['/admin/role']],
            ['label' => 'Permisos', 'url' => ['/admin/permission']],

        ]
        ];

}
/*if (    (Yii::$app->user->can('permission_admin'))||(Yii::$app->user->can('user'))|| (Yii::$app->user->can('asocam'))  ){
    $items[] =['label' => Yii::$app->user->identity->username . '-' . Yii::$app->user->identity->id, 'items' => [
        ['label' => 'Perfil', 'url' => ['/profile/viewown']],
        ['label' => 'Salir', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
    ]
    ];

}*/


//temporal

$items = [

    ['label' => 'Inicio', 'url' => ['/site/index'], 'class' => 'fa fa-user fa-fw'],
    /* ['label' => 'Paneles', 'items' => [
         ['label' => 'User', 'url' => ['/site/admuser']],
         ['label' => 'Asocam', 'url' => ['/site/admasocam']],
         ['label' => 'SIS-Admin', 'url' => ['#']],
     ]
     ],*/


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
        ['label' => 'Document', 'url' => ['/document']],
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
        ['label' => 'Preguntas', 'url' => ['/question']],
        ['label' => 'Pregunta General', 'url' => ['/generalquestion']],
    ]
    ]
];


if (!Yii::$app->user->isGuest) {
    $items[] = ['label' => Yii::$app->user->identity->username . '-' . Yii::$app->user->identity->id, 'items' => [
        ['label' => 'Perfil', 'url' => ['/profile/viewown']],
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
        <p class="pull-left">&copy; ASOCAM<?= date('Y') ?>& CLADIAN</p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
