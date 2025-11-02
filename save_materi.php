<?php
$data_file = 'tugas.json';
$input = json_decode(file_get_contents('php://input'), true);
$tugas = json_decode(file_get_contents($data_file), true) ?? [];

$tugas[] = [
  'namaGuru' => $input['namaGuru'],
  'mapel' => $input['mapel'],
  'deskripsi' => $input['deskripsi'],
  'fileName' => $input['fileName'],
  'waktu' => date('d/m/Y H:i:s')
];

file_put_contents($data_file, json_encode($tugas, JSON_PRETTY_PRINT));
echo json_encode(['status' => 'success']);
?>
