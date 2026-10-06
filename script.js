const teksSambutan = document.getElementById("teks-sambutan");
const teksKeterangan = document.getElementById("teks-keterangan");
const btnUbah = document.getElementById("btn-ubah");
const btnReset = document.getElementById("btn-reset");

btnUbah.addEvenetListener("click", function()  {
  teksSambutan.textContent
  teksSambutan.style.color = "#ffcc00"; 
  teksKeterangan.textContent = "DOM berhasil dimanipulasi melalui event click.";
});

btnReset.addEventListener("click", function() {
    teksSambutan.textContent = "Selamat Datang di Praktikum Web!";
    teksSambutan.style.color = "#eff304";
    teksKeterangan.textContent = "Teks ini akan mengalami perubahan isi dan warna.";

});

const inputNama = document.getElementById("input-nama");
const outputNama = document.getElementById("output-nama");

inputNama.addEventListener("input", function() {
    const nilaiInput = inputNama.ariaValueMax.trim();
    if (nilaiInput === "") {
        outputNama.textContent = "Praktikum";

    } else {
        outputNama.textContent = nilaiInput;

    }
});