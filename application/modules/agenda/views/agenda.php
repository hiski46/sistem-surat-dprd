<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header" class="text-center">
                <div class="d-flex justify-content-between align-items-center">
                    <h4><?= $title; ?></h4>
                    <a href='<?php echo site_url("agenda/Agenda/add_agenda/" . $type)  ?>' class="btn btn-sm btn-primary" data-toggle="tooltip" title="Tambah Agenda">
                        <div class="row px-2">
                            <i class="fas fa-plus my-auto"></i> <span class="d-none d-sm-block ml-2"> Tambah Agenda</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="card-body" id="container-surat">
                <!-- <div class="table-responsive"> -->
                <table id="datatables" class="table table-bordered table-hover display" width="100%">
                    <thead>
                        <tr>
                            <th width="2%" class="text-center align-middle">#</th>
                            <th width="10%" class="text-center align-middle">Tanggal</th>
                            <th width="35%" class="text-center align-middle">Agenda</th>
                            <th width="40%" class="text-center align-middle">Detail</th>
                            <th width="13%" class="text-center align-middle">Aksi</th>

                            <!-- <th class="text-center align-middle">Tujuan Surat</th> -->
                            <!-- <th class="text-center align-middle" width="15%">Action</th> -->
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>

<div class="view-modal"></div>