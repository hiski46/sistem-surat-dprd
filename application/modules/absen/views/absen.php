<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header" class="text-center">
                <div class="d-flex justify-content-between align-items-center">
                    <h4><?= $title; ?></h4>
                </div>
            </div>
            <div class="card-body" id="container-surat">
                <div class="row">
                    <div class="col">
                        <div id="calendar"></div>
                    </div>
                </div>
                <!-- <div class="table-responsive"> -->
                <table id="datatables" class="table table-bordered table-hover display" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">#</th>
                            <th class="text-center align-middle">Nama</th>
                            <th class="text-center align-middle">Absensi</th>
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