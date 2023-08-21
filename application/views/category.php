<main class="container">
    <?= $this->session->flashdata('message') ?>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add New Category</h5>
                    <hr>
                    <form id="formAuthentication" method="POST" action="<?= base_url('process/add_category') ?>">
                        <div class="row">
                            <div class="col-10">
                                <input required type="text" class="form-control" placeholder="Enter category name..." id="category_name" name="category_name">
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
            <div class="row row-cols-1 row-cols-md-1 g-4">
                <?php
                foreach ($cat as $c) : ?>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-10">
                                        <h5 class="card-text mb-1"><?= $c->category_name ?></h5>
                                    </div>
                                    <div class="col">
                                        <a type="submit"><?php echo anchor(
                                                                'process/delete_category/' . $c->id_category,
                                                                '<i class="fa-solid fa-trash text-danger"></i>',
                                                                array('onclick' => "return confirm('Are you sure to delete this category?');")
                                                            ) ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</main>