<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Daftar Mata Kuliah yang Diambil</h5>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table id="matakuliahTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Mata Kuliah</th>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Jurusan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($matakuliah as $row): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row['kode_matakuliah']; ?></td>
                                    <td><?= $row['nama_matakuliah']; ?></td>
                                    <td><?= $row['sks']; ?></td>
                                    <td><?= $row['nama_jurusan']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
