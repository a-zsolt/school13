<div class="d-flex align-items-center">
    <span class="material-symbols-rounded fs-1">bookmark_add</span>
    <h2>Új könyv hozzáadása</h2>
</div>
<form method="POST">
    <div class="row mb-2">
        <div class="col-md-3">
            <label class="form-label" for="cim">Cím:</label>
            <input class="form-control" type="text" name="cim" id="cim">
        </div>
        <div class="col-md-3">
            <label class="form-label" for="szerzo">Szerző:</label>
            <input class="form-control" type="text" name="szerzo" id="szerzo">
        </div>
        <div class="col-md-1">
            <label class="form-label" for="cim">Év:</label>
            <input class="form-control" type="number" name="ev" id="ev">
        </div>
    </div>
    <div>
        <input class="btn btn-primary" type="submit" value="Hozzáadás">
    </div>
</form>