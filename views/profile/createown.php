<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = 'Crear Perfil';

?>


      <?= $this->render('_formown', [
        'model' => $model,
    ]) ?>
  </div>
</div>