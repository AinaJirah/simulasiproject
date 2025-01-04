<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table id="mytable" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kategori Jenis</th>
                                <th>Stok</th>
                                <th>Ketersediaan</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($aset as $row) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row['nama_aset']; ?></td>
                                    <td><?= $row['jenis']; ?></td>
                                    <td><?= $row['stok']; ?></td>
                                    <td>
                                        <?php if ($row['stok'] > 0) : ?>
                                            <div class="badge badge-success">Tersedia</div>
                                        <?php else : ?>
                                            <div class="badge badge-secondary">Tidak Tersedia</div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#modalFoto<?= $row['id_aset']; ?>">
                                            <img src="<?= base_url('img/aset/' . $row['foto']); ?>" alt="Foto Aset" width="100">
                                        </a>
                                    </td>
                                    <td>
                                        <?php if ($row['stok'] > 0) : ?>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalpinjam<?= $row['id_aset']; ?>">
                                                Pinjam Barang
                                            </button>
                                        <?php else : ?>
                                            <button class="btn btn-primary" disabled>
                                                Pinjam Barang
                                            </button>
                                        <?php endif; ?>
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


<?php
$no = 1;
foreach ($aset as $row) : ?>
    <!-- MODAL PINJAM -->
    <div id="modalpinjam<?= $row['id_aset']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Peminjaman Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="/peminjam/pinjam" method="post">
                    <input type="hidden" name="id_aset" value="<?= $row['id_aset']; ?>">
                    <input type="hidden" name="id_pengguna" value="<?= session()->get('id_pengguna'); ?>">
                    <input type="hidden" name="stok" value="<?= $row['stok']; ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="floating-label">Nama Barang</label>
                                    <input type="text" class="form-control" value="<?= $row['nama_aset']; ?>" required disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="floating-label">Qty Pinjam</label>
                                    <input type="number" class="form-control" placeholder="Qty tidak boleh melebihi stok" name="qty" min="1" max="<?= $row['stok']; ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label">Tanggal Mulai Pinjam</label>
                                    <input type="date" class="form-control" placeholder="date" name="tgl_pinjam" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label">Tanggal Rencana Pengembalian</label>
                                    <input type="date" class="form-control" placeholder="date" name="tgl_kembali" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label">Catatan <small>(opsional)</small></label>
                                    <textarea class="form-control" rows="3" name="catatan" placeholder="Tuliskan catatan singkat..."></textarea>
                                </div>
                            </div>
                            <script>
                                // Mendapatkan tanggal hari ini
                                var today = new Date();
                                // Mengonversi tanggal ke format ISO untuk input tanggal
                                var isoDate = today.toISOString().split('T')[0];

                                // Menetapkan tanggal hari ini sebagai nilai minimum untuk kedua input tanggal
                                document.querySelector('input[type="date"]').min = isoDate;
                            </script>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Ajukan Peminjaman</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL DETAIL FOTO -->
    <div id="modalFoto<?= $row['id_aset']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Detail Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body text-center">
                    <img src="/img/aset/<?= $row['foto']; ?>" alt="Foto Aset" width="500">
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>