<?php
header('Content-Type: application/json');

// Lokasi file JSON (materi.json ada di folder yang sama)
$file = 'materi.json';

// Jika file belum ada, buat baru
if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

// Baca isi file JSON
$data = json_decode(file_get_contents($file), true);

// Pastikan formatnya array
if (!is_array($data)) {
    $data = [];
}

// Ambil data dari form POST
$newMateri = [
    'judul' => $_POST['judul'] ?? '',
    'deskripsi' => $_POST['deskripsi'] ?? '',
    'link' => $_POST['link'] ?? '',
    'file' => $_POST['file'] ?? '',
    'tanggal_upload' => date('Y-m-d H:i:s'),
    'pengupload' => $_POST['pengupload'] ?? 'Guru Tidak Dikenal'
];

// Tambahkan ke daftar materi
$data[] = $newMateri;

// Simpan ulang ke materi.json
if (file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT))) {
    echo json_encode(['status' => 'success', 'message' => 'Materi berhasil disimpan ✅']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan materi ❌']);
}
?>
