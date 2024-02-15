console.log("readily.com/admin/delivery-options")

setEventsForDeliveryTypesPage();
setTableZebra();
setEventsForDeliveryTypesTable();

function setEventsForDeliveryTypesPage(){
    $(document).on('blur','#delivery-type-name',()=>{
        checkInputElementWithRegex(/^[A-ZŠĐĆČŽ][a-zšđčćž]{2,}( [A-ZŠĐĆČŽ][a-zšđčćž]{2,})*$/,'delivery-type-name','delivery-type-name-error');
    })

    $(document).on('click','#cancel-button',()=>{
        document.getElementById('delivery-type-name-error').style.display = 'none';
        document.getElementById('delivery-type-name').value = '';
        document.getElementById('delivery-type-form').style.display = 'none';
        let inputElement = document.getElementById('delivery-type-id');
        inputElement.setAttribute('value','0');
    });

    $(document).on('click','#add-delivery-type-button',()=>{
        document.getElementById('delivery-type-form').style.display = 'block';
        let inputElement = document.getElementById('delivery-type-id');
        inputElement.setAttribute('value','0');
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    $(document).on('click','#save-button',()=>{
        let form = document.getElementById('delivery-type-form');
        let errorCount = 0;
        errorCount += checkInputElementWithRegex(/^[A-ZŠĐĆČŽ][a-zšđčćž]{2,}( [A-ZŠĐĆČŽ][a-zšđčćž]{2,})*$/,'delivery-type-name','delivery-type-name-error');

        if(errorCount){
            return;
        }

        sendDeliveryTypeForm(form);
    });
}

function setEventsForDeliveryTypesTable(){
    let deleteDeliveryTypes = document.querySelectorAll('.delete-delivery-type');
    deleteDeliveryTypes.forEach(deleteDeliveryType => {
        deleteDeliveryType.addEventListener('click', () => {
            let form = deleteDeliveryType.closest('form');
            sendDeleteDeliveryTypeForm(form);
        });
    });

    let activateDeliveryTypes = document.querySelectorAll('.activate-delivery-type');
    activateDeliveryTypes.forEach(activateDeliveryType => {
        activateDeliveryType.addEventListener('click', () => {
            let form = activateDeliveryType.closest('form');
            sendActivateDeliveryTypeForm(form);
        });
    });

    let changeLinks = document.querySelectorAll('.change-links');
    changeLinks.forEach(link=>{
        link.addEventListener('click',()=>{
            let deliveryTypeId = link.getAttribute('data-delivery-type-id');
            let deliveryTypeName = link.getAttribute('data-delivery-type-name');

            let inputId = document.getElementById('delivery-type-id');
            let inputName = document.getElementById('delivery-type-name');

            inputId.setAttribute('value',deliveryTypeId);
            inputName.value = deliveryTypeName;
            document.getElementById('delivery-type-form').style.display = 'block';
        })
    })
}

function sendDeliveryTypeForm(form){
    let formData = new FormData(form);

    $.ajax({
        url: 'models/delivery/add-update-delivery-type.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {

            let serverMessagesContainer = document.querySelector('.server-messages');
            serverMessagesContainer.style.display = 'none';
            document.getElementById('delivery-type-name').value = '';
            document.getElementById('delivery-type-form').style.display = 'none';
            let inputElement = document.getElementById('delivery-type-id');
            inputElement.setAttribute('value','0');

            populateDeliveryTypesTables(response);
        },
        error: function(xhr, status, errorThrown) {
            let messages = JSON.parse(xhr.responseText);
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            let serverMessagesContainer = document.querySelector('.server-messages');
            serverMessagesContainer.style.display = 'block';
            displayServerMessages('server-messages',messages,'error-message');

            console.log(messages)
            console.log(xhr);
            console.log(status, errorThrown);
        }
    });
}

function sendDeleteDeliveryTypeForm(form){
    let formData = new FormData(form);

    $.ajax({
        url: 'models/delivery/delete-delivery-type.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            let element = document.querySelector('.server-messages');
            element.style.display = 'none';
            populateDeliveryTypesTables(response);
        },
        error: function(xhr, status, errorThrown) {
            let messages = JSON.parse(xhr.responseText);
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            let element = document.querySelector('.server-messages');
            element.style.display = 'block';
            displayServerMessages('server-messages',messages,'error-message');

            console.log(messages)
            console.log(xhr);
            console.log(status, errorThrown);
        }
    });
}

function sendActivateDeliveryTypeForm(form){
    let formData = new FormData(form);

    $.ajax({
        url: 'models/delivery/activate-delivery-type.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            let element = document.querySelector('.server-messages');
            element.style.display = 'none';
            populateDeliveryTypesTables(response);
        },
        error: function(xhr, status, errorThrown) {
            let messages = JSON.parse(xhr.responseText);
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            let element = document.querySelector('.server-messages');
            element.style.display = 'block';
            displayServerMessages('server-messages',messages,'error-message');

            console.log(messages)
            console.log(xhr);
            console.log(status, errorThrown);
        }
    });
}

