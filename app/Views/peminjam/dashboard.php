<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <!-- support-section start -->
        <div class="row">
            <div class="col-sm-6">
                <div class="card support-bar overflow-hidden">
                    <div class="card-body pb-0">
                        <h2 class="m-0"><?= $menunggu_konfirmasi ?></h2>
                        <a href="/peminjam/peminjaman" class="text-c-blue">Lihat detail →</a>
                        <p class="mb-3 mt-3">Total barang menunggu konfirmasi.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card support-bar overflow-hidden">
                    <div class="card-body pb-0">
                        <h2 class="m-0"><?= $menunggu_dikembalikan ?></h2>
                        <a href="/peminjam/menunggu-dikembalikan" class="text-c-blue">Lihat detail →</a>
                        <p class="mb-3 mt-3">Total barang menunggu dikembalikan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <?= session()->getFlashdata('pesan'); ?>
                <h5>Detail Pengguna</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" readonly value="<?= session()->get('nama'); ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>No. Telpon</label>
                            <input type="text" class="form-control" readonly value="<?= session()->get('no_hp'); ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" readonly value="<?= session()->get('alamat'); ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Level Pengguna</label>
                            <input type="text" class="form-control" readonly value="<?= session()->get('level'); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->