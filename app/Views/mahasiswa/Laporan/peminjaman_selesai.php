<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transkip Nilai</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Laporan Peminjaman</h2>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal Pinjam</th>
                    <th>Nama Barang</th>
                    <th>Nama Peminjam</th>
                    <th>Rencana Pengembalian</th>
                    <th>Tanggal Konfirmasi Dikembalikan</th>
                    <th>Qty Pinjam</th>
                    <th>Catatan Peminjam</th>
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
                        <td><?= $p['qty']; ?></td>
                        <td><?= $p['catatan']; ?></td>
                        <td><?= $p['status_pinjam']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        window.print();
        window.onafterprint = function() {
            window.close();
        };
    </script>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>