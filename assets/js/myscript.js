const flashdata = $('.flash-data').data('flashdata');
// console.log(flashdata);

// jalankan sweel alert
if(flashdata){
  Swal.fire({
    title: "Data Mahasiswa",
    text: "berhasil " + flashdata,
    icon: "success"
  })
}


// untuk tombol hapus
$('.tombol-hapus').on('click', function(e){
  // matikan fungsi a href nya
  e.preventDefault();
  const href = $(this).attr('href'); // cari element yang bersangkutan (this) lalu ambil atributnya simpan ke dalam href 

  // jalankan sweet alert nya
  Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data mahasiswa akan dihapus",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus data'
  }).then((result) => {
    if (result.value) {  // jika tombol confirm ditekan jalankan ini
        document.location.href = href;
    }
  })
})