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
                                <th>Nama</th>
                                <th>No. Telpon</th>
                                <th>Alamat</th>
                                <th>Level Pengguna</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pengguna as $p) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $p['nama']; ?></td>
                                    <td><?= $p['no_hp']; ?></td>
                                    <td><?= $p['alamat']; ?></td>
                                    <td><?= $p['level']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalubah<?= $p['id_pengguna']; ?>">
                                            Ubah
                                        </button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalhapus<?= $p['id_pengguna']; ?>">
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
<div id="modaltambah" class="modal fade <?= session()->getFlashdata('tambah_gagal') ? 'show' : ''; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="<?= session()->getFlashdata('tambah_gagal') ? 'display: block;' : ''; ?>">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="/admin/tambah-pengguna" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Nama</label>
                                <input type="text" class="form-control" required name="nama" value="<?= old('nama'); ?>">
                                <?php if(session()->get('validation')): ?>
                                    <div class="text-danger">
                                        <?= session()->get('validation')->getError('nama') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label class="floating-label">No. Telpon</label>
                                <input type="number" class="form-control" required name="no_hp" value="<?= old('no_hp'); ?>">
                                <?php if(session()->get('validation')): ?>
                                    <div class="text-danger">
                                        <?= session()->get('validation')->getError('no_hp') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label class="floating-label">Alamat</label>
                                <input type="text" class="form-control" required name="alamat" value="<?= old('alamat'); ?>">
                                <?php if(session()->get('validation')): ?>
                                    <div class="text-danger">
                                        <?= session()->get('validation')->getError('alamat') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label class="floating-label">Username</label>
                                <input type="text" class="form-control" required name="username" value="<?= old('username'); ?>">
                                <?php if(session()->get('validation')): ?>
                                    <div class="text-danger">
                                        <?= session()->get('validation')->getError('username') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label class="floating-label">Password</label>
                                <input type="password" class="form-control" required name="password">
                                <?php if(session()->get('validation')): ?>
                                    <div class="text-danger">
                                        <?= session()->get('validation')->getError('password') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label class="floating-label">Tipe Pengguna</label>
                                <select class="form-control" required name="level">
                                    <option value=""></option>
                                    <option value="Admin">Admin</option>
                                    <option value="Ka. Des">Kepala Desa</option>
                                    <option value="Masyarakat">Masyarakat/Peminjam</option>
                                </select>
                                <?php if(session()->get('validation')): ?>
                                    <div class="text-danger">
                                        <?= session()->get('validation')->getError('level') ?>
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



<?php $no = 1;
foreach ($pengguna as $p) : ?>
     <!-- MODAL UBAH -->
     <div id="modalubah<?= $p['id_pengguna']; ?>" class="modal fade <?= session()->getFlashdata('edit_gagal') && session()->getFlashdata('id_pengguna') == $p['id_pengguna'] ? 'show' : ''; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="<?= session()->getFlashdata('edit_gagal') && session()->getFlashdata('id_pengguna') == $p['id_pengguna'] ? 'display: block;' : ''; ?>">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="/admin/edit-pengguna" method="post">
                    <input type="hidden" name="id_pengguna" value="<?= $p['id_pengguna']; ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label">Nama</label>
                                    <input type="text" class="form-control" value="<?= old('nama', $p['nama']); ?>" name="nama" required>
                                    <?php if(session()->get('validation')): ?>
                                        <div class="text-danger">
                                            <?= session()->get('validation')->getError('nama') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label class="floating-label">No. Telpon</label>
                                    <input type="number" class="form-control" value="<?= old('no_hp', $p['no_hp']); ?>" name="no_hp" required>
                                    <?php if(session()->get('validation')): ?>
                                        <div class="text-danger">
                                            <?= session()->get('validation')->getError('no_hp') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label class="floating-label">Alamat</label>
                                    <input type="text" class="form-control" value="<?= old('alamat', $p['alamat']); ?>" name="alamat" required>
                                    <?php if(session()->get('validation')): ?>
                                        <div class="text-danger">
                                            <?= session()->get('validation')->getError('alamat') ?>
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
    <div id="modalhapus<?= $p['id_pengguna']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4>Apakah Anda Yakin?</h4>
                </div>
                <form action="/admin/hapus-pengguna" method="post">
                    <input type="hidden" name="id_pengguna" value="<?= $p['id_pengguna']; ?>">
                    <div class="text-center mb-3">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>