<main class="container">
    <?= $this->session->flashdata('message') ?>
    <div class="row row-cols-1 g-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Log</h5>
                    <hr>
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Nominal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($log as $l) :
                                $nom = format_rupiah($l->nominal);
                                $type = $l->type;
                                $date = date_create($l->date_log);
                            ?>
                                <tr>
                                    <td><?= date_format($date, "d/m/Y") ?></td>
                                    <td><?= $l->log_description ?></td>
                                    <?php if ($l->type == 1) : ?>
                                        <td class="text-success"><i class="fa-solid fa-plus"></i> <?= $nom ?></td>
                                    <?php elseif ($type == 2) : ?>
                                        <td class="text-danger"><i class="fa-solid fa-minus"></i> <?= $nom ?></td>
                                    <?php else : ?>
                                        <td class="text-warning"><i class="fa-solid fa-right-left"></i> <?= $nom ?></td>
                                    <?php endif ?>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>