<!-- Header-->
<header class="masthead text-center text-white">
    <div class="masthead-content">
        <div class="container px-5">
            <h1 class="masthead-heading mb-0"><?= strtoupper($title) ?></h1>
        </div>
    </div>
    <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div>
</header>
<!-- Content section 1-->
<section id="scroll">
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="g-4">
                <div class="mb-3">
                    <form id="formAuthentication" method="POST" action="<?= base_url('process/add_budgeting') ?>">
                        <div class="row">
                            <?= $this->session->flashdata('message') ?>
                            <div class="col-5">
                                <select class="form-select" id="id_category" name="id_category">
                                    <option selected disabled>-Select Category-</option>
                                    <?php foreach ($cat as $c) : ?>
                                        <option value="<?= $c->id_category ?>"><?= $c->category_name ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="Enter nominal..." id="nominal" name="nominal">
                            </div>
                            <div class="col-1" style="text-align: right;">
                                <button type="submit" class="btn btn-outline-primary">Add</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <?php foreach ($bud as $b) : ?>
                                <div class="row">
                                    <div class="col-4"><?= $b->category_name ?></div>
                                    <div class="col-3"><?= $b->nominal ?></div>
                                    <!-- <div class="col-1" style="text-align: right;"><i class="fa-solid fa-pen-to-square text-info"></i></i></div> -->
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
                                <hr>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="card border-white">
    <div class="card-body" style="color: white; border-color:white">
        asdada
    </div>
</div>