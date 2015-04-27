<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Favorite Color</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($model as $inscription):?>
    <tr>
        <td><?= $inscription->id ?></td>
        <td>00001</td>
        <td>Blue</td>
    </tr>
    <?php endforeach; ?>

    </tbody>
</table>