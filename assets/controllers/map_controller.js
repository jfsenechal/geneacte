import {Controller} from '@hotwired/stimulus';
import L from 'leaflet';

export default class extends Controller {

    static targets = ['result']
    static values = {
        name: String,
        latitude: String,
        longitude: String,
        drop: Boolean
    }

    connect() {
        let latitude = this.latitudeValue;
        let longitude = this.longitudeValue;

        if (latitude === '' || latitude === '') {
            latitude = 50.226484;
            longitude = 5.342961;
        }

        const center = [latitude, longitude];
        const map = L.map('openmap').setView(center, 16);
        const name = this.nameValue;

        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
            minZoom: 1,
            maxZoom: 20
        }).addTo(map);

        //bug icon url
        var customIcon = L.icon({
            iconUrl: '/bundles/expoacte/images/geolocation/990/marker-icon.png',
            shadowUrl: '/bundles/expoacte/images/geolocation/990/marker-shadow.png',
        });

        var marker = L.marker(center, {title: name, draggable: this.dropValue, icon:customIcon}).addTo(map);

        marker.addEventListener('dragend', () => {
            document.getElementById('geolocation_lat').value = marker.getLatLng().lat;
            document.getElementById('geolocation_lon').value = marker.getLatLng().lng;
        });
    }
}
