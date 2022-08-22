const pfDev__mapsGeolocation = {
  listCallbacks: [],

  async loadMapsData(url) {
    const postData = {
      action: 'pfdev__maps_geolocation'
    };

    const configFetch = {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json'
      },
      data: postData,
    }

    const response = await fetch(url, configFetch);

    return response;
  },

  buildMap(jsonData, containerId) {
    const elementRoot = document.getElementById('map');
    const mapOptions = {
      center: {
        lat: -34.397,
        lng: 150.644
      },
      zoom: 11,
      mapTypeId: 'roadmap', // roadmap, satellite, hybrid, terrain
    };

    this.map = new google.maps.Map(elementRoot, mapOptions);
  }
}