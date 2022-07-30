<div class="container-fluid">

  <!-- Page Heading -->
  <?= $this->session->flashdata('response');?>
  
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Absen Harian</h4>
                <input type="hidden" id="urlnya">
                <input type="hidden" id="long" value="<?= $lokasi['longitude']; ?>">
                <input type="hidden" id="lat" value="<?= $lokasi['latitude']; ?>">
            </div>
            <div class="card-body">
                <table class="table w-100">
                    <thead>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Absen Masuk</th>
                        <th>Absen Pulang</th>
                    </thead>
                    <tbody>
                        <tr>
                            <?php if(is_weekend()): ?>
                                <td class="bg-light text-danger" colspan="4">Hari Ini Libur. Tidak Perlu Absen</td>
                            <?php else: ?>
                                <td><i class="ml-3 fas fa-<?php if ($absensi==null) {
                                    echo "exclamation-circle text-warning";
                                 } else {
                                    if($absensi['jam_pulang'] == "00:00:00")
                                    {echo "exclamation-circle text-warning";}
                                    else{
                                        echo "check-circle text-success";
                                    }
                                 } ?>"></i></td>
                                <td><?= date('d-m-Y') ?></td>
                                <td>
                                    <button onclick="getLocation('masuk')"  class="btn btn-primary btn-sm btn-fill <?= ($absen == 1 ||$absen != null) ? ' disabled style="cursor:not-allowed"' : '' ?>">Absen Masuk</button>
                                </td>
                                <td>
                                 <button onclick="getLocation('pulang')" class="btn btn-success btn-sm btn-fill <?php if ($absensi==null ) {
                                    echo " disabled style='cursor:not-allowed'";
                                 } else {
                                    if($absensi['jam_pulang'] == "00:00:00")
                                    {echo "";}
                                    else{
                                        echo " disabled style='cursor:not-allowed'";
                                    } 
                                 }?>">Absen Pulang</button>
                                </td>
                            <?php endif; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
var url = '';
    function deg2rad(degrees) {
        var pi = Math.PI;
        return degrees * (pi / 180);
    }

	var ur = document.getElementById("urlnya");
	var lati = document.getElementById("lat");
    var longti = document.getElementById("long");
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
        latitudeFrom = lati.value;
        longitudeFrom = longti.value;
    //   var latitudeFrom = -6.868490717375114; //latitude tujuan
    //  var longitudeFrom =  109.1072801574728; //longitude tujuan
		
		
// 		var latitudeFrom = -6.889760267846656; //latitude tujuan
        // var longitudeFrom = 109.15834135252899; //longitude tujuan
		
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