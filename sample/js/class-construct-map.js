class pfDev__mapsGeolocation {
  constructor(url, id) {
    this.action = 'pfdev__maps_geolocation';
    this.key = 'AIzaSyCt0pJI2Zr5qWyP00MrwHBkZ1hCZB0Wlzg';
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

  async buildMap() {
    const data = await this.loadMapsData();

    console.log(data.json);
  }

  init() {
    if (this.url) {
      this.loadMapsData();
    }
    return this;
  };
}