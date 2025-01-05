<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <!-- Loop through each day -->
                <?php foreach ($jadwalByHari as $hari => $jadwal): ?>
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h6 class="mb-0"><?= $hari ?>, <?= date('d F Y', strtotime($jadwal[0]['tanggal'] ?? date('Y-m-d'))) ?></h6>
                        </div>
                        <div class="card-body">
                            <?php if (count($jadwal) > 0): ?>
                                <table class="table table-bordered table-striped">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Mata Kuliah</th>
                                            <th>Dosen</th>
                                            <th>Jam</th>
                                            <th>Ruangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach ($jadwal as $row): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row['nama_matakuliah']; ?></td>
                                                <td><?= $row['nama_dosen']; ?></td>
                                                <td><?= $row['jam_mulai']; ?> - <?= $row['jam_selesai']; ?></td>
                                                <td><?= $row['ruangan']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <p class="text-center">Tidak ada jadwal kuliah pada hari ini.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
