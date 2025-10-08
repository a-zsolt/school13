
<?php
// var_dump($sightings);
?>
<form class="row" method="GET">
    <div class="col-5">
        <div class="input-group">
            <label class="input-group-text" for="reporterName">Név:</label>
            <input class="form-control" type="text" name="query" id="query">
            <input type="hidden" value="list" name="page" id="page">
            <input class="btn btn-primary" type="submit" value="Szűrés">
        </div>
    </div>
</form>
<!-- <form class="row" method="GET">
    <div class="col-5">
        <div class="input-group">
            <input type="hidden" value="list" name="page" id="page">
            <input type="hidden" name="query">
            <input class="btn btn-primary" type="submit" value="Szűrés Törlése">
        </div>
    </div>
</form> -->
<table class="table table-hover">
    <thead>
        <th scope="col">ID</th>
        <th scope="col">Bejelentő</th>
        <th scope="col">Hely</th>
        <th scope="col">Leírás</th>
        <th scope="col">Idő</th>    
        <th scope="col">Műveletek</th>    
    </thead>
    <tbody>
        <?php foreach ($filtered_sightings as $key => $sighting): ?>
            <tr>
                <th scope="col"><?= $sighting["id"] ?></th>
                <td><?= $sighting["reporter"]["name"] ?> (<?= $sighting["reporter"]["age"] ?>)</td>
                <td><?= $sighting["location"] ?></td>
                <td><?= $sighting["description"] ?></td>
                <td><?= $sighting["datetime"] ?></td>
                <td><input class="btn btn-primary" type="button" value="Megnyitás"></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>