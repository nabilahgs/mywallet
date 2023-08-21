<main class="container">
    <?= $this->session->flashdata('message') ?>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Note the Income</h5>
                    <hr>
                    <form id="formAuthentication" method="POST" action="<?= base_url('process/add_income') ?>">
                        <div class="row mb-3">
                            <div class="col-6">
                                <select class="form-select" id="id_account" name="id_account">
                                    <option selected disabled>-Select Account-</option>
                                    <?php foreach ($acc as $a) : ?>
                                        <option value="<?= $a->id_account ?>"><?= $a->account_name ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <input required type="number" class="form-control" placeholder="Enter nominal..." id="nominal" name="nominal">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-5">
                                <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description"></textarea>
                            </div>
                            <div class="col-5">
                                <input required type="date" class="form-control" id="date_spends" name="date_spends">
                            </div>
                            <div class="col" style="text-align: right;">
                                <button type="submit" class="btn btn-outline-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">The Incomes</h5>
                    <hr>
                    <?php foreach ($income as $s) : ?>
                        <div class="row">
                            <div class="col-3">
                                <p class="card-text mb-1"><?= $s->date ?></p>
                            </div>
                            <div class="col">
                                <p class="card-text mb-1"><?= $s->description ?></p>
                            </div>
                            <div class="col-2" style="text-align: end;">
                                <p class="card-text mb-1 text-success">+ Rp.</p>
                            </div>
                            <div class="col text-right text-success" style="text-align: end;">
                                <p class="card-text mb-1"><?= format_rupiah($s->nominal) ?></p>
                            </div>
                            <div class="col-1" style="text-align: right;">
                                <a type="submit" class="text-info" style="font-size: 17px;" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $s->id_income ?>">
                                    ✎
                                </a>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?= $s->id_income ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit income</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <form id="formAuthentication" method="POST" action="<?= base_url('process/update_income') ?>">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <input type="text" hidden class="form-control" value="<?= $s->id_income ?>" id="id_income" name="id_income">
                                                        <input type="text" class="form-control" value="<?= $s->nominal ?>" id="nominal" name="nominal">
                                                    </div>
                                                    <div class="col-1" style="text-align: right;">
                                                        <button type="submit" class="btn btn-outline-primary">Edit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1" style="text-align: right;">
                                <a type="submit"><?php echo anchor(
                                                        'process/delete_income/' . $s->id_income,
                                                        '<i class="fa-solid fa-trash text-danger"></i>',
                                                        array('onclick' => "return confirm('Are you sure to delete this income?');")
                                                    ) ?></a>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
</main>