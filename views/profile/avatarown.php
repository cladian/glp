<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = 'Actualización de Perfil: ' . ' ' . $model->name;

?>



    <?= $this->render('_avatar', [
        'model' => $model,
        'file'=>$model->photo,
    ]) ?>

</div>

  </div>
</div>
