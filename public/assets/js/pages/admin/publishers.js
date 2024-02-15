console.log("readily.com/admin/publishers")

setEventsForPublisherPage();
setTableZebra();
setEventsForPublisherTable();

function setEventsForPublisherPage(){
    $(document).on('blur','#publisher-name',()=>{
        checkInputElementWithRegex(/^[A-ZŠĐĆČŽ][a-zšđčćž']{2,}( [A-ZŠĐĆČŽ][a-zšđčćž']{2,})*$/,'publisher-name','publisher-name-error');
    })

    $(document).on('click','#cancel-button',()=>{
        document.getElementById('publisher-name-error').style.display = 'none';
        document.getElementById('publisher-name').value = '';
        document.getElementById('publisher-form').style.display = 'none';
        let inputElement = document.getElementById('publisher-id');
        inputElement.setAttribute('value','0');
    });

    $(document).on('click','#add-publisher-button',()=>{
        document.getElementById('publisher-form').style.display = 'block';
        let inputElement = document.getElementById('publisher-id');
        inputElement.setAttribute('value','0');
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    $(document).on('click','#save-button',()=>{
        let form = document.getElementById('publisher-form');
        let errorCount = 0;
        errorCount += checkInputElementWithRegex(/^[A-ZŠĐĆČŽ][a-zšđčćž']{2,}( [A-ZŠĐĆČŽ'][a-zšđčćž]{2,})*$/,'publisher-name','publisher-name-error');

        if(errorCount){
            return;
        }

        sendPublisherForm(form);
    });
}

