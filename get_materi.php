<?php
header('Content-Type: application/json');

// Lokasi file materi
$file = 'materi.json';

// Jika file belum ada, buat file kosong agar tidak error
if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

// Baca file JSON
$data = json_decode(file_get_contents($file), true);

// Pastikan hasil decode adalah array
if (!is_array($data)) {
    $data = [];
}

// Kirim data sebagai JSON response
echo json_encode([
    'status' => 'success',
    'materi' => $data
]);
?>
