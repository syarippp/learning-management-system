<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>List Nilai Siswa Kelas <?= $kelas; ?> SMKN 10 Malang</h2>
    <?php
    date_default_timezone_set('Asia/Jakarta'); // Set zona waktu ke WIB
    ?>

    <h4>Mata Pelajaran : <?= $lihat_nilai[0]->nama_mapel ?></h4>
    <h4>Pertemuan : <?= $lihat_nilai[0]->pertemuan ?></h4>

    <h4>File ini dicetak pada : <?= date('d-m-Y H:i:s') ?></h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($lihat_nilai as $ma): ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $ma->nama_lengkap; ?></td>
                <td><?php echo $ma->nilai; ?></td>
            </tr>
            <?php $no++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
