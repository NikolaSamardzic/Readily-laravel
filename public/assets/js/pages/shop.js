console.log("readily.com/shop")

setFilterSortForm();
sendFilterSortForm();

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



function createPageNumbers(pageCount,activePage){
    let ulTag = document.getElementById('pagination-ul');

    while(ulTag.firstChild)ulTag.removeChild(ulTag.firstChild);

    for(let i=1;i<=pageCount;i++){
        let liTag = document.createElement('li');
        liTag.classList.add('page-item','number');

        if(i === activePage){
            liTag.classList.add('active');
        }

        let aTag =  document.createElement('a');
        aTag.setAttribute('href','#');
        aTag.classList.add('page-link');
        aTag.textContent = i;

        aTag.addEventListener('click',()=>{
            sendFilterSortForm(aTag.textContent)
        })

        liTag.appendChild(aTag);
        ulTag.appendChild(liTag);
    }
}


function sendFilterSortForm(activePage = 1){
    let form = document.getElementById('filter-sort-section');

    let formData = new FormData(form);
    formData.append('activePage',activePage);

    $.ajax({
        url: 'models/shop/shop.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            let element = document.querySelector('.server-messages');
            element.style.display = 'none';
            displayShopBooks(response[2]);
            createPageNumbers(response[0],response[1]);

            if(!(response[2].length)){
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
