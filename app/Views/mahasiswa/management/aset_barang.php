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
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($aset as $row) : ?>
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