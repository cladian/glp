<table>
    <thead>
    <tr>
        <th colspan="10" style="background-color: #70c0b1;"><b>Perfil</b></th>
        <th  colspan="4" style="background-color: #00ad9c;"><b>Inscripcion</b></th>
    </tr>
    <tr>

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

        <th>12:Porcentaje de registro</th>
    </tr>
    </thead>
    <tbody>


    <?php foreach ($model as $inscription):?>
    <tr>

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
        <td><?= $inscription->complete ?></td>

        <td>00001</td>
        <td>Blue</td>
    </tr>
    <?php endforeach; ?>

    </tbody>
</table>