import { Loader } from 'https://cdn.pika.dev/google-maps';

export default class pfDev__mapsGeolocation {
  constructor(url, id) {
    this.action = 'pfdev__maps_geolocation';
    this.url = url;
    this.id = id;
  }

  async loadMapsData() {    
    const configFetch = {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json'
      },
      data: {
        action: this.action
      }
    }

    if (this.url) {
      const response = await fetch(this.url, configFetch);
      const json = await response.json();
      return {response, json};
    }
  }

  async createMap(apiKey, { coords, zoom }) {
    this.loader = new Loader(apiKey);
    this.google = await this.loader.load();
    
    this.map = new this.google.maps.Map(document.getElementById(this.id), {
      center: {lat: coords.lat, lng: coords.lng},
      zoom: zoom,
      mapTypeId: 'roadmap', // roadmap, satellite, hybrid, terrain
    });
  }

  getLocation() {
    const { message, zoom } = this.json.userDatas;
    const infoWindow = new this.google.maps.InfoWindow();

    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };

          infoWindow.setPosition(pos);
          infoWindow.setContent(message);
          infoWindow.open(this.map);
          this.map.setCenter(pos);
          this.map.setZoom(zoom);
        },
        () => {
          handleLocationError(true, this.infoWindow, this.map.getCenter());
        }
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, this.infoWindow, this.map.getCenter());
    }
  }

  createButtonGetLocation() {
    const { textButton } = this.json.defaultDatas;

    const locationButton = document.createElement("button");
    locationButton.textContent = textButton;
    locationButton.classList.add("map-info__notif__button");
    document.querySelector('[pfDev--pWP-mg="box-notification"]').appendChild(locationButton);

    locationButton.addEventListener("click", this.getLocation);
  }

  addKmlLayer() {
    const { url } = this.json.defaultDatas;

    console.log(this.google.maps);

    const kmlLayer = new this.google.maps.KmlLayer(url, {
      suppressInfoWindows: true,
      preserveViewport: false,
      map: this.map,
    });

    kmlLayer.addListener('click', function(event) {
      console.log(kmlLayer);
      console.log(event.latLng);
      const content = event.featureData.infoWindowHtml;
      const testimonial = document.querySelector('[pfDev--pWP-mg="box-list-closest"]');
      testimonial.innerHTML = content;
      console.log('oi');
      console.log(content);
    });
  }

  async buildMap() {
    const data = await this.loadMapsData();
    this.json = data.json;
    
    const { apiKey, defaultDatas } = this.json;
    
    await this.createMap(apiKey, defaultDatas);
    this.addKmlLayer();
    
    this.getLocation();
    this.createButtonGetLocation();
  }

  bind() {
    this.getLocation = this.getLocation.bind(this);
  }
  
  init() {
    if (this.url) {
      this.bind();
      this.buildMap();
    }
    return this;
  };
}