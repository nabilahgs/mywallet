<main class="container">
    <?= $this->session->flashdata('message') ?>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Set Budgeting</h5>
                    <hr>
                    <form id="formAuthentication" method="POST" action="<?= base_url('process/add_budgeting') ?>">
                        <div class="row">
                            <div class="col-5">
                                <select class="form-select" id="id_category" name="id_category">
                                    <option selected disabled>-Select Category-</option>
                                    <?php foreach ($cat as $c) : ?>
                                        <option value="<?= $c->id_category ?>"><?= $c->category_name ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-5">
                                <input required type="number" class="form-control" placeholder="Enter nominal..." id="nominal" name="nominal">
                            </div>
                            <div class="col-1" style="text-align: right;">
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
                    <h5 class="card-title">The Budget</h5>
                    <hr>
                    <?php foreach ($bud as $b) : ?>
                        <div class="row">
                            <div class="col">
                                <p class="card-text mb-1" style="font-weight: bold;"><?= $b->category_name ?></p>
                            </div>
                            <div class="col-2" style="text-align: end;">
                                <p class="card-text mb-1">Rp.</p>
                            </div>
                            <div class="col-3 text-right" style="text-align: end;">
                                <p class="card-text mb-1"><?= format_rupiah($b->nominal) ?></p>
                            </div>
                            <div class="col-1" style="text-align: right;">
                                <a type="submit" class="text-info" style="font-size: 17px;" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $b->id_budgeting ?>">
                                    ✎
                                </a>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?= $b->id_budgeting ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Budgeting</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <form id="formAuthentication" method="POST" action="<?= base_url('process/update_budgeting') ?>">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <input type="text" hidden class="form-control" value="<?= $b->id_budgeting ?>" id="id_budgeting" name="id_budgeting">
                                                        <input type="text" class="form-control" value="<?= $b->nominal ?>" id="nominal" name="nominal">
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
                                                        'process/delete_budgeting/' . $b->id_budgeting,
                                                        '<i class="fa-solid fa-trash text-danger"></i>',
                                                        array('onclick' => "return confirm('Are you sure to delete this budgeting?');")
                                                    ) ?></a>
                            </div>
                        </div>
                    <?php endforeach ?>
                    <div class="row">
                        <div class="col">
                        </div>
                        <div class="col-4" style="border-top: black;">
                            <hr>
                        </div>
                        <div class="col-2"></div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="card-text mb-1" style="font-weight: bold;">Total:</p>
                        </div>
                        <div class="col-2" style="text-align: end;">
                            <p class="card-text mb-1">Rp.</p>
                        </div>
                        <div class="col-3 text-right" style="text-align: end;">
                            <p class="card-text mb-1"><?= format_rupiah($sum_bud['sumbud']) ?></p>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>