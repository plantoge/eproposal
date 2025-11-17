function prosesRupiah(data, prefix){
  var angkaString   = data.toString();
  var number_string = angkaString.replace(/[^,\d]/g, "").toString();
  var split         = number_string.split(",");
  var sisa          = split[0].length % 3;
  var rupiah        = split[0].substr(0, sisa);
  var ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
      separator = sisa ? "." : "";
      rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? rupiah : "";
}



// var rupiah = document.getElementById("rupiah");

// rupiah.addEventListener("keyup", function(e) {
//     // console.log(this.value);
//   // tambahkan 'Rp.' pada saat form di ketik
//   // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
//   rupiah.value = formatRupiah(this.value, "Rp. ");
// });

// /* Fungsi formatRupiah */
// function formatRupiah(angka, prefix) {
  
//   var number_string = angka.replace(/[^,\d]/g, "").toString(),
//     split = number_string.split(","),
//     sisa = split[0].length % 3,
//     rupiah = split[0].substr(0, sisa),
//     ribuan = split[0].substr(sisa).match(/\d{3}/gi);

//   // tambahkan titik jika yang di input sudah menjadi angka ribuan
//   if (ribuan) {
//     separator = sisa ? "." : "";
//     rupiah += separator + ribuan.join(".");
//   }

//   rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
//   return prefix == undefined ? rupiah : rupiah ? rupiah : "";
// //   return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
// }