<?php include __DIR__ . '/../layout/header.php'; ?>


    <h2>Számla Kivétel</h2>

    <div class="card" style="max-width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $account->getOwnerName() ?></h5>
            <p class="card-text"><?= $account->getAccountNumber() ?></p>
        </div>
        <ul class="list-group list-group-flush">
            <form method="POST">
                <li class="list-group-item">
                    <input class="form-control" type="number" name="amount" value="0">
                </li>
                <div class="d-flex justify-content-end p-2">
                    <button type="submit" class="btn btn-primary">Kivétel</button>
                </div>
            </form>
        </ul>
    </div>


<?php include __DIR__ . '/../layout/footer.php'; ?>