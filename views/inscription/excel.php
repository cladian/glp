<table>
    <thead>
    <tr>
        <th colspan="1" style="background-color: #4eb305;"><b>Evento</b></th>
        <th colspan="10" style="background-color: #70c0b1;"><b>Perfil</b></th>
        <th  colspan="18" style="background-color: yellow;"><b>Inscripción</b></th>
    </tr>
    <tr>



        <th>Nombre</th>
        <th>Nombre del Participante</th>
        <th>Institución</th>
        <th>Tipo de institución</th>
        <th>Cargo</th>
        <th>Categoría del actor</th>
        <th>Género (M/F)</th>
        <th>Teléfono fijo</th>
        <th>Teléfono Celular</th>
        <th>Correo electrónico</th>
        <th>País</th>

            <th>Id</th>
            <th>Avance %</th>
            <th>Fecha de Inscripción</th>
            <th>Tipo de Registro</th>
            <th>Tipo de Asignación</th>

            <th>Presentará exposición</th>
            <th>Ciudad de Proveniencia</th>
            <th>Aerolinea de llegada</th>
            <th># Vuelo de llegada</th>
            <th>Fecha de arribo</th>
            <th>Hora de arribo</th>

            <th>Aerolinea de salida</th>
            <th># Vuelo de salida</th>
            <th>Fecha de salida</th>
            <th>Hora de salida</th>

            <th>Dia de Ingreso al Hotel del Evento</th>
            <th>Dia de Salida al Hotel del Evento</th>
            <th>Reside en el lugar del evento</th>
            <th>Observación</th>

    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($model as $inscription):?>
    <tr>
        <td><?= $inscription->event->name ?></td>
        <td><?= $inscription->user->profiles->name.' '.$inscription->user->profiles->lastname ?></td>
        <td><?= $inscription->user->profiles->institution_name ?></td>
        <td><?= $inscription->user->profiles->institutiontype->name ?></td>
        <td><?= $inscription->user->profiles->responsability_name ?></td>
        <td><?= $inscription->user->profiles->responsibilitytype->name ?></td>
        <td><?= $inscription->user->profiles->gender ?></td>
        <td><?= $inscription->user->profiles->phone_number ?></td>
        <td><?= $inscription->user->profiles->mobile_number ?></td>
        <td><?= $inscription->user->email ?></td>
        <td><?= $inscription->user->profiles->country->name ?></td>

        <td><?= $inscription->id ?></td>
        <td><?= $inscription->complete ?></td>
        <td><?= $inscription->created_at  ?></td>
        <td><?= $inscription->registertypeType->name?></td>
        <td><?= $inscription->registertypeAssigment->name?></td>

        <td><?= $inscription->exposition? "SI":"NO" ?></td>
        <td><?= $inscription->logistic->leavingonorigincity ?></td>
        <td><?= $inscription->logistic->leavingonairline ?></td>
        <td><?= $inscription->logistic->leavingonflightnumber ?></td>
        <td><?= $inscription->logistic->leavingondate ?></td>
        <td><?= $inscription->logistic->leavingonhour ?></td>

        <td><?= $inscription->logistic->returningonairline ?></td>
        <td><?= $inscription->logistic->returningonflightnumber ?></td>
        <td><?= $inscription->logistic->returningondate ?></td>
        <td><?= $inscription->logistic->returningonhour ?></td>

        <td><?= $inscription->logistic->accommodationdatein ?></td>
        <td><?= $inscription->logistic->accommodationdateout ?></td>

        <td><?= $inscription->logistic->residence? "SI":"NO" ?></td>
        <td><?= $inscription->logistic->residenceobs ?></td>

    </tr>
    <?php endforeach; ?>

    </tbody>
</table>