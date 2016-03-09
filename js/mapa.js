function load() {
  console.log("cargado");
    var map = new google.maps.Map(document.getElementById("googleMap"), {
      center: new google.maps.LatLng(42.822410654302125,-1.6459033203125273),
      zoom: 7,
      mapTypeId: 'roadmap'
    });
    var infoWindow = new google.maps.InfoWindow;
    
    downloadUrl("",function(data) {
      '"'<?php echo 'hola';?>'"';
        console.log(data);
        
        var marker = new google.maps.Marker({
          map: map,
          position: point,
          icon: icon
        });
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

  google.maps.event.addDomListener(window, 'load', load);