<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?= session()->getFlashdata('pesan'); ?>
                <div class="btn-group mb-2 mr-2">
                    <button class="btn  btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status Peminjaman</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/admin/peminjaman">Menunggu Konfirmasi</a>
                        <a class="dropdown-item" href="/admin/menunggu-dikembalikan">Menunggu Dikembalikan</a>
                        <a class="dropdown-item" href="/admin/peminjaman-selesai">Peminjaman Selesai</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table id="mytable" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pinjam</th>
                                <th>Nama Barang</th>
                                <th>Nama Peminjam</th>
                                <th>Rencana Pengembalian</th>
                                <th>Qty Pinjam</th>
                                <th>Catatan Peminjam</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($peminjaman as $p) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $p['tgl_pinjam']; ?></td>
                                    <td><?= $p['nama_aset']; ?></td>
                                    <td><?= $p['nama']; ?></td>
                                    <td><?= $p['tgl_kembali']; ?></td>
                                    <td><?= $p['qty']; ?></td>
                                    <td><?= $p['catatan']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalterima<?= $p['id_peminjaman']; ?>">
                                            Konfirmasi
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

<?php
foreach ($peminjaman as $p) : ?>
    <!-- MODAL TERIMA -->
    <div id="modalterima<?= $p['id_peminjaman']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4>Apakah barang sudah dikembalikan?</h4>
                </div>
                <div class="text-center mb-3">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                    <a href="/admin/barang_kembali/<?= $p['id_peminjaman']; ?>" class="btn btn-warning">Konfirmasi Selesai</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>