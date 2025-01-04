<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body table-border-style">
                <?= session()->getFlashdata('pesan'); ?>
                <div class="table-responsive">
                    <table id="mytable" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Tipe Pengguna</th>
                                <th>Status Akun</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($akun as $a) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $a['nama']; ?></td>
                                    <td><?= $a['username']; ?></td>
                                    <td><?= $a['level']; ?></td>
                                    <td>
                                        <?php if ($a['status_akun'] == 'Aktif') : ?>
                                            <span class="badge badge-success">Aktif</span>
                                        <?php else : ?>
                                            <span class="badge badge-danger">Tidak Aktif</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalubah<?= $a['id_pengguna']; ?>">
                                            Ubah
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

<?php $no = 1;
foreach ($akun as $a) : ?>
    <!-- MODAL UBAH -->
    <div id="modalubah<?= $a['id_pengguna']; ?>" class="modal fade <?= (session()->getFlashdata('edit_gagal') && session()->getFlashdata('id_pengguna') == $a['id_pengguna']) ? 'show' : ''; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="<?= (session()->getFlashdata('edit_gagal') && session()->getFlashdata('id_pengguna') == $a['id_pengguna']) ? 'display: block;' : ''; ?>">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="/admin/edit-akun" method="post">
                    <input type="hidden" name="id_pengguna" value="<?= $a['id_pengguna']; ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label">Nama</label>
                                    <input type="text" class="form-control" value="<?= $a['nama']; ?>" required readonly>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label">Username</label>
                                    <input type="text" class="form-control" value="<?= old('username', $a['username']); ?>" required name="username">
                                    <?php if (session()->get('validation')) : ?>
                                        <div class="text-danger">
                                            <?= session()->get('validation')->getError('username') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label">Password</label>
                                    <input type="password" class="form-control" placeholder="Isi untuk mengganti password baru!" name="password">
                                    <?php if (session()->get('validation') && session()->get('validation')->hasError('password')) : ?>
                                        <div class="text-danger">
                                            <?= session()->get('validation')->getError('password') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label">Tipe Pengguna</label>
                                    <select class="form-control" required name="level">
                                        <option <?= ($a['level'] == 'Admin') ? 'selected' : ''; ?> value="Admin">Admin</option>
                                        <option <?= ($a['level'] == 'Ka. Des') ? 'selected' : ''; ?> value="Ka. Des">Kepala Desa</option>
                                        <option <?= ($a['level'] == 'Masyarakat') ? 'selected' : ''; ?> value="Masyarakat">Masyarakat/Peminjam</option>
                                    </select>
                                    <?php if (session()->get('validation')) : ?>
                                        <div class="text-danger">
                                            <?= session()->get('validation')->getError('level') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label">Status Akun</label>
                                    <select class="form-control" required name="status_akun">
                                        <option <?= ($a['status_akun'] == 'Aktif') ? 'selected' : ''; ?> value="Aktif">Aktif</option>
                                        <option <?= ($a['status_akun'] == 'Tidak Aktif') ? 'selected' : ''; ?> value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                    <?php if (session()->get('validation')) : ?>
                                        <div class="text-danger">
                                            <?= session()->get('validation')->getError('status_akun') ?>
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
<?php endforeach; ?>
