<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
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
                <form action="/admin/peminjaman-selesai-cari" method="post" id="formCariCetak">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="tgl_awal">Tanggal Awal</label>
                                <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" value="<?= $tgl_awal; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="tgl_akhir">Tanggal Akhir</label>
                                <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" value="<?= $tgl_akhir; ?>" required>
                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="form-group">
                                <div class="btn-group mt-4" role="group" aria-label="Basic example">
                                    <!-- refresh -->
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                    <a href="#" class="btn btn-secondary" id="btnCetak">Cetak</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table id="mytable" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pinjam</th>
                                <th>Nama Barang</th>
                                <th>Nama Peminjam</th>
                                <th>Rencana Pengembalian</th>
                                <th>Tanggal Konfirmasi Dikembalikan</th>
                                <th>Catatan Peminjam</th>
                                <th>Qty Pinjam</th>
                                <th>Status Peminjaman</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($peminjaman as $p) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $p['tgl_pinjam']; ?></td>
                                    <td><?= $p['nama_aset']; ?></td>
                                    <td><?= $p['nama']; ?></td>
                                    <td><?= $p['tgl_kembali']; ?></td>
                                    <td><?= $p['tgl_konfirmasi']; ?></td>
                                    <td><?= $p['catatan']; ?></td>
                                    <td><?= $p['qty']; ?></td>
                                    <td>
                                        <?php if ($p['status_pinjam'] == 'Dikembalikan') : ?>
                                            <span class="badge badge-success">Selesai</span>
                                        <?php elseif ($p['status_pinjam'] == 'Dibatalkan') : ?>
                                            <a href="" class="text-white" data-toggle="modal" data-target="#modalinfo<?= $p['id_peminjaman']; ?>">
                                                <span class="badge badge-secondary">
                                                    <i class="feather icon-info"></i>
                                                    Dibatalkan
                                                </span>
                                            </a>
                                        <?php elseif ($p['status_pinjam'] == 'Ditolak') : ?>
                                            <a href="" class="text-white" data-toggle="modal" data-target="#modalinfo<?= $p['id_peminjaman']; ?>">
                                                <span class="badge badge-danger">
                                                    <i class="feather icon-info"></i>
                                                    Ditolak
                                                </span>
                                            </a>
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

<?php foreach ($peminjaman as $p) : ?>
    <!-- MODAL INFO -->
    <div id="modalinfo<?= $p['id_peminjaman']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Alasan Tolak/Batal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body text-center">
                    <textarea class="form-control" rows="3" value="Alasan Penolakan..." readonly><?= $p['alasan_tolak']; ?></textarea>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script>
    document.getElementById('btnCetak').addEventListener('click', function(event) {
        event.preventDefault();
        const tgl_awal = document.getElementById('tgl_awal').value;
        const tgl_akhir = document.getElementById('tgl_akhir').value;

        if (!tgl_awal || !tgl_akhir) {
            alert('Tanggal awal dan akhir tidak boleh kosong');
        } else {
            window.open(`/admin/print-peminjaman-selesai/${tgl_awal}/${tgl_akhir}`, '_blank');
        }
    });
</script>