// === CONFIGURASI API URL ===
// (Boleh dikosongkan dulu jika belum pakai Apps Script)
const API_URL = "http://localhost:3000/api";

function login() {
  const id = document.getElementById("idInput").value.trim();
  const nama = document.getElementById("namaInput").value.trim();
  const role = document.getElementById("roleSelect").value;

  if (!id || !nama) {
    alert("Mohon isi semua kolom login!");
    return;
  }

  // Simulasi login (nantinya bisa diganti dengan fetch ke Google Sheet / API)
  localStorage.setItem("userRole", role);
  localStorage.setItem("userId", id);
  localStorage.setItem("userName", nama);

  // Arahkan ke dashboard sesuai role
  if (role === "admin") {
    window.location.href = "admin.html";
  } else if (role === "guru") {
    window.location.href = "guru.html";
  } else {
    window.location.href = "murid.html";
  }
  async function tambahGuru() {
  const nama = document.getElementById("namaGuru").value;
  const nip = document.getElementById("nipGuru").value;
  const mapel = document.getElementById("mapelGuru").value;
  const email = document.getElementById("emailGuru").value;

  try {
    const res = await fetch(`${API_URL}/guru`, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ nama, nip, mapel, email })
    });

    const data = await res.json();
    alert(data.message); // tampilkan "Data guru berhasil disimpan!"
  } catch (err) {
    console.error("Gagal menyimpan data:", err);
  }
}

}
>>>>>>> 79cf2e2c9e7c212db0ff741c60bec7e9df5e964e
