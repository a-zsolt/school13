
<form class="row" method="GET">
    <div class="col-5">
        <div class="input-group">
            <label class="input-group-text" for="reporterName">Szerző:</label>
            <input class="form-control" type="text" name="query" id="query">
            <input type="hidden" value="list" name="page" id="page">
            <input class="btn btn-primary" type="submit" value="Szűrés">
        </div>
    </div>
</form>
<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Cím</th>
        <th scope="col">Szerző</th>
        <th scope="col">Év</th>
        </tr>
  </thead>
  <tbody>
    <?php if(count($books) === 0): ?>
        <div class="alert alert-danger d-flex align-content-center justify-content-center col-2" role="alert">
            <span class="material-symbols-rounded">error</span>
            Nem található könyv!
        </div>
    <?php else: ?>
    <?php
        foreach ($books as $book){
            echo render_book_row($book);
        }
    ?>
    <?php endif; ?>
  </tbody>
</table>