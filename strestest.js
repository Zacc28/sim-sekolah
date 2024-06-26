import http from "k6/http";
import { sleep } from "k6";

// Opsi konfigurasi untuk pengujian dengan k6
export const options = {
    vus: 10, // Jumlah pengguna virtual (VUs) simulasi
    duration: "30s", // Durasi pengujian
};

// Fungsi utama untuk menjalankan pengujian
export default function () {
    // Mengirimkan permintaan GET ke endpoint 'http://127.0.0.1:8000/student'
    http.get("http://127.0.0.1:8000/student");
    // Memberi jeda 1 detik setelah setiap permintaan
    sleep(1);
}
