<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Cím</th>
            <th scope="col">Előadó</th>
            <th scope="col">Album</th>
            <th scope="col">Hossz</th>
            <th scope="col">Műfaj</th>
            <th scope="col">Év</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($tracks as $track) {
                echo render_track_row($track);
            }
        ?>
    </tbody>
</table>