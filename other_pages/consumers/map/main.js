mapboxgl.accessToken = 'pk.eyJ1IjoiYmxhY2trNDUiLCJhIjoiY2twODZjb253MDV4djJ5b2diemh6dTFodCJ9.bM4Xwt3wL0whIyfOh39tpQ';

navigator.geolocation.getCurrentPosition(successLocation, errorLocation, {
  enableHighAccuracy: true
})

function successLocation(position){
     setupMap([position.coords.longitude, position.coords.latitude])
        
}

function errorLocation(position){
    setupMap([78.7047, 10.7905])
}

function setupMap(center) {
  const map = new mapboxgl.Map({
    container: "map",
    style: "mapbox://styles/mapbox/streets-v11",
    center: center,
    zoom: 10
  })
    map.addControl(new mapboxgl.NavigationControl());

//directions
  var directions = new MapboxDirections({
  accessToken: mapboxgl.accessToken
});
map.addControl(directions, 'top-left');
}




