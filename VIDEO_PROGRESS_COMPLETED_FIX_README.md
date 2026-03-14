# Video Progress Completed Status Fix

## Masalah
Ketika pengguna menonton ulang video yang sudah pernah selesai ditonton (progress 100%), status completed tidak dipertahankan. Akibatnya, progress keseluruhan pengguna menurun meskipun sebelumnya pengguna telah menyelesaikan semua video.

## Penyebab
Masalah ini terjadi karena saat pengguna menonton ulang video yang sudah selesai, fungsi `saveProgressWhy()` menghitung ulang persentase progress berdasarkan posisi terakhir video, tanpa mempertimbangkan bahwa video tersebut sudah pernah selesai ditonton sebelumnya.

## Solusi
Solusi yang diterapkan adalah memodifikasi fungsi `saveProgressWhy()` di file `public/js/video-progress-why.js` untuk mempertahankan status completed (100%) jika video sudah pernah selesai ditonton sebelumnya.

### Perubahan yang Dilakukan

1. Menambahkan kondisi untuk memeriksa nilai `videoProgressWhy[currentVideoIndexWhy]` sebelum mengirim data ke server:

```javascript
// Jika video sudah pernah selesai (100%), pertahankan status completed
if (videoProgressWhy[currentVideoIndexWhy] >= 100) {
  progressPercentage = 100;
}
```

Dengan perubahan ini, jika video sudah pernah selesai ditonton (progress 100%), maka status completed akan dipertahankan meskipun pengguna menonton ulang video tersebut dan berhenti di tengah jalan.

## Manfaat
1. Progress keseluruhan pengguna tidak akan menurun meskipun pengguna menonton ulang video yang sudah selesai
2. Status completed pada video yang sudah selesai ditonton akan tetap dipertahankan
3. Pengalaman pengguna menjadi lebih baik karena progress tidak akan hilang

## Catatan Implementasi
Perubahan ini hanya mempengaruhi bagian frontend (JavaScript) dan tidak memerlukan perubahan pada database atau backend. Perubahan ini juga tidak mempengaruhi cara kerja sistem progress video secara keseluruhan, hanya memastikan bahwa status completed dipertahankan untuk video yang sudah pernah selesai ditonton.