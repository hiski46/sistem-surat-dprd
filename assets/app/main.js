$(document).ready(function () {
	getNotification();

	setInterval(() => {
		// $("#body_notif").empty();
		getNotification();
	}, 10000);
});

function convertTanggal(date, param_hari = false, param_waktu = false) {
	var date = new Date(date);
	var tahun = date.getFullYear();
	var bulan = date.getMonth();
	var tanggal = date.getDate();
	var hari = date.getDay();

	var jam = date.getHours();
	var menit = date.getMinutes();
	var detik = date.getSeconds();

	switch (hari) {
		case 0:
			hari = "Minggu";
			break;
		case 1:
			hari = "Senin";
			break;
		case 2:
			hari = "Selasa";
			break;
		case 3:
			hari = "Rabu";
			break;
		case 4:
			hari = "Kamis";
			break;
		case 5:
			hari = "Jum'at";
			break;
		case 6:
			hari = "Sabtu";
			break;
	}

	switch (bulan) {
		case 0:
			bulan = "Januari";
			break;
		case 1:
			bulan = "Februari";
			break;
		case 2:
			bulan = "Maret";
			break;
		case 3:
			bulan = "April";
			break;
		case 4:
			bulan = "Mei";
			break;
		case 5:
			bulan = "Juni";
			break;
		case 6:
			bulan = "Juli";
			break;
		case 7:
			bulan = "Agustus";
			break;
		case 8:
			bulan = "September";
			break;
		case 9:
			bulan = "Oktober";
			break;
		case 10:
			bulan = "November";
			break;
		case 11:
			bulan = "Desember";
			break;
	}

	if (param_hari == false && param_waktu == false) {
		return tanggal + " " + bulan + " " + tahun;
	} else if (param_hari == false && param_waktu == true) {
		return (
			tanggal +
			" " +
			bulan +
			" " +
			tahun +
			" " +
			set(jam) +
			":" +
			set(menit) +
			":" +
			set(detik)
		);
	} else if (param_hari == true && param_waktu == true) {
		return (
			hari +
			", " +
			tanggal +
			" " +
			bulan +
			" " +
			tahun +
			" " +
			set(jam) +
			":" +
			set(menit) +
			":" +
			set(detik)
		);
	} else {
		return hari + ", " + tanggal + " " + bulan + " " + tahun;
	}
}

function set(e) {
	e = e < 10 ? "0" + e : e;
	return e;
}

function getNotification() {
	$.ajax({
		type: "post",
		url: site_url + "surat/Dashboard/getNotification",
		dataType: "json",
		success: function (response) {
			if (response.total_notif <= 0) {
				$("#badge_total_notif").hide();
				$("#total_notif").html("0 Notifications");
				$("#body_notif").html(
					'<div class="text-center"><small>Belum Ada Notifikasi</small></div>'
				);
			} else {
				$("#badge_total_notif").html(response.total_notif);
				$("#total_notif").html(response.total_notif + " Notifications");

				var notifikasi = response.notifikasi;
				var text_tipe_surat = "";
				var html = ``;
				$.each(notifikasi, function (key, value) {
					if (value.tipe_surat == "masuk") {
						text_tipe_surat = "Disposisi Surat Masuk";
					} else if (value.tipe_surat == "masuk") {
						text_tipe_surat = "Disposisi Surat Keluar";
					} else {
						text_tipe_surat = "Disposisi Surat Internal";
					}

					html +=
						`<div class="dropdown-divider"></div>
							<a href="` +
						site_url +
						`surat/Surat/detail_surat/` +
						value.sec_id_surat +
						`" class="dropdown-item" onclick="readNotifikasi(` +
						value.id +
						`)">
								<span class="float-right text-muted text-sm">` +
						convertTanggal(value.time) +
						`</span>
								<i class="fas fa-envelope mr-2"></i> ` +
						text_tipe_surat +
						`<br><small class ="font-weight-bold">Dari : ` +
						value.from +
						`</small><br><small class ="font-weight-bold">Kepada : ` +
						value.to +
						`</small></a>`;
				});
				$("#body_notif").html(html);
			}
		},
	});
}

function readNotifikasi(id) {
	$.ajax({
		type: "post",
		url: site_url + "surat/Dashboard/readNotifikasi",
		data: {id: id},
		dataType: "json",
		success: function () {
			console.log('dada');
		}
	});
}
