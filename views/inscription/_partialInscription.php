<?php
use yii\helpers\Html;
?>

        <address>
            <!--                <strong>--><? //= $model->leavingonorigincity ?><!--</strong><br>-->
            <strong>¿Realizará una esposición en el evento?: </strong><?=( $model->exposition? ('SI'): ('NO')); ?><br>
            <strong>¿Esta de acuerdo con los términos de servicio de ASOCAM?: </strong><?=( $model->service_terms? ('SI'): ('NO')); ?><br>
            <strong>Tipo de registro: </strong><?= $model->registertypeType->name ?><br>
            <strong>Tipo de Asignación: </strong><?= $model->registertypeAssigment->name ?>
        </address>
        <?/*= Html::a('Eliminar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) */
        ?>