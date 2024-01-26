$(document).ready(function () {
	$('#formLogin').validate({
		messages: {
			password: {
				required: "Password harus diisi"
			},
			username: {
				required: "Username harus diisi"
			},
		}
	});

	$('#formTambahQna').validate({
		messages: {
			pertanyaan: {
				required: "Pertanyaan harus diisi"
			},
			jawaban: {
				required: "Jawaban harus diisi"
			},
		}
	});

	$('#formTambahKontak').validate({
		rules: {
			nomer: {
				digits: true
			}
		},
		messages: {
			nama: {
				required: "Nama Kontak harus diisi"
			},
			nomer: {
				required: "Nomer Kontak harus diisi",
				digits: "Inputan harus berisi angka"
			},
			jabatan: {
				required: "Jabatan harus diisi"
			}
		}
	});

	$('#formTambahKegiatan').validate({
		messages: {
			judul: {
				required: "Judul Kegiatan harus diisi"
			},
			tgl_kegiatan: {
				required: "Tanggal Kegiatan harus diisi"
			},
			image: {
				required: "Thumbnail harus diisi"
			}
		}
	});
});