function populateDeliveryTypesTables(deliveryTypes){
    let activeDeliveryTypes = deliveryTypes[0].activeDeliveryTypes;
    let deletedDeliveryTypes = deliveryTypes[0].deletedDeliveryTypes;

    let activeDeliveryTypesTable = document.querySelector('#table-active-delivery-types tbody');
    let deletedDeliveryTypesTable = document.querySelector('#table-deleted-delivery-types tbody');

    while(activeDeliveryTypesTable.firstChild)activeDeliveryTypesTable.removeChild(activeDeliveryTypesTable.firstChild);
    while(deletedDeliveryTypesTable.firstChild)deletedDeliveryTypesTable.removeChild(deletedDeliveryTypesTable.firstChild);


    activeDeliveryTypes.forEach(deliveryType=>{
        let trTag = document.createElement('tr');

        let tdTagName = document.createElement('td');
        let tdTagOrderCount = document.createElement('td');
        let tdTagCreatedAt = document.createElement('td');
        let tdTagChange = document.createElement('td');
        let tdTagDelete = document.createElement('td');

        tdTagName.textContent = deliveryType.name;
        tdTagOrderCount.textContent = deliveryType.order_count;
        tdTagCreatedAt.textContent = deliveryType.created_at;

        let aTag = document.createElement('a');
        aTag.classList.add('safe-option','change-links');
        aTag.setAttribute('data-delivery-type-id',deliveryType.id);
        aTag.setAttribute('data-delivery-type-name',deliveryType.name);
        aTag.textContent = 'Change';
        aTag.setAttribute('href',`#`);
        tdTagChange.appendChild(aTag);

        let formDelete = document.createElement('form');

        let inputDeliveryTypeIdDelete = document.createElement('input');
        inputDeliveryTypeIdDelete.setAttribute('type','text');
        inputDeliveryTypeIdDelete.setAttribute('name','delivery-type-id');
        inputDeliveryTypeIdDelete.style.display = 'none';
        inputDeliveryTypeIdDelete.value = deliveryType.id;

        let inputButtonDelete = document.createElement('input');
        inputButtonDelete.setAttribute('type','button');
        inputButtonDelete.classList.add('danger-option','delete-delivery-type');
        inputButtonDelete.value = 'Delete';

        formDelete.appendChild(inputDeliveryTypeIdDelete);
        formDelete.appendChild(inputButtonDelete);
        tdTagDelete.appendChild(formDelete);

        trTag.appendChild(tdTagName);
        trTag.appendChild(tdTagOrderCount);
        trTag.appendChild(tdTagCreatedAt);
        trTag.appendChild(tdTagChange);
        trTag.appendChild(tdTagDelete);

        activeDeliveryTypesTable.appendChild(trTag);
    })


    deletedDeliveryTypes.forEach(deliveryType=>{
        let trTag = document.createElement('tr');

        let tdTagName = document.createElement('td');
        let tdTagOrderCount = document.createElement('td');
        let tdTagDeletedAt = document.createElement('td');
        let tdTagChange = document.createElement('td');
        let tdTagActivate = document.createElement('td');

        tdTagName.textContent = deliveryType.name;
        tdTagOrderCount.textContent = deliveryType.order_count;
        tdTagDeletedAt.textContent = deliveryType.deleted_at;

        let aTag = document.createElement('a');
        aTag.setAttribute('data-delivery-type-id',deliveryType.id);
        aTag.setAttribute('data-delivery-type-name',deliveryType.name);
        aTag.classList.add('safe-option','change-links');
        aTag.textContent = 'Change';
        aTag.setAttribute('href',`#`);
        tdTagChange.appendChild(aTag);

        let formActivate = document.createElement('form');

        let inputDeliveryTypeIdActivate = document.createElement('input');
        inputDeliveryTypeIdActivate.setAttribute('type','text');
        inputDeliveryTypeIdActivate.setAttribute('name','delivery-type-id');
        inputDeliveryTypeIdActivate.style.display = 'none';
        inputDeliveryTypeIdActivate.value = deliveryType.id;

        let inputButtonActivate = document.createElement('input');
        inputButtonActivate.setAttribute('type','button');
        inputButtonActivate.classList.add('safe-option','activate-delivery-type');
        inputButtonActivate.value = 'Activate';

        formActivate.appendChild(inputDeliveryTypeIdActivate);
        formActivate.appendChild(inputButtonActivate);
        tdTagActivate.appendChild(formActivate);

        trTag.appendChild(tdTagName);
        trTag.appendChild(tdTagOrderCount);
        trTag.appendChild(tdTagDeletedAt);
        trTag.appendChild(tdTagChange);
        trTag.appendChild(tdTagActivate);

        deletedDeliveryTypesTable.appendChild(trTag);
    })

    setEventsForDeliveryTypesTable();
    setTableZebra();
}
