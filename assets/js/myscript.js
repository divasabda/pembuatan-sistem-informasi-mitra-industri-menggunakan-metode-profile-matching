const flashData = $('.flash-data').data('flashdata');
// console.log(flashData);
if (flashData) {
  Swal({
    title: 'USER DATA',
    text: 'BERHASIL '+ flashData,
    type: 'success'
  });
}

const flashAspek = $('.flash-aspek').data('flashdata');
// console.log(flashData);
if (flashAspek) {
  Swal({
    title: 'ASPEK',
    text: 'ASPEK BERHASIL '+ flashAspek,
    type: 'success'
  });
}

const flashSub = $('.flash-sub_aspek').data('flashdata');
// console.log(flashData);
if (flashSub) {
  Swal({
    title: 'SUB ASPEK',
    text: 'SUB ASPEK BERHASIL '+ flashSub,
    type: 'success'
  });
}

const flashNilaiBobot = $('.flash-n_bobot').data('flashdata');
// console.log(flashData);
if (flashNilaiBobot) {
  Swal({
    title: 'NILAI BOBOT',
    text: 'NILAI BOBOT BERHASIL '+ flashNilaiBobot,
    type: 'success'
  });
}

const flashPertanyaan = $('.flash-pertanyaan').data('flashdata');
// console.log(flashData);
if (flashPertanyaan) {
  Swal({
    title: 'PERTANYAAN',
    text: 'PERTANYAAN BERHASIL '+ flashPertanyaan,
    type: 'success'
  });
}

const flashHasil = $('.flash-hasil').data('flashdata');
// console.log(flashData);
if (flashHasil) {
  Swal({
    title: 'PERHITUNGAN',
    text: 'PERHITUNGAN BERHASIL !!  '+ flashHasil,
    type: 'success'
  });
}

const flashUser = $('.flash-user').data('flashdata');
// console.log(flashData);
if (flashUser) {
  Swal({
    title: 'OPPSS',
    text: 'USERNAME '+ flashUser,
    type: 'error'
  });
}

////// hapus data yang sudah dijalankan ////////
const flashError = $('.flash-error').data('flashdata');
// console.log(flashData);
if (flashError) {
  Swal({
    title: 'OPPSS',
    text: 'DATA '+ flashError,
    type: 'error'
  });
}


//////////// proyek ////////////////
const flashProyek = $('.flash-proyek').data('flashdata');
// console.log(flashData);
if (flashProyek) {
  Swal({
    title: 'PROYEK',
    text: 'BERHASIL '+ flashProyek,
    type: 'success'
  });
}

////////////// rab ////////////////
const flashRAB = $('.flash-rab').data('flashdata');
// console.log(flashData);
if (flashRAB) {
  Swal({
    title: 'RAB',
    text: 'BERHASIL '+ flashRAB,
    type: 'success'
  });
}

const flashDanaRAB = $('.flash-error_dana_rab').data('flashdata');
// console.log(flashData);
if (flashDanaRAB) {
  Swal({
    title: 'OPPSS',
    text: 'DANA RAB '+ flashDanaRAB,
    type: 'error'
  });
}




//////////// upload profile perusahaan ////////////////

const flashUpload = $('.flash-upload').data('flashdata');
// console.log(flashData);
if (flashUpload) {
  Swal({
    title: 'UPLOAD',
    text: 'UPLOAD PROFILE '+ flashUpload,
    type: 'success'
  });
}

////////// password ///////////////

const flashPass = $('.flash-pass').data('flashdata');
// console.log(flashData);
if (flashPass) {
  Swal({
    title: 'OPPSS',
    text: 'PASSWORD '+ flashPass,
    type: 'error'
  });
}

const flashPassBerhasil = $('.flash-pasberhasil').data('flashdata');
// console.log(flashData);
if (flashPassBerhasil) {
  Swal({
    title: 'BERHASIL',
    text: 'PASSWORD '+ flashPassBerhasil,
    type: 'success'
  });
}


///////////////// upload kegiatan //////////////////

const flashKegiatan = $('.flash-kegiatan').data('flashdata');
// console.log(flashData);
if (flashKegiatan) {
  Swal({
    title: 'UPLOAD',
    text: 'UPLOAD KEGIATAN '+ flashKegiatan,
    type: 'success'
  });
}