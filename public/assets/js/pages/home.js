console.log("readily.com/")

setMessageForm();

createAngleFunctionality('bestselling-books','.article-book','bestselling-books-articles-container','books');
createAngleFunctionality('popular-categories','.article-category','popular-categories-articles-container','category');

let surveyContainer = document.getElementById('survey-website-experience-section');

if(surveyContainer){
    $('.survey-option').on('click', function() {
        let closestRadio = $(this).closest('.survey-option').find('input[type=radio]');
        closestRadio.prop('checked', true);

        sendSurvey('website-experience-form');
    });

}

let cookie = document.cookie.split(';');
for(let i=0; i<cookie.length;i++){

    let name = cookie[i].trim().split('=')[0];

    if(name === 'hasPreferedCategories'){
        createAngleFunctionality('suggested-books','#suggested-books','sugested-books-articles-container','books');
    }

}

window.addEventListener("scroll",()=>{
    let element = document.getElementById("position");
    let scrollPosition = window.scrollY;

    let positionOffset = element.getBoundingClientRect().top + scrollPosition;

    if(scrollPosition < positionOffset){
        return;
    }


    let cookie = document.cookie.split(';');


    let hasPreferedCategories = false;
    let isLoggedIn = false;

    for(let i=0; i<cookie.length;i++){

        let name = cookie[i].trim().split('=')[0];
        let value = decodeURIComponent(cookie[i].trim().split('=')[1]);

        switch(name){
            case 'hasPreferedCategories':
                hasPreferedCategories = value;
                break;
            case 'isLoggedIn':
                isLoggedIn = value;
                break;
        }
    }

    if(hasPreferedCategories || !isLoggedIn){
        return;
    }


    let exist = document.querySelector(".choosing-categories-section");
    if(exist !== undefined){
        return;
    }

    $("body").addClass("pre-loader");
    let body = document.querySelector("body");

    let bodyChildren = body.children;
    for(let i=0;i<bodyChildren.length;i++){
        bodyChildren[i].classList.add("blur");
    }

    let titleTag = document.createElement("h2");
    titleTag.innerText = "Select 3 categories that match your interests"

    let choosingCategoriesSection = document.createElement("section");
    let choosingCategoriesContainer = document.createElement("form");
    choosingCategoriesContainer.setAttribute('id','user-prefered-categories-form');

    choosingCategoriesContainer.appendChild(titleTag);

    choosingCategoriesSection.classList.add("choosing-categories-section");
    choosingCategoriesContainer.classList.add("choosing-categories-container");

    displayChoosingCategories(choosingCategoriesContainer);

    choosingCategoriesSection.appendChild(choosingCategoriesContainer);
    body.appendChild(choosingCategoriesSection);
})

function sendSurvey(idForm){
    let form = document.getElementById(idForm);

    let formData = new FormData(form);

    $.ajax({
        url: 'models/survey/insert-survey-webisite-experience-data.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            $('#website-experience-form').animate({
                height: 0
            }, 200);

            let element = document.querySelector('.survey-message');
            element.style.display = 'block';
            displayServerMessages('survey-message',response,'success-message');
        },
        error: function(xhr, status, errorThrown) {
            let messages = JSON.parse(xhr.responseText);
            let element = document.querySelector('.survey-message');
            element.style.display = 'block';
            displayServerMessages('survey-message',messages,'error-message');

            console.log(messages)
            console.log(xhr);
            console.log(status, errorThrown);
        }
    });
}


function displayChoosingCategories(element){

    $.ajax({
        url: 'models/category/get-active-categories.php',
        type: 'POST',
        dataType: 'json',
        success:function(allCategories){
            console.log(allCategories);
            for(let i=0;i<allCategories.length;i++){
                let article = categoryArticleGenerator(allCategories[i]);

                let checkbox = document.createElement("input");
                checkbox.type = "checkbox";
                checkbox.name = "checkbox-prefered-categories[]"
                checkbox.value = allCategories[i].category_id;
                checkbox.classList.add("category-checkbox-choose");
                checkbox.setAttribute("id",`prefered-category-${allCategories[i].category_id}`)

                $(document).on("change",`#prefered-category-${allCategories[i].category_id}`,settingUserPreferedCategories);

                article.appendChild(checkbox);
                element.appendChild(article);

            }

        },
        error: function(xhr, status, errorThrown) {
            let messages = JSON.parse(xhr.responseText);
            let element = document.querySelector('.server-messages');
            element.style.display = 'block';
            displayServerMessages('server-messages',messages,'error-message');

            console.log(messages)
            console.log(xhr);
            console.log(status, errorThrown);
        }
    })
}

function settingUserPreferedCategories(){
    let checkBoxes = document.querySelectorAll(".category-checkbox-choose");

    let prefered = [];
    checkBoxes.forEach(function(checkbox){
        if (checkbox.checked) {
            prefered.push(checkbox.value);
        }
    })

    if(prefered.length === 3){
        setItemToLocalStorage("hasPreferedCategories",true);
        let bodyChildren = document.querySelectorAll(".blur");
        for(let i=0;i<bodyChildren.length;i++){
            bodyChildren[i].classList.remove("blur");
            bodyChildren[i].classList.add("un-blur");
        }

        let body = document.querySelector("body");
        body.classList.remove("pre-loader")

        let section = document.querySelector(".choosing-categories-section");
        section.style.display = "none";
        displaySuggestions(prefered);

    }
}

function displaySuggestions(){
    let form = document.getElementById('user-prefered-categories-form');

    let formData = new FormData(form);

    $.ajax({
        url: 'models/book/get-suggested-books.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success:function(books){
            sectionGenerator("suggested-books","sugested-books-articles-container","Books Recommended For You",bookArticleGenerator,books,"books")
        },
        error: function(xhr, status, errorThrown) {
            let messages = JSON.parse(xhr.responseText);
            let element = document.querySelector('.server-messages');
            element.style.display = 'block';
            displayServerMessages('server-messages',messages,'error-message');

            console.log(messages)
            console.log(xhr);
            console.log(status, errorThrown);
        }
    })
}


function setMessageForm(){
    $(document).on('blur','#biography-input',checkBiography);

    $(document).on('blur','#subject-input-js',()=>{
        let subject = document.getElementById('subject-input-js').value;
        let errorMessage = document.getElementById('first-name-error');

        if(!subject.length){
            errorMessage.style.display = 'block';
            return 1;
        }

        errorMessage.style.display = 'none';
        return 0;
    });

    $(document).on('click','#send-message-form',sendMessageForm);
}

function sendMessageForm(){
    let errorCount = 0;

    let subject = document.getElementById('subject-input-js').value;
    let errorMessage = document.getElementById('first-name-error');

    if(!subject.length){
        errorMessage.style.display = 'block';
        errorCount++;
    }
    errorCount += checkBiography();

    if(errorCount){
        return;
    }

    let form = document.getElementById('message-form');

    let formData = new FormData(form);

    $.ajax({
        url: '/messages',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            toastr.success(response.message)
            clearAllInputValuesMessage();
        },
        error: function(xhr, status, errorThrown) {
            let messages = JSON.parse(xhr.responseText);
            toastr.error(messages.message)
        }
    });
}

function clearAllInputValuesMessage(){
    console.log('radi')
    document.getElementById('subject-input-js').value = "";
    document.getElementById('biography-input').value = "";
}
