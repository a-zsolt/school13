

<?php if ($submitted): ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 border-success">
                <div class="card ">
                    <div class="card-body bg-success-subtle">
                        <form action="?page=add" method="POST" class="needs-validation" novalidate>
                            
                            <div class="mb-3">
                                <label for="title" class="form-label">Cím</label>
                                <p name="title"><?= $_POST['title'] ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="performer" class="form-label">Előadó</label>
                                <p name="preformer"><?= $_POST['performer'] ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="album" class="form-label">Album</label>
                                <p name="album"><?= $_POST['album'] ?></p>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="length" class="form-label">Hossz (mp)</label>
                                    <p name="length"><?= $_POST['length'] ?></p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="genre" class="form-label">Műfaj</label>
                                    <p name="genre"><?= $_POST['genre'] ?></p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="year" class="form-label">Megjelenés éve</label>
                                <p name="year"><?= $_POST['year'] ?></p>
                            </div>

                            <div class="d-grid gap-2">
                                <a href="?page=playlist" class="btn btn-primary btn-lg">
                                    <i class="bi bi-plus-circle"></i> Lejátszási lista
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else: ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form action="?page=add" method="POST" class="needs-validation" novalidate>
                            
                            <div class="mb-3">
                                <label for="title" class="form-label">Cím <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" required>
                                <div class="invalid-feedback">
                                    Kérlek add meg a dal címét!
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="performer" class="form-label">Előadó <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="performer" name="performer" required>
                                <div class="invalid-feedback">
                                    Kérlek add meg az előadót!
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="album" class="form-label">Album <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="album" name="album" required>
                                <div class="invalid-feedback">
                                    Kérlek add meg az album címét!
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="length" class="form-label">Hossz (mp) <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="length" name="length" min="1" required>
                                    <div class="invalid-feedback">
                                        Kérlek add meg a dal hosszát másodpercben!
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="genre" class="form-label">Műfaj <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="genre" id="genre">
                                    <div class="invalid-feedback">
                                        Kérlek válassz egy műfajt!
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="year" class="form-label">Megjelenés éve <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="year" name="year" min="1900" max="2025" required>
                                <div class="invalid-feedback">
                                    Kérlek add meg a megjelenés évét (1900-2025)!
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-plus-circle"></i> Zene Hozzáadása
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if ($error): ?>
        <div class="alert alert-danger d-flex align-content-center justify-content-center col-2" role="alert">
            <span class="material-symbols-rounded">error</span>
            Minimum minden mezőben kell lennie 3 karakternek!
        </div>
    <?php endif; ?>

<?php endif; ?>