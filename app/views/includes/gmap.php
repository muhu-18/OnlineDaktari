<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css' rel='stylesheet' />

<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js'></script>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css' type='text/css' />

<!-- Load the `mapbox-gl-geocoder` plugin. -->
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.css" type="text/css">



<script type="text/javascript">

    mapboxgl.accessToken = 'pk.eyJ1IjoiaGVybWl0ZXgiLCJhIjoiY2twOWxlM2pkMGY2aTJwbGw3Y3NkYTMzbiJ9.FU8pM1-GhV3KyA1IkbY32A';
    const map = new mapboxgl.Map({
        container: 'map', // Container ID
        style: 'mapbox://styles/mapbox/streets-v11', // Map style to use
        center: [36.81667, -1.28333], // Starting position [lng, lat]
        zoom: 5, // Starting zoom level
    });



    const marker = new mapboxgl.Marker({
        draggable: true
    })
        .setLngLat([37.8578818658854, 0.529862476788944])
        .addTo(map);

    function onDragEnd() {
        const lngLat = marker.getLngLat();
        document.getElementById('address').value = ``;
        document.getElementById('longitude').value = `Longitude: ${lngLat.lng}`;
        document.getElementById('latitude').value = `Latitude: ${lngLat.lat}`;
        // container.style.display = 'block';
        // coordinates.innerHTML = `Longitude: ${lngLat.lng}<br />Latitude: ${lngLat.lat}`;
    }

    marker.on('dragend', onDragEnd);



    const geocoder = new MapboxGeocoder({
//    initialize the geocoder
        accessToken: mapboxgl.accessToken, // Set access token
        mapboxgl: mapboxgl, // Set the mapbox-gl instance
        marker: true, // do not use the default marker

        placeholder: 'Search within Kenya only',

        bbox: [33.9221550890086,
            -4.78883429926756,
            41.9109408455007,
            5.03342194957399], //Boundary for kenya
        proximity: {
            longitude: 34.859619,
            latitude: 5.03342194957399,
        }
    });

    map.addControl(geocoder);

    console.log(geocoder);
    // Add geolocate control to the map.
    map.addControl(
        new mapboxgl.GeolocateControl({
            positionOptions: {
                enableHighAccuracy: true
            },
            // When active the map will receive updates to the device's location as it changes.
            trackUserLocation: true,
            // Draw an arrow next to the location dot to indicate which direction the device is heading.
            showUserHeading: true,
        })
    );


    map.on('load', () => {
        const lngLat = marker.getLngLat();
        document.getElementById('longitude').value = `Longitude: ${lngLat.lng}`;
        document.getElementById('latitude').value = `Latitude: ${lngLat.lat}`;
    });

    const geojson = {
        'type': 'FeatureCollection',
        'features': [
            {
                'type': 'Feature',
                'geometry': {
                    'type': 'Point',
                    'coordinates': [36.81667, -1.28333]
                }
            }
        ]
    };

    console.log(geojson)


</script>