<?php

/* @var $this yii\web\View */

$this->title = 'AR_home';
?>



<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-md-12">
                 <h1><i>ARHome</i>-Pemetaan Kontrakan dan Kos</h1> 
                 <br>

<body onload="load()">
<div id="map"></div>
</body>  
            </div>

        </div>

    </div>
</div>


<!-- Script untuk menampilkan Maps -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1H72Fojan6yCxKf5DhNXD1Er4Y60ngWU"></script>
 
 <style>
 h1 {text-align:left;}
           html, body {
                }
           #map {
                width: 100%;
                height: 540px;
                border: 0px solid white;
           }
 </style>
 <script type="text/javascript">
 
 var customIcons = {
 
   // icon di sini di non aktifkan karna, icon di definisikan di method load() agar mengikuti kategori
   // icon: '<?php echo Yii::$app->request->baseUrl;?>/files/markers/'+id_+'.png',
   shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
 };
 
 function load() {
 var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat : 0.498498, lng : 101.403993},
          zoom: 14,
          styles: [
            {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
            {
              featureType: 'administrative.locality',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'geometry',
              stylers: [{color: '#263c3f'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'labels.text.fill',
              stylers: [{color: '#6b9a76'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [{color: '#38414e'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry.stroke',
              stylers: [{color: '#212a37'}]
            },
            {
              featureType: 'road',
              elementType: 'labels.text.fill',
              stylers: [{color: '#9ca5b3'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [{color: '#746855'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry.stroke',
              stylers: [{color: '#1f2835'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [{color: '#f3d19c'}]
            },
            {
              featureType: 'transit',
              elementType: 'geometry',
              stylers: [{color: '#2f3948'}]
            },
            {
              featureType: 'transit.station',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'water',
              elementType: 'geometry',
              stylers: [{color: '#17263c'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.fill',
              stylers: [{color: '#515c6d'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.stroke',
              stylers: [{color: '#17263c'}]
            }
          ]
        });
 var infoWindow = new google.maps.InfoWindow;
 
 // Bagian ini digunakan untuk mendapatkan data format XML yang dibentuk dalam actionDataLokasi
 downloadUrl("<?php echo Yii::$app->request->baseUrl;?>/../api/v1/kontrakan/get-all-markers", function(data) {
   var xml = data.responseXML;
   var markers = xml.documentElement.getElementsByTagName("marker");
   for (var i = 0; i < markers.length; i++) {
 
   var id_kontrakan = markers[i].getAttribute("id_kontrakan");
   var nama = markers[i].getAttribute("nama");
   var deskripsi = markers[i].getAttribute("deskripsi");
   var foto = markers[i].getAttribute("foto");
   var foto_2 = markers[i].getAttribute("foto_2");
   var foto_3 = markers[i].getAttribute("foto_3");
   var harga = markers[i].getAttribute("harga");
   var foto = markers[i].getAttribute("foto");
   var altitude = markers[i].getAttribute("altitude");
   var latitude = markers[i].getAttribute("latitude");
   var longitude = markers[i].getAttribute("longitude");
   var rating = markers[i].getAttribute("rating");
   var status = markers[i].getAttribute("status");
   var waktu = markers[i].getAttribute("waktu");

   
       //#429ADB biru
 
     var point = new google.maps.LatLng(
         parseFloat(latitude),
         parseFloat(longitude)
         );
         
     var html = "<a target='blank' href='kontrakan/"+ id_kontrakan +"'><b>" +nama+" #" +harga+ "</b><br/><br/><b>" + foto + "</b><br/><div align='left'>"+ status +"<br/>"+waktu+" </a></div>";
     var icon = customIcons;
     var marker = new google.maps.Marker({
       map: map,
       position: point,
       
       icon: '<?php echo Yii::$app->request->baseUrl;?>/files/markers/kontrakan.png',
       shadow: customIcons.shadow
     });
     console.log(point);
     bindInfoWindow(marker, map, infoWindow, html);
   }
 });
 }
 
 function bindInfoWindow(marker, map, infoWindow, html) {
 google.maps.event.addListener(marker, 'click', function() {
   infoWindow.setContent(html);
   infoWindow.open(map, marker);
 });
 }
 
 function downloadUrl(url, callback) {
 var request = window.ActiveXObject ?
     new ActiveXObject('Microsoft.XMLHTTP') :
     new XMLHttpRequest;
 
 request.onreadystatechange = function() {
   if (request.readyState == 4) {
     request.onreadystatechange = doNothing;
     callback(request, request.status);
   }
 };
 
 request.open('GET', url, true);
 request.send(null);
 }
 
 function doNothing() {}
 
 </script>