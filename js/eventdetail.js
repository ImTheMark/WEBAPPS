
$(document).ready(function() {
	address = $("#address").text();
	loadMap(address);
});

function loadMap(address){
	var map = new google.maps.Map(document.getElementById('map'), { 
       mapTypeId: google.maps.MapTypeId.ROADMAP,
       zoom: 15
   });

   var geocoder = new google.maps.Geocoder();

   geocoder.geocode({
      'address': address
   }, 
   function(results, status) {
      if(status == google.maps.GeocoderStatus.OK) {
         new google.maps.Marker({
            position: results[0].geometry.location,
            map: map
         });
         map.setCenter(results[0].geometry.location);
      }
      else {
         alert("Cant load map address");
      }
   });
}