document.addEventListener("DOMContentLoaded", function() {
    // 1. Pencarian pada tabel (halaman baru memakai #searchData / #daftarData,
    //    halaman Produk lama memakai #searchProduk / #daftarProduk)
    const searchInput = document.querySelector("#searchData, #searchProduk");
    const tableRows = document.querySelectorAll(
        "#daftarData tr, #daftarProduk tr",
    );

    if (searchInput) {
        searchInput.addEventListener("input", function() {
            const keyword = this.value.toLowerCase().trim();

            tableRows.forEach(function(row) {
                // pakai data-nama kalau ada, kalau tidak pakai seluruh teks baris
                const teks = (row.dataset.nama || row.textContent).toLowerCase();

                row.hidden = !teks.includes(keyword);
            });
        });
    }

    // 2. Konfirmasi sebelum menghapus
    const deleteButtons = document.querySelectorAll(".btn-hapus");

    deleteButtons.forEach(function(button) {
        button.addEventListener("click", function(event) {
            const konfirmasi = confirm(
                "Apakah Anda yakin ingin menghapus data ini?",
            );

            if (!konfirmasi) {
                event.preventDefault();
            }
        });
    });

    // 3. Validasi tampilan harga
    const hargaInput = document.querySelector("#harga_produk, #harga");

    if (hargaInput) {
        hargaInput.addEventListener("input", function() {
            if (this.value !== "" && Number(this.value) < 0) {
                this.setCustomValidity("Harga tidak boleh kurang dari nol.");
            } else {
                this.setCustomValidity("");
            }
        });
    }
});