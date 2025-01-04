<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?= session()->getFlashdata('pesan'); ?>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaltambah">
                    Tambah Data
                </button>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table id="mytable" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori Jenis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($jenis_aset as $data) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['jenis']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalubah<?= $data['id_jenis']; ?>">
                                            Ubah
                                        </button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalhapus<?= $data['id_jenis']; ?>">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL TAMBAH -->
<div id="modaltambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="/admin/tambah-kategori" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Kategori Jenis</label>
                                <input type="text" class="form-control" name="jenis" value="<?= old('jenis') ?>" required>
                                <?php if (session()->get('validation')) : ?>
                                    <div class="text-danger">
                                        <?= session()->get('validation')->getError('jenis') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$no = 1;
foreach ($jenis_aset as $data) : ?>
    <!-- MODAL UBAH -->
    <div id="modalubah<?= $data['id_jenis']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="/admin/edit-kategori" method="post">
                    <input type="hidden" name="id_jenis" value="<?= $data['id_jenis']; ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label">Kategori Jenis</label>
                                    <input type="text" class="form-control" value="<?= old('jenis', $data['jenis']); ?>" name="jenis" required>
                                    <?php if (session()->get('validation')) : ?>
                                        <div class="text-danger">
                                            <?= session()->get('validation')->getError('jenis') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- MODAL HAPUS -->
    <div id="modalhapus<?= $data['id_jenis']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4>Apakah Anda Yakin?</h4>
                </div>
                <form action="/admin/hapus-kategori" method="post">
                    <input type="hidden" name="id_jenis" value="<?= $data['id_jenis']; ?>">
                    <div class="text-center mb-3">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>