<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">
<style>
      	-webkit-box-sizing:border-box;
	-moz-box-sizing:border-box;
	-ms-box-sizing:border-box;
	-o-box-sizing:border-box;
	box-sizing:border-box;
	outline:none;
	margin:0;
	padding:0;
}
.whatsapp-btn {
	cursor:pointer;
	position:fixed;
	bottom:90px;
	right:90px;
	display:block;
	width:90px;
	height:90px;
	border-radius:90px;
	text-indent:-9999px;
	background:#fff url(https://lh3.googleusercontent.com/-evFtor-f_w8/W4pfajfP17I/AAAAAAAAE9E/f7H52hrT5UoY4ZqdkxSGh2ZftYrH8fiDwCLcBGAs/s300/Whatsapp.png) no-repeat center center;
	background-size:50% auto;
	box-shadow:0 20px 25px rgba(0,0,0,.05);
	transition:.2s;
}
.whatsapp-btn:active {
	bottom:35px;
}
#whatsapp {
	position:fixed;
	z-index:+100;
	bottom:0px;
	right:0px;
	display:block;
	background:#fff;
	box-shadow:0 20px 25px rgba(000);
	max-width:-webkit-fill-available;
	font-family:Helvetica, sans-serif;
	font-size:90%;
	border-radius:4px;
	visibility:hidden;
	opacity:0;
	transition:.3s;
}
#whatsapp.toggle {
    font-size: 100%;
    padding: 1px;
    position: relative;
    visibility: initial;
    opacity: unset;
}
@media(max-width:320px) {
	.whatsapp-btn {
		bottom:10px;
		right:10px;
	}
	#whatsapp.toggle {
		bottom:80px;
		right:10px;
		visibility:visible;
		opacity:1;
	}
}
#whatsapp label,
#whatsapp a {
	display:block;
	margin:15px;
	text-decoration:none;
}
#whatsapp input,
#whatsapp textarea {
	display:block;
	border:1px solid #21811a;
	box-shadow:inset 0 2px 5px #ffffff00;
	width:100%;
	padding:15px;
	border-radius:2px;
}
#whatsapp input.nama {
	text-transform:capitalize;
}
#whatsapp input:focus,
#whatsapp textarea:focus {
	border:1px solid #ddd;
}
#whatsapp textarea {
	min-height:80px;
	resize: none;
}
#whatsapp a {
	cursor:pointer;
	display:block;
	padding:10px;
	font-weight:bold;
	text-align:center;
	background:#25D366;
	color:white;
	border-radius:2px;
}
#whatsapp a:hover {
	background:#20b558;
            }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div id="whatsapp" class="toggle">

<input class="tujuan" type="hidden" value="085740035497" /> <!-- No. WhatsApp -->

<label>Nama :
<input class="nama" type="text" placeholder="Tulis Nama Lengkap." />
</label>
<label>Alamat :
<input class="alamat" type="alamat" placeholder="contoh : Jl.Tamansari I RT 002/008 No.1 Kel.Pekayon Kec.Ps Rebo Jak Tim." />
</label>
<label>Nomor telepon :
<input class="nomor" type="nomor" placeholder="contoh : 082225204112.." />
</label>
<label>Jumlah order / paket :
<textarea class="pesan" placeholder="contoh: 1 paket mainan pintar ebook.."></textarea>
</label>
<a class="submit">> KIRIM WHATSAPP</a>

</div>

    <script>
 $('.whatsapp-btn').click(function(){
	$('#whatsapp').toggleClass('toggle');
});
// Onclick Whatsapp Sent!
$('#whatsapp .submit').click(WhatsApp);

$("#whatsapp input, #whatsapp textarea").keypress(function() {
	if (event.which == 13) WhatsApp();
});
var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
function WhatsApp() {
	var ph = '';
	if ($('#whatsapp .nama').val() == '') { // Cek Nama
		ph = $('#whatsapp .nama').attr('placeholder');
		alert('Silahkan tulis ' + ph);
		$('#whatsapp .nama').focus();
		return false;
	} else if ($('#whatsapp .alamat').val() == '') { // Cek alamat
		ph = $('#whatsapp .alamat').attr('placeholder');
		alert('Silahkan tulis ' + ph);
		$('#whatsapp .alamat').focus();
		return false;
	} else if ($('#whatsapp .nomor').val() == '') { // Cek Nomor
		ph = $('#whatsapp .nomor').attr('placeholder');
		alert('Silahkan tulis ' + ph);
		$('#whatsapp .nomor').focus();
		return false;
	} else if ($('#whatsapp .pesan').val() == '') { // Cek Pesan
		ph = $('#whatsapp .pesan').attr('placeholder');
		alert('Silahkan tulis ' + ph);
		$('#whatsapp .pesan').focus();
		return false;
	} else {
		if (!confirm("Kirim Ke WhatsApp?")) {
			window.open("https://www.whatsapp.com/download/");
		} else {
			// Check Device (Mobile/Desktop)
			var url_wa = 'https://web.whatsapp.com/send';
			if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
				url_wa = 'whatsapp://send/';
			}
			// Get Value
			var tujuan = $('#whatsapp .tujuan').val(),
					via_url = location.href,
					nama = $('#whatsapp .nama').val(),
					alamat = $('#whatsapp .alamat').val(),
                    nomor = $('#whatsapp .nomor').val(),
					pesan = $('#whatsapp .pesan').val();
			$(this).attr('href', url_wa + '?phone=62 ' + tujuan + '&text=Halo admin saya mau order, saya *' + nama + '* %0A%0AAlamat:%20' + alamat +' %0A%0ANo.tlp:%20'+ nomor + ' %0A%0APaket:%20' + pesan + '%0A%0AMohon dibantu total dan cara pembayarannya kak');
			var w = 960,
					h = 540,
					left = Number((screen.width / 2) - (w / 2)),
					tops = Number((screen.height / 2) - (h / 2)),
					popupWindow = window.open(this.href, '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=1, copyhistory=no, width=' + w + ', height=' + h + ', top=' + tops + ', left=' + left);
			popupWindow.focus();
			return false;
		}
	}
}
</script>

</body>
</html>