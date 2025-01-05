<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <a href="/mahasiswa/nilai/cetak_transkrip" target="_blank" class="btn btn-light btn-sm">Cetak Transkip Nilai</a>
            </div>
            <div class="card-body">
                <?php if (empty($nilaiBySemester)): ?>
                    <div class="alert alert-warning text-center">
                        <strong>Belum ada nilai yang tersedia.</strong>
                    </div>
                <?php else: ?>
                    <?php foreach ($nilaiBySemester as $semester => $nilai): ?>
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">
                                Semester <?= $semester ?>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Mata Kuliah</th>
                                            <th>SKS</th>
                                            <th>Nilai Angka</th>
                                            <th>Nilai Huruf</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($nilai as $row): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row['nama_matakuliah'] ?></td>
                                                <td><?= $row['sks'] ?></td>
                                                <td><?= number_format($row['nilai_angka'], 2) ?></td>
                                                <td><?= $row['nilai_huruf'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>