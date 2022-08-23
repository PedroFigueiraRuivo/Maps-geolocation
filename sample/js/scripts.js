import pfDev__mapsGeolocation from './modules/class-construct-map.js';

let pfdev__maps_geolocation__ajax = {
  url: 'http://127.0.0.1:5500/sample/data-config.json'
};

const map = new pfDev__mapsGeolocation(pfdev__maps_geolocation__ajax.url, 'map');
map.init();