<?php
function validasiNilai($nilai)
{
    return is_numeric($nilai) && $nilai >= 0 && $nilai <= 100;
}

function hitungNilaiAkhir($tugas, $uts, $uas)
{
    return ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);
}

function tentukanGrade($nilaiAkhir)
{
    if ($nilaiAkhir >= 85) {
        return "A";
    } elseif ($nilaiAkhir >= 75) {
        return "B";
    } elseif ($nilaiAkhir >= 65) {
        return "C";
    } elseif ($nilaiAkhir >= 50) {
        return "D";
    } else {
        return "E";
    }
}

function tentukanStatus($nilaiAkhir)
{
    return ($nilaiAkhir >= 65) ? "Lulus" : "Tidak Lulus";
}

function tentukanPredikat($nilaiAkhir)
{
    if ($nilaiAkhir >= 85) {
        return "Sangat Baik";
    } elseif ($nilaiAkhir >= 75) {
        return "Baik";
    } elseif ($nilaiAkhir >= 65) {
        return "Cukup";
    } elseif ($nilaiAkhir >= 50) {
        return "Kurang";
    } else {
        return "Sangat Kurang";
    }
}

function formatAngka($angka)
{
    return rtrim(rtrim(number_format($angka, 2, ',', ''), '0'), ',');
}

$daftarMahasiswa = [
    ["nama" => "Ananda rehan", "npm" => "2547971001", "tugas" => 80,  "uts" => 75, "uas" => 90],
    ["nama" => "Aldion raehan", "npm" => "2547971002", "tugas" => 70,  "uts" => 65, "uas" => 60],
    ["nama" => "Abbas marzuki",   "npm" => "2547971003", "tugas" => 40,  "uts" => 45, "uas" => 50],
    ["nama" => "Fatih farhat",   "npm" => "2547971004", "tugas" => 105, "uts" => 80, "uas" => 75], 
];

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Program PHP Nilai Akhir Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; line-height: 1.6; }
        h3 { margin-bottom: 4px; }
        .error { color: red; }
        hr { margin: 25px 0; }
    </style>
</head>
<body>
<?php
foreach ($daftarMahasiswa as $mhs) {
    $nama  = $mhs["nama"];
    $npm   = $mhs["npm"];
    $tugas = $mhs["tugas"];
    $uts   = $mhs["uts"];
    $uas   = $mhs["uas"];
?>
    <p>Data mahasiswa</p>
    <ul>
        <li>Nama: <?= $nama ?></li>
        <li>NPM: <?= $npm ?></li>
        <li>Nilai Tugas: <?= $tugas ?></li>
        <li>Nilai UTS: <?= $uts ?></li>
        <li>Nilai UAS: <?= $uas ?></li>
    </ul>

<?php
    if (!validasiNilai($tugas) || !validasiNilai($uts) || !validasiNilai($uas)) {
?>
    <p class="error">Nilai tidak valid. Nilai harus berada pada rentang 0 sampai 100.</p>
<?php
    } else {
        $nilaiAkhir = hitungNilaiAkhir($tugas, $uts, $uas);
        $grade      = tentukanGrade($nilaiAkhir);
        $status     = tentukanStatus($nilaiAkhir);
        $predikat   = tentukanPredikat($nilaiAkhir);
?>
    <p>Hasil perhitungan</p>
    <ul>
        <li>Nilai Akhir: <?= formatAngka($nilaiAkhir) ?></li>
        <li>Grade: <?= $grade ?></li>
        <li>Predikat: <?= $predikat ?></li>
        <li>Status: <?= $status ?></li>
    </ul>

    <p>Perhitungan nilai akhir :
        <code>(<?= $tugas ?> × 0,3) + (<?= $uts ?> × 0,3) + (<?= $uas ?> × 0,4) = <?= formatAngka($nilaiAkhir) ?></code>.
    </p>
<?php
    }
?>
    <hr>
<?php
}
?>
</body>
</html>