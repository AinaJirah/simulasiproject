<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <!-- support-section start -->
        <div class="row">
            <div class="col-sm-6">
                <div class="card support-bar overflow-hidden">
                    <div class="card-body pb-0">
                        <h2 class="m-0"></h2>
                        <a href="#" class="text-c-blue">Lihat detail →</a>
                        <p class="mb-3 mt-3">Total barang menunggu konfirmasi.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card support-bar overflow-hidden">
                    <div class="card-body pb-0">
                        <h2 class="m-0"></h2>
                        <a href="#" class="text-c-blue">Lihat detail →</a>
                        <p class="mb-3 mt-3">Total barang menunggu dikembalikan.</p>
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