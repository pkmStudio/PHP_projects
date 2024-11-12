// AJAX SendForm
function sendForm(method, url, body, json = true, text = false) {
    return fetch(url, {
        method: method,
        body: body
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error('Error');
            }
            if (json) {
                return response.json();
            }
            if (text) {
                return response.text();
            }
    })
        .catch((e) => {
            console.log(e);
            return {'status': 'error', 'errors': 'Запрос не удался, повторите позже'} ;
        });
}

// AJAX Pagination
async function switchPage(event) {
    event.preventDefault();
    let page = event.target.dataset.page;
    if (page) {
        let body = JSON.stringify({page: page});
        let data = await sendForm('POST', '/', body, false, true);
        document.querySelector('.table-responsive').innerHTML = data;
    }
}

// Add City CREATE;
async function addCity(event) {
    let form = new FormData(addCityForm);
    let data = await sendForm('POST', '/', form);

    event.preventDefault();
    btnAddSubmit.textContent = 'Saving..';
    btnAddSubmit.disabled = true;
    setTimeout(() =>{
        Swal.fire({
            icon: data.status,
            title: data.status,
            html: data?.errors
        });

        if (data.status ==='success') {
            addCityForm.reset();
        }
        btnAddSubmit.textContent = 'Save';
        btnAddSubmit.disabled = false;
    }, 1000);

}

// Edit City UPDATE;
async function editCity(event) {
    let form = new FormData(editCityForm);
    let data = await sendForm('POST', '/', form);

    event.preventDefault();
    btnEditSubmit.textContent = 'Saving..';
    btnEditSubmit.disabled = true;
    setTimeout(() =>{
        Swal.fire({
            icon: data.status,
            title: data.status,
            html: data?.errors
        });

        if (data.status ==='success') {
            let tr = document.querySelector(`#city-${form.get('id')}`);
            tr.querySelector('.name').innerHTML = form.get('name');
            tr.querySelector('.population').innerHTML = form.get('population');
        }
        btnEditSubmit.textContent = 'Save';
        btnEditSubmit.disabled = false;
    }, 1000);
}

async function getCity(event) {
    let id = event.target.dataset.id;
    console.log(event);
    if (id) {
        let body = JSON.stringify({id: id, action: 'getCity'});
        let data = await sendForm('POST', '/', body);

        if (data.status === 'success') {
            editCityForm.querySelector('#editName').value = data.city.name;
            editCityForm.querySelector('#editPopulation').value = data.city.population;
            editCityForm.querySelector('#idOfEditCity').value = data.city.id;
        }
        if (data.status === 'error') {
            Swal.fire({
                icon: data.status,
                title: data.status
            });
        }
}
}

async function deleteCity(event) {
    let id = event.target.dataset.id;
    if (id) {
        let body = JSON.stringify({id: id, action: 'deleteCity'})
        let data = await sendForm('POST', '/', body);

        Swal.fire({
            icon: data.status,
            title: data.status
        });

        if (data.status === 'success') {
            let tr = document.querySelector(`#city-${id}`);
            tr.remove();
        }
    }
}


const divTable = document.querySelector('.table-responsive');
const addCityForm = document.querySelector('#addCityForm');
const btnAddSubmit = document.querySelector('#btn-add-submit');
const editCityForm = document.querySelector('#editCityForm');
const btnEditSubmit = document.querySelector('#btn-edit-submit');

// Switch Page
divTable.addEventListener('click', (event) => {
    // Switch Page
    if (event.target.className === 'page-link') {
        switchPage(event);
    }

    // Get City
    if (event.target.classList.contains('btn-edit')) {
        getCity(event);
    }

    // Delete City
    if (event.target.classList.contains('btn-delete')) {
        deleteCity(event);
    }
})

// Add City
addCityForm.addEventListener('submit', addCity);

// Update City
editCityForm.addEventListener('submit', editCity);




