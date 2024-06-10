let listEl = null;

const init = () => {
    listEl = document.querySelector('ul');
    const centerLoc = [46.858859, 2.3470599];
    const map = L.map('map').setView(centerLoc, 6);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Récupérer les données des jardins depuis le serveur
    fetch('/jardins')
        .then(response => response.json())
        .then(data => {
            console.log('Data received from server:', data); // Ajoutez cette ligne pour déboguer
            const frag = document.createDocumentFragment();
            data.forEach(garden => {
                const liEl = document.createElement('li');
                liEl.innerText = garden.name;
                liEl.dataset.lat = garden.lat;
                liEl.dataset.lon = garden.lon;

                frag.appendChild(liEl);
                addMarkerToMap({
                    lat: garden.lat,
                    lon: garden.lon,
                    name: garden.name
                }, map);
            });

            listEl.appendChild(frag);

            listEl.addEventListener('click', ({ target }) => {
                if (target.nodeName !== 'LI') {
                    return;
                }
                const lat = Number(target.dataset.lat);
                const lon = Number(target.dataset.lon);

                map.flyTo([lat, lon], 11);
            });
        })
        .catch(error => {
            console.error('Erreur:', error);
        });
};

const addMarkerToMap = ({ lat, lon, name }, map) => {
    L.marker([lat, lon]).addTo(map)
        .bindPopup(name);
};

window.onload = init;