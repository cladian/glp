<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model yii\web\IdentityInterface */


?>
<div class="breadcrumb">

    <?= Html::a(Yii::t('rbac-admin', 'Regresar'), ['index'], ['class' => 'btn btn-default glyphicon glyphicon-menu-left']) ?>
    <!-- <!-- AYUDA-->
    <?php
    /*    Modal::begin([
            'header' => '<h4>Inscripción</h4>',
            'toggleButton' => ['label' => \Yii::$app->params['btnHelp'], 'class' => 'btn btn-default pull-right'],
        ]);

        echo $this->render('/help/inscription-index');
        Modal::end();
        */
    ?>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">Asignaciones</div>
    <div class="panel-body">
        <div class="assignment-index">

            <h1><?= Yii::t('rbac-admin', 'User') ?>: <?= Html::encode($model->{$usernameField}) ?></h1>

            <div class="col-lg-5">
                <?= Yii::t('rbac-admin', 'Avaliable') ?>:
                <?php
                echo Html::textInput('search_av', '', ['class' => 'role-search', 'data-target' => 'avaliable']) . '<br>';
                echo Html::listBox('roles', '', $avaliable, [
                    'id' => 'avaliable',
                    'multiple' => true,
                    'size' => 20,
                    'style' => 'width:100%']);
                ?>
            </div>
            <div class="col-lg-1">
                &nbsp;<br><br>
                <?php
                echo Html::a('>>', '#', ['class' => 'btn btn-success', 'data-action' => 'assign']) . '<br>';
                echo Html::a('<<', '#', ['class' => 'btn btn-success', 'data-action' => 'delete']) . '<br>';
                ?>
            </div>
            <div class="col-lg-5">
                <?= Yii::t('rbac-admin', 'Assigned') ?>:
                <?php
                echo Html::textInput('search_asgn', '', ['class' => 'role-search', 'data-target' => 'assigned']) . '<br>';
                echo Html::listBox('roles', '', $assigned, [
                    'id' => 'assigned',
                    'multiple' => true,
                    'size' => 20,
                    'style' => 'width:100%']);
                ?>
            </div>

            <?php
            $this->render('_script', ['id' => $model->{$idField}]);
            ?>

        </div>
    </div>
</div>