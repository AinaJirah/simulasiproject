<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
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
                                <th>Rencana Pengembalian</th>
                                <th>Tanggal Konfirmasi Dikembalikan</th>
                                <th>Catatan Saya</th>
                                <th>Status Peminjaman</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($peminjaman as $row) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row['tgl_pinjam']; ?></td>
                                    <td><?= $row['nama_aset']; ?></td>
                                    <td><?= $row['tgl_kembali']; ?></td>
                                    <td><?= $row['tgl_konfirmasi']; ?></td>
                                    <td><?= $row['catatan']; ?></td>
                                    <td>
                                        <?php if ($row['status_pinjam'] == 'Dibatalkan') : ?>
                                            <a href="" class="text-white" data-toggle="modal" data-target="#modalinfo<?= $row['id_peminjaman']; ?>">
                                                <span class="badge badge-secondary">
                                                    <i class="feather icon-info"></i>
                                                    Dibatalkan
                                                </span>
                                            </a>
                                        <?php elseif ($row['status_pinjam'] == 'Ditolak') : ?>
                                            <a href="" class="text-white" data-toggle="modal" data-target="#modalinfo<?= $row['id_peminjaman']; ?>">
                                                <span class="badge badge-danger">
                                                    <i class="feather icon-info"></i>
                                                    Ditolak
                                                </span>
                                            </a>
                                        <?php else : ?>
                                            <span class="badge badge-success">Selesai</span>
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
foreach ($peminjaman as $row) : ?>
    <!-- MODAL INFO -->
    <div id="modalinfo<?= $row['id_peminjaman']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Alasan Tolak/Batal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body text-center">
                    <textarea class="form-control" rows="3" value="Alasan Penolakan..." readonly><?= $row['alasan_tolak']; ?></textarea>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>