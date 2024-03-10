
console.log("readily.com/shop")

setFilterSortForm();
//sendFilterSortForm();

function setFilterSortForm(){

    let parentCategories = document.querySelectorAll('.category-parent ul');

    parentCategories.forEach(parentCat=>{
        parentCat.style.display = 'none';
    })

    $('.category-parent').on('click', function() {
        let nestedUl = $(this).find('ul');
        nestedUl.toggle();
    });

    $('.book-category-cb').on('click', function(event) {
        event.stopPropagation();
    });

    $('.book-category-li label').on('click', function(event) {
        event.stopPropagation();
    });


    $(document).on('blur','#input-search',()=>{
        sendFilterSortForm();
    })

    $(document).on('blur','#price-min',()=>{
        sendFilterSortForm();
    })

    $(document).on('blur','#price-max',()=>{
        sendFilterSortForm();
    })

    $(document).on('change','#sort',()=>{
        sendFilterSortForm();
    })

    let cbElements = document.querySelectorAll('.book-category-cb');

    cbElements.forEach(element=>{
        element.addEventListener('change',()=>{
            sendFilterSortForm();
        })
    })

    let pageLinks = document.querySelectorAll('.page-link');

    pageLinks.forEach(pageLink =>{
        pageLink.addEventListener('click',(event)=>{
            window.scrollTo({
                top: 0,
                behavior: 'smooth' // Optional: smooth scrolling behavior
            });
            event.preventDefault();
            history.replaceState(null, null, pageLink.href);
            sendUrlForm()
        })
    })

    fillForm()
}

function sendUrlForm(){
    $.ajax({
        url: window.location.href,
        type: 'GET',
        contentType: false,
        processData: false,
        success: function(response) {
            console.log(response)

            let element = document.querySelector('.server-messages');
            element.style.display = 'none';
            displayShopBooks(response.data);
            if(response.data.length){
                createPageNumbers(response.links);
            }else{

                let ulTag = document.getElementById('pagination-ul');
                while(ulTag.firstChild)ulTag.removeChild(ulTag.firstChild);
            }


            history.replaceState(null, null, response.links[response.current_page].url);
            if(!(response.data.length)){
                element.style.display = 'block';
                element.innerHTML = `<p class="error-message">We're sorry, but we couldn't find any books that match your interests.</p>`;
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
    });
}

function fillForm(){
    let urlString = window.location.href;
    let url = new URL(urlString);
    let params = new URLSearchParams(url.search);
    let queryParams = {};

    params.forEach((value, key) => {
        if (key.endsWith(']')) {
            let cleanKey = key.slice(0, 13);
            if (!queryParams[cleanKey]) {
                queryParams[cleanKey] = [];
            }
            queryParams[cleanKey].push(value);
        } else {
            queryParams[key] = value;
        }
    });

    let cbElements = document.querySelectorAll('.book-category-cb');

    cbElements.forEach(element=>{
        if (queryParams.hasOwnProperty("book-category")) {
            if (queryParams['book-category'].includes(element.value)) {
                element.checked = true;
            }
        }
    })

    if (queryParams.hasOwnProperty("sort")){
        let selectOptions = document.querySelectorAll('.selectClass option');
        selectOptions.forEach(option => {
            if(option.value == queryParams.sort)option.selected = true;
        })
    }

    if (queryParams.hasOwnProperty("search")){
        let searchElement = document.getElementById('input-search')
        searchElement.value = queryParams.search;
    }

    if (queryParams.hasOwnProperty("price-min")){
        let searchElement = document.getElementById('price-min')
        searchElement.value = queryParams['price-min'];
    }

    if (queryParams.hasOwnProperty("price-max")){
        let searchElement = document.getElementById('price-max')
        searchElement.value = queryParams['price-max'];
    }
}

function displayShopBooks(books){

    let ulTag = document.getElementById('articles-container-ul');
    while(ulTag.firstChild)ulTag.removeChild(ulTag.firstChild);

    books.forEach(book=>{
        let liTag = document.createElement('li');
        liTag.classList.add('li-tag-article-container')
        let article = bookArticleGenerator(book,"",true);
        liTag.appendChild(article);
        ulTag.appendChild(liTag);
    })
}



function createPageNumbers(links){
    let ulTag = document.getElementById('pagination-ul');

    while(ulTag.firstChild)ulTag.removeChild(ulTag.firstChild);

    for(let i=1;i<links.length -1;i++){
        let liTag = document.createElement('li');
        liTag.classList.add('page-item','number');

        if(links[i].active){
            liTag.classList.add('active');
        }

        let aTag =  document.createElement('a');
        aTag.setAttribute('href',links[i].url);
        aTag.classList.add('page-link');
        aTag.textContent = i;

        aTag.addEventListener('click',(event)=>{
            window.scrollTo({
                top: 0,
                behavior: 'smooth' // Optional: smooth scrolling behavior
            });
            event.preventDefault();
            history.replaceState(null, null, links[i].url);
            sendUrlForm()
        })

        liTag.appendChild(aTag);
        ulTag.appendChild(liTag);
    }
}


function sendFilterSortForm(){
    let form = document.getElementById('filter-sort-section');

    let formData = new FormData(form);

    $.ajax({
        url: '/shop/',
        type: 'GET',
        data: $('#filter-sort-section').serialize(),
        contentType: false,
        processData: false,
        success: function(response) {
            console.log(response)

            let element = document.querySelector('.server-messages');
            element.style.display = 'none';
            displayShopBooks(response.data);
            history.replaceState(null, null, response.links[response.current_page].url);
            if(response.data.length){
                createPageNumbers(response.links);
            }else{

                let ulTag = document.getElementById('pagination-ul');
                while(ulTag.firstChild)ulTag.removeChild(ulTag.firstChild);
            }

            history.replaceState(null, null, response.links[response.current_page].url);
            if(!(response.data.length)){
                element.style.display = 'block';
                element.innerHTML = `<p class="error-message">We're sorry, but we couldn't find any books that match your interests.</p>`;
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
    });

}
