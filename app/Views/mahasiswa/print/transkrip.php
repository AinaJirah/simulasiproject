<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transkrip Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            body {
                margin: 0;
                padding: 0;
            }
        }

        .info-card {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .info-card .info-title {
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
            font-size: 1.2rem;
        }

        .info-card .info-row {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
        }

        .info-card .info-label {
            font-weight: bold;
            color: #333;
            min-width: 100px;
        }

        .info-card .info-value {
            text-align: left;
            flex: 1;
            color: #555;
        }

        .table-primary {
            background-color: #007bff;
            color: white;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            text-align: center;
        }

        .footer-note {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Transkrip Nilai</h2>

        <!-- Student Info Card -->
        <div class="info-card">
            <div class="info-title">Informasi Mahasiswa</div>
            <div class="info-row">
                <span class="info-label">Nama:</span>
                <span class="info-value"><?= $mahasiswa['nama']; ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">NIM:</span>
                <span class="info-value"><?= $mahasiswa['nim']; ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Angkatan:</span>
                <span class="info-value"><?= $mahasiswa['angkatan']; ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Total SKS:</span>
                <span class="info-value"><?= $total_sks; ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">IPK:</span>
                <span class="info-value"><?= $ipk; ?></span>
            </div>
        </div>

        <!-- Grades Table -->
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Nilai Angka</th>
                    <th>Nilai Huruf</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($nilai)): ?>
                    <tr>
                        <td colspan="5" class="text-center">Belum ada nilai yang tersedia.</td>
                    </tr>
                <?php else: ?>
                    <?php $no = 1; foreach ($nilai as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama_matakuliah']; ?></td>
                            <td><?= $row['sks']; ?></td>
                            <td><?= number_format($row['nilai_angka'], 2); ?></td>
                            <td><?= $row['nilai_huruf']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Footer Note -->
        <div class="footer-note">
            <p>
                Data ini dihasilkan oleh Sistem Informasi Akademik.
                <br>
                Jika ada kesalahan data, silakan hubungi bagian administrasi.
            </p>
        </div>
    </div>

    <script>
        window.print();
        window.onafterprint = function () {
            window.close();
        };
    </script>
</body>

</html>
