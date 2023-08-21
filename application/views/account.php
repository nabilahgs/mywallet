<main class="container">
    <?= $this->session->flashdata('message') ?>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add New Account</h5>
                    <hr>
                    <form id="formAuthentication" method="POST" action="<?= base_url('process/add_account') ?>">
                        <div class="row">
                            <div class="col-5">
                                <input required type="text" class="form-control" placeholder="Enter account name..." id="account_name" name="account_name">
                            </div>
                            <div class="col-5">
                                <input required type="number" class="form-control" placeholder="Enter credit..." id="credit" name="credit">
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
                    <h5 class="card-title">Transfer Credit</h5>
                    <hr>
                    <form id="formAuthentication" method="POST" action="<?= base_url('process/transfer_credit') ?>">
                        <div class="row">
                            <div class="col-4">
                                <select class="form-select" id="source" name="source">
                                    <option selected disabled>-Select Source-</option>
                                    <?php foreach ($acc as $a) : ?>
                                        <option value="<?= $a->id_account ?>"><?= $a->account_name . "(Rp. " . number_format($a->credit) . ")" ?> </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <select class="form-select" id="destination" name="destination">
                                    <option selected disabled>-Select Destination-</option>
                                    <?php foreach ($acc as $a) : ?>
                                        <option value="<?= $a->id_account ?>"><?= $a->account_name ?> </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <input required type="number" class="form-control" placeholder="Enter credit..." id="credit" name="credit">
                            </div>
                            <div class="col-1" style="text-align: right;">
                                <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-money-bill-transfer"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        foreach ($acc as $a) : ?>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $a->account_name ?></h5>
                        <hr>
                        <div class="row">
                            <div class="col-10">
                                <p class="card-text mb-1">Credit: Rp. <?= number_format($a->credit) ?></p>
                            </div>
                            <div class="col">
                                <!-- <a>
                                    <i class="fa-solid fa-file-pen text-primary"></i>
                                </a> &nbsp; -->
                                <a type="submit"><?php echo anchor(
                                                        'process/delete_account/' . $a->id_account,
                                                        '<i class="fa-solid fa-trash text-danger"></i>',
                                                        array('onclick' => "return confirm('Are you sure to delete this account?');")
                                                    ) ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</main>