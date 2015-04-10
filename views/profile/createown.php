<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = 'Crear Perfil';

?>
<div class="regresar">
<?= Html::a(\Yii::$app->params['btnRegresar'],['/site/index'], ['class' => 'btn btn-default'])?>
</div>

      <?= $this->render('_formown', [
        'model' => $model,
    ]) ?>
  </div>
</div>