<?php
header('Content-Type: application/json');

// Lokasi file JSON (pastikan folder api dan file json ada)
$file = '../tugas.json';

// Jika file belum ada, buat file kosong
if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

// Baca isi file JSON
$data = json_decode(file_get_contents($file), true);

// Jika decode gagal, reset ke array kosong
if (!is_array($data)) {
    $data = [];
}

// Ambil data dari form POST
$newTask = [
    'judul' => $_POST['judul'] ?? '',
    'deskripsi' => $_POST['deskripsi'] ?? '',
    'deadline' => $_POST['deadline'] ?? '',
    'file' => $_POST['file'] ?? null,
    'tanggal' => date('Y-m-d H:i:s')
];

// Tambahkan data baru ke array
$data[] = $newTask;

// Simpan kembali ke file JSON
if (file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT))) {
    echo json_encode(['status' => 'success', 'message' => '✅ Tugas berhasil disimpan ke file JSON']);
} else {
    echo json_encode(['status' => 'error', 'message' => '❌ Gagal menyimpan file JSON']);
}
?>
