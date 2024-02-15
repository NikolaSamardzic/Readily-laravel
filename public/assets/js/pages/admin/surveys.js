console.log("readily.com/admin/surveys")

setTableZebra();
setEventsForSurveyTable();

function setEventsForSurveyTable(){
    let deleteSurveys = document.querySelectorAll('.delete-survey');
    deleteSurveys.forEach(deleteSurvey => {
        deleteSurvey.addEventListener('click', () => {
            let form = deleteSurvey.closest('form');
            sendDeleteSurveyForm(form);
        });
    });

    let activatePublishers = document.querySelectorAll('.activate-survey');
    activatePublishers.forEach(activatePublisher => {
        activatePublisher.addEventListener('click', () => {
            let form = activatePublisher.closest('form');
            sendActivateSurveyForm(form);
        });
    });
}

function sendDeleteSurveyForm(form){
    let formData = new FormData(form);

    $.ajax({
        url: 'models/survey/delete-survey.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            populateSurveyTables(response);
        },
        error: function(xhr, status, errorThrown) {
            let messages = JSON.parse(xhr.responseText);

            console.log(messages)
            console.log(xhr);
            console.log(status, errorThrown);
        }
    });
}

function sendActivateSurveyForm(form){
    let formData = new FormData(form);

    $.ajax({
        url: 'models/survey/activate-survey.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            populateSurveyTables(response);
        },
        error: function(xhr, status, errorThrown) {

            let messages = JSON.parse(xhr.responseText);

            console.log(messages)
            console.log(xhr);
            console.log(status, errorThrown);
        }
    });
}

function populateSurveyTables(surveys){
    let activeSurveys = surveys[0].activeSurveys;
    let deletedSurveys = surveys[0].deletedSurveys;

    let activeSurveysTable = document.querySelector('#table-active-surveys tbody');
    let deletedSurveysTable = document.querySelector('#table-deleted-surveys tbody');

    while(activeSurveysTable.firstChild)activeSurveysTable.removeChild(activeSurveysTable.firstChild);
    while(deletedSurveysTable.firstChild)deletedSurveysTable.removeChild(deletedSurveysTable.firstChild);


    for(let property in activeSurveys){
        let trTag = document.createElement('tr');

        let tdTagName = document.createElement('td');
        let tdTagCreatedAt = document.createElement('td');
        let tdTagDelete = document.createElement('td');

        tdTagName.textContent = activeSurveys[property].name;
        tdTagCreatedAt.textContent = activeSurveys[property].created_at;


        let formDelete = document.createElement('form');

        let inputSurveyIdDelete = document.createElement('input');
        inputSurveyIdDelete.setAttribute('type','text');
        inputSurveyIdDelete.setAttribute('name','survey-id');
        inputSurveyIdDelete.style.display = 'none';
        inputSurveyIdDelete.value = activeSurveys[property].id;

        let inputButtonDelete = document.createElement('input');
        inputButtonDelete.setAttribute('type','button');
        inputButtonDelete.classList.add('danger-option','delete-survey');
        inputButtonDelete.value = 'Delete';

        formDelete.appendChild(inputSurveyIdDelete);
        formDelete.appendChild(inputButtonDelete);
        tdTagDelete.appendChild(formDelete);


        trTag.appendChild(tdTagName);
        trTag.appendChild(tdTagCreatedAt);

        for(let option in activeSurveys[property].options){
            let tdTagOption = document.createElement('td');
            tdTagOption.classList.add('survey-table-options');

            let nameTag = document.createElement('p');
            let valueTag = document.createElement('p');

            nameTag.textContent = option;
            valueTag.textContent = activeSurveys[property].options[option]

            tdTagOption.appendChild(nameTag);
            tdTagOption.appendChild(valueTag);

            trTag.appendChild(tdTagOption)
        }

        trTag.appendChild(tdTagDelete);

        activeSurveysTable.appendChild(trTag);
    }


    for(let property in deletedSurveys){
        let trTag = document.createElement('tr');

        let tdTagName = document.createElement('td');
        let tdTagFinishedAt = document.createElement('td');
        let tdTagDelete = document.createElement('td');

        tdTagName.textContent = deletedSurveys[property].name;
        tdTagFinishedAt.textContent = deletedSurveys[property].finished_at;


        let formDelete = document.createElement('form');

        let inputSurveyIdDelete = document.createElement('input');
        inputSurveyIdDelete.setAttribute('type','text');
        inputSurveyIdDelete.setAttribute('name','survey-id');
        inputSurveyIdDelete.style.display = 'none';
        inputSurveyIdDelete.value = deletedSurveys[property].id;

        let inputButtonDelete = document.createElement('input');
        inputButtonDelete.setAttribute('type','button');
        inputButtonDelete.classList.add('safe-option','activate-survey');
        inputButtonDelete.value = 'Activate';

        formDelete.appendChild(inputSurveyIdDelete);
        formDelete.appendChild(inputButtonDelete);
        tdTagDelete.appendChild(formDelete);


        trTag.appendChild(tdTagName);
        trTag.appendChild(tdTagFinishedAt);

        for(let option in deletedSurveys[property].options){
            let tdTagOption = document.createElement('td');
            tdTagOption.classList.add('survey-table-options');

            let nameTag = document.createElement('p');
            let valueTag = document.createElement('p');

            nameTag.textContent = option;
            valueTag.textContent = deletedSurveys[property].options[option]

            tdTagOption.appendChild(nameTag);
            tdTagOption.appendChild(valueTag);

            trTag.appendChild(tdTagOption)
        }

        trTag.appendChild(tdTagDelete);

        deletedSurveysTable.appendChild(trTag);
    }

    setTableZebra();
    setEventsForSurveyTable();
}
