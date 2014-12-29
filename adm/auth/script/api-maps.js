function initialize() {
      var map = new GMap2(document.getElementById("map"));
      map.setCenter(new GLatLng(50.114939, 15.756800), 13);
      map.openInfoWindowHtml(map.getCenter(), "<p><strong>Letní restaurace Macháč</strong><br />Čeperka 212<br /> 533 45 Opatovice nad Labem</p>");
                   
      // Select a map type which supports obliques
      map.setMapType(G_NORMAL_MAP);
      map.setUIToDefault();

      // Enable the additional map types within
      //the map type collection
      map.enableRotation();
    }