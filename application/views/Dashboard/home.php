<style>
    #mapid {
        height: 700px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div id="mapid"></div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>
<!---- maps -->
<script>
    var mymap = L.map('mapid').setView([-5.397140, 105.266792], 12);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        accessToken: 'pk.eyJ1IjoiZHdpcjQiLCJhIjoiY2syeGZhOG0zMGFjMjNuczg1MXJ1M3ptayJ9.m4xcIOu0VAbXgcmXqHnWDQ'
    }).addTo(mymap);

    var locations = <?php echo JSON_encode($dataspbu); ?>;
    console.log(locations)

    var icon = <?php echo JSON_encode(base_url('gambar_spbu/broadcast.png')); ?>;
    var greenIcon = L.icon({
        iconUrl: icon,
        iconSize: [40, 40], // size of the icon
        shadowSize: [150, 164], // size of the shadow
        iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62],  // the same for the shadow
        popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
    });
    // specify popup options
    var customOptions =
        {
            'maxWidth': '500',
            'className': 'custom'
        };

    for (var i = 0; i < locations.length; i++) {
        var image = <?php echo JSON_encode(base_url('gambar_spbu/')); ?> +locations[i].gambar;
        var customPopup = "<b>Nama : </b>" + locations[i].nama + "<br><b>Alamat : </b>" + locations[i].alamat + "<br/><img src='"+image+"' align='center' alt='maptime logo gif' width='100px'/>";

        marker = new L.marker([locations[i].lati, locations[i].longi], {icon: greenIcon})
            .bindPopup(customPopup, customOptions)
            .addTo(mymap);
    }
</script>