function sendPublisherForm(form){
    let formData = new FormData(form);

    $.ajax({
        url: 'models/publisher/add-update-publisher.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            let serverMessagesContainer = document.querySelector('.server-messages');
            serverMessagesContainer.style.display = 'none';
            document.getElementById('publisher-name').value = '';
            document.getElementById('publisher-form').style.display = 'none';
            let inputElement = document.getElementById('publisher-id');
            inputElement.setAttribute('value','0');
            populatePublisherTables(response);
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

function setEventsForPublisherTable(){
    let deletePublishers = document.querySelectorAll('.delete-publisher');
    deletePublishers.forEach(deletePublisher => {
        deletePublisher.addEventListener('click', () => {
            let form = deletePublisher.closest('form');
            sendDeletePublisherForm(form);
        });
    });

    let activatePublishers = document.querySelectorAll('.activate-publisher');
    activatePublishers.forEach(activatePublisher => {
        activatePublisher.addEventListener('click', () => {
            let form = activatePublisher.closest('form');
            sendActivatePublisherForm(form);
        });
    });

    let changeLinks = document.querySelectorAll('.change-links');
    changeLinks.forEach(link=>{
        link.addEventListener('click',()=>{
            let publisherId = link.getAttribute('data-publisher-id');
            let publisherName = link.getAttribute('data-publisher-name');

            let inputId = document.getElementById('publisher-id');
            let inputName = document.getElementById('publisher-name');

            inputId.setAttribute('value',publisherId);
            inputName.value = publisherName;
            document.getElementById('publisher-form').style.display = 'block';
        })
    })

}

function sendDeletePublisherForm(form){
    let formData = new FormData(form);

    $.ajax({
        url: 'models/publisher/delete-publisher.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            let element = document.querySelector('.server-messages');
            element.style.display = 'none';
            populatePublisherTables(response);
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


function populatePublisherTables(publishers){
    let activePublishers = publishers[0].activePublishers;
    let deletedPublishers = publishers[0].deletedPublishers;

    let activePublishersTable = document.querySelector('#table-active-publishers tbody');
    let deletedPublishersTable = document.querySelector('#table-deleted-publishers tbody');

    while(activePublishersTable.firstChild)activePublishersTable.removeChild(activePublishersTable.firstChild);
    while(deletedPublishersTable.firstChild)deletedPublishersTable.removeChild(deletedPublishersTable.firstChild);

    activePublishers.forEach(publisher=>{
        let trTag = document.createElement('tr');

        let tdTagName = document.createElement('td');
        let tdTagBookCount = document.createElement('td');
        let tdTagCreatedAt = document.createElement('td');
        let tdTagChange = document.createElement('td');
        let tdTagDelete = document.createElement('td');

        tdTagName.textContent = publisher.name;
        tdTagBookCount.textContent = publisher.book_count;
        tdTagCreatedAt.textContent = publisher.created_at;

        let aTag = document.createElement('a');
        aTag.classList.add('safe-option','change-links');
        aTag.setAttribute('data-publisher-id',publisher.id);
        aTag.setAttribute('data-publisher-name',publisher.name);
        aTag.textContent = 'Change';
        aTag.setAttribute('href',`#`);
        tdTagChange.appendChild(aTag);

        let formDelete = document.createElement('form');

        let inputPublisherIdDelete = document.createElement('input');
        inputPublisherIdDelete.setAttribute('type','text');
        inputPublisherIdDelete.setAttribute('name','publisher-id');
        inputPublisherIdDelete.style.display = 'none';
        inputPublisherIdDelete.value = publisher.id;

        let inputButtonDelete = document.createElement('input');
        inputButtonDelete.setAttribute('type','button');
        inputButtonDelete.classList.add('danger-option','delete-publisher');
        inputButtonDelete.value = 'Delete';

        formDelete.appendChild(inputPublisherIdDelete);
        formDelete.appendChild(inputButtonDelete);
        tdTagDelete.appendChild(formDelete);

        trTag.appendChild(tdTagName);
        trTag.appendChild(tdTagBookCount);
        trTag.appendChild(tdTagCreatedAt);
        trTag.appendChild(tdTagChange);
        trTag.appendChild(tdTagDelete);

        activePublishersTable.appendChild(trTag);
    })

    deletedPublishers.forEach(publisher=>{
        let trTag = document.createElement('tr');

        let tdTagName = document.createElement('td');
        let tdTagBookCount = document.createElement('td');
        let tdTagDeletedAt = document.createElement('td');
        let tdTagChange = document.createElement('td');
        let tdTagActivate = document.createElement('td');

        tdTagName.textContent = publisher.name;
        tdTagBookCount.textContent = publisher.book_count;
        tdTagDeletedAt.textContent = publisher.deleted_at;

        let aTag = document.createElement('a');
        aTag.setAttribute('data-publisher-id',publisher.id);
        aTag.setAttribute('data-publisher-name',publisher.name);
        aTag.classList.add('safe-option','change-links');
        aTag.textContent = 'Change';
        aTag.setAttribute('href',`#`);
        tdTagChange.appendChild(aTag);

        let formActivate = document.createElement('form');

        let inputPublisherIdActivate = document.createElement('input');
        inputPublisherIdActivate.setAttribute('type','text');
        inputPublisherIdActivate.setAttribute('name','publisher-id');
        inputPublisherIdActivate.style.display = 'none';
        inputPublisherIdActivate.value = publisher.id;

        let inputButtonActivate = document.createElement('input');
        inputButtonActivate.setAttribute('type','button');
        inputButtonActivate.classList.add('safe-option','activate-publisher');
        inputButtonActivate.value = 'Activate';

        formActivate.appendChild(inputPublisherIdActivate);
        formActivate.appendChild(inputButtonActivate);
        tdTagActivate.appendChild(formActivate);

        trTag.appendChild(tdTagName);
        trTag.appendChild(tdTagBookCount);
        trTag.appendChild(tdTagDeletedAt);
        trTag.appendChild(tdTagChange);
        trTag.appendChild(tdTagActivate);

        deletedPublishersTable.appendChild(trTag);
    })

    setEventsForPublisherTable();
    setTableZebra();
}

function sendActivatePublisherForm(form){
    let formData = new FormData(form);

    $.ajax({
        url: 'models/publisher/activate-publisher.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            let element = document.querySelector('.server-messages');
            element.style.display = 'none';
            populatePublisherTables(response);
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
