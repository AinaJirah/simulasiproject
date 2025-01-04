<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?= session()->getFlashdata('pesan'); ?>
                <div class="btn-group mb-2 mr-2">
                    <button class="btn  btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status Peminjaman</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/peminjam/peminjaman">Menunggu Konfirmasi</a>
                        <a class="dropdown-item" href="/peminjam/menunggu-dikembalikan">Menunggu Dikembalikan</a>
                        <a class="dropdown-item" href="/peminjam/peminjaman-selesai">Peminjaman Selesai</a>
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
                                <th>QTY</th>
                                <th>Rencana Pengembalian</th>
                                <th>Catatan Saya</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($peminjaman as $row) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row['tgl_pinjam']; ?></td>
                                    <td><?= $row['nama_aset']; ?></td>
                                    <td><?= $row['qty']; ?></td>                                    
                                    <td><?= $row['tgl_kembali']; ?></td>
                                    <td><?= $row['catatan']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalbatal<?= $row['id_peminjaman']; ?>">
                                            Batalkan
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
foreach ($peminjaman as $row) : ?>
    <!-- MODAL BATAL -->
    <div id="modalbatal<?= $row['id_peminjaman']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4>Apakah Anda Yakin?</h4>
                </div>
                <form action="/peminjam/batal" method="post">
                    <input type="hidden" name="id_peminjaman" value="<?= $row['id_peminjaman']; ?>">
                    <input type="hidden" name="id_aset" value="<?= $row['id_aset']; ?>">
                    <input type="hidden" name="qty" value="<?= $row['qty']; ?>">
                    <input type="hidden" name="stok" value="<?= $row['stok']; ?>">
                    <textarea class="form-control" rows="3" placeholder="Tulis Alasan Pembatalan..." name="alasan_tolak"></textarea>
                    <div class="text-center mb-3">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-secondary">Ya, Batalkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>