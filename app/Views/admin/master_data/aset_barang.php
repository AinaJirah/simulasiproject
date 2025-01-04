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
                                <th>Nama Barang</th>
                                <th>Kategori Jenis</th>
                                <th>Stok</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($aset as $data) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['nama_aset']; ?></td>
                                    <td><?= $data['jenis']; ?></td>
                                    <td><?= $data['stok']; ?></td>
                                    <td>
                                        <img src="<?= base_url('img/aset/' . $data['foto']); ?>" alt="Foto Aset" width="100">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalubah<?= $data['id_aset']; ?>">
                                            Ubah
                                        </button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalhapus<?= $data['id_aset']; ?>">
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

<!-- Tampilkan pesan error -->
<?php if (session()->getFlashdata('errors')): ?>
<div class="alert alert-danger">
    <ul>
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach ?>
    </ul>
</div>
<?php endif ?>

<!-- MODAL TAMBAH -->
<div id="modaltambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="/admin/tambah-aset" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_aset" value="<?= old('nama_aset') ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <!-- <label class="floating-label">Kategori Jenis</label> -->
                                <select class="form-control" required name="id_jenis">
                                    <option value="">--Pilih Kategori--</option>
                                    <?php foreach ($jenis_aset as $data): ?>
                                        <option value="<?= $data['id_jenis'] ?>" <?= old('id_jenis') == $data['id_jenis'] ? 'selected' : '' ?>>
                                            <?= $data['jenis'] ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="floating-label">Stok Ready</label>
                                <input type="number" min="1" class="form-control" name="stok" value="<?= old('stok') ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto" required>
                                    <label class="custom-file-label">Pilih Foto <small>(jpg, jpeg, png)</small></label>
                                </div>
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

<?php foreach ($aset as $data): ?>
    <!-- MODAL UBAH -->
    <div id="modalubah<?= $data['id_aset']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="/admin/edit-aset" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_aset" value="<?= $data['id_aset']; ?>">
                    <input type="hidden" name="foto_lama" value="<?= $data['foto']; ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="floating-label">Nama Barang</label>
                                    <input type="text" class="form-control" value="<?= old('nama_aset', $data['nama_aset']) ?>" name="nama_aset" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="floating-label">Kategori Jenis</label>
                                    <select class="form-control" required name="id_jenis">
                                        <option value="">--Pilih Kategori--</option>
                                        <?php foreach ($jenis_aset as $jenis): ?>
                                            <option value="<?= $jenis['id_jenis']; ?>" <?= old('id_jenis', $data['id_jenis']) == $jenis['id_jenis'] ? 'selected' : ''; ?>>
                                                <?= $jenis['jenis']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="floating-label">Stok Ready</label>
                                    <input type="number" min="1" class="form-control" value="<?= old('stok', $data['stok']) ?>" name="stok" required>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="foto">
                                        <label class="custom-file-label">Pilih Foto <small>(jpg, jpeg, png)</small></label>
                                    </div>
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
    <div id="modalhapus<?= $data['id_aset']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4>Apakah Anda Yakin?</h4>
                </div>
                <form action="/admin/hapus-aset" method="post">
                    <input type="hidden" name="id_aset" value="<?= $data['id_aset']; ?>">
                    <div class="text-center mb-3">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
