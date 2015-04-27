<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = 'Crear Perfil';

?>
<?php
foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
    //echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
    echo '<div class="alert alert-' . $key . '" role="alert">
                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  ' . $message . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
             </div>';
}
?>

      <?= $this->render('_formown', [
        'model' => $model,
    ]) ?>
