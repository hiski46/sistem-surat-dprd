<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
            </div>
            <div class="card-body">
                <div class="bs-stepper-content">
                    <form action="<?= site_url('agenda/agenda/create'); ?>" method="post" enctype="multipart/form-data" id="form-tambah-agenda">
                        <div id="data-agenda" class="content" role="tabpanel" aria-labelledby="data-agenda-trigger">
                            <input type="hidden" name="tipe_agenda" value="<?= $type ?>">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Agenda <?= form_error('agenda'); ?></label>
                                        <?php
                                        echo form_input(array(
                                            "id" => "agenda",
                                            "name" => "agenda",
                                            "type" => "text",
                                            "value" => set_value('agenda'),
                                            "placeholder" => "Agenda",
                                            "class" => "form-control",
                                            "required" => "required",
                                        ));
                                        ?>
                                        <div class="invalid-feedback" id="error_agenda">
                                            Agenda harus diisi.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal<?= form_error('tanggal'); ?></label>
                                        <?php
                                        echo form_input(array(
                                            "id" => "tanggal",
                                            "name" => "tanggal",
                                            "type" => "date",
                                            "value" => set_value('tanggal'),
                                            "placeholder" => "Tanggal",
                                            "class" => "form-control",
                                            "data-target" => ""
                                        ));
                                        ?>
                                        <div class="invalid-feedback">
                                            Tanggal harus diisi.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Waktu<?= form_error('waktu'); ?></label>
                                        <?php
                                        echo form_input(array(
                                            "id" => "waktu",
                                            "name" => "waktu",
                                            "type" => "time",
                                            "value" => set_value('waktu'),
                                            "placeholder" => "Tanggal Diterima",
                                            "class" => "form-control",
                                            "data-target" => ""
                                        ));
                                        ?>
                                        <div class="invalid-feedback">
                                            Waktu harus diisi.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($type == 1) { ?>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="data">Data</label>
                                            <div class="input-group" id="show-error-file">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="data" name="data" accept="image/jpg, image/png, image/jpeg, application/pdf">
                                                    <label class="custom-file-label" for="data">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Detail <?= form_error('detail'); ?></label>
                                        <?php
                                        echo form_textarea(array(
                                            "id" => "detail",
                                            "name" => 'detail',
                                            "value" => set_value('detail'),
                                            "placeholder" => "Detail Agenda",
                                            "class" => "form-control"
                                        ));
                                        ?>
                                        <div class="invalid-feedback">
                                            Detail harus diisi.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button id="add-agenda" type="button" class="btn btn-primary btn-submit"><i class="fas fa-save"></i> Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>