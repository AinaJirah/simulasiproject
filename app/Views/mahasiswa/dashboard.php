<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h3><?= $ipk ?></h3>
                        <p>IPK</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h3><?= $total_sks ?></h3>
                        <p>Total SKS</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Detail Pengguna</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" readonly value="<?= session()->get('nama') ?>">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Level Pengguna</label>
                            <input type="text" class="form-control" readonly value="<?= session()->get('level') ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->