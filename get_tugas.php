<?php
header('Content-Type: application/json');

// Lokasi file tugas
$file = 'tugas.json';

// Kalau file belum ada, buat baru biar tidak error
if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

// Baca isi file JSON
$data = json_decode(file_get_contents($file), true);

// Pastikan hasil decode adalah array
if (!is_array($data)) {
    $data = [];
}

// Kirim data ke frontend
echo json_encode([
    'status' => 'success',
    'tugas' => $data
]);
?>
