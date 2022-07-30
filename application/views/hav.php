  <button onclick="getLocation('masuk')"  class="btn btn-primary btn-sm btn-fill"> masuk</button>
   <button onclick="getLocation('keluar')"  class="btn btn-primary btn-sm btn-fill"> keluar</button>
   <input type="hidden" id="urlnya">

<script>
var url = '';
    function deg2rad(degrees) {
        var pi = Math.PI;
        return degrees * (pi / 180);
    }

	var ur = document.getElementById("urlnya");
    function getLocation(url) { //cek ijin geolokasi device
        if (navigator.geolocation) {
           navigator.geolocation.getCurrentPosition(showPosition);
		url = url;
		ur.value =url;
				
        } else {
          
			alert('Geolocation is not supported by this browser.');
        }
    }

    function haversine(lat, long) {
       var latitudeFrom = -6.9588769; //latitude tujuan
     var longitudeFrom = 109.0054753; //longitude tujuan
		
		
		//var latitudeFrom = -6.889760267846656; //latitude tujuan
      //  var longitudeFrom = 109.15834135252899; //longitude tujuan
		
        var earthRadius = 6371000;
        var latawal = deg2rad(latitudeFrom);
        var lonawal = deg2rad(longitudeFrom);
        var latakhir = deg2rad(lat);
        var lonakhir = deg2rad(long);
        var latDelta = latakhir - latawal;
        var lonDelta = lonakhir - lonawal;
        var angle = 2 * Math.asin(Math.sqrt(Math.pow(Math.asin(latDelta / 2), 2) +
            Math.cos(latawal) * Math.cos(latakhir) * Math.pow(Math.asin(lonDelta / 2), 2)));
        return angle * earthRadius;
    }

    function showPosition(position) {
        var a = haversine(position.coords.latitude, position.coords.longitude);
        hasil= Math.round(a * 100) / 1000;
		console.log(hasil);
		ke = ur.value;
		var base_url ="<?= base_url('pegawai/absensi/absen/?ket=') ?>";
		 if(hasil > 500){ 
		alert('lokasi anda harus berada dilingkungan sekolah');
		}else{
		window.location.replace(base_url+ke);
		}
	
    }
</script>