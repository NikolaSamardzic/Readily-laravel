console.log("readily.com/books/{id}/edit")

selectBookCategories();
setUpdateBookForm();

function selectBookCategories(){
    let allCategories = document.querySelectorAll(".book-category-cb");
    let bookId = document.getElementById('book-id-js').value;

    $.ajax({
        url: `models/book/get-book-active-categories.php?book-id=${bookId}`,
        type: 'GET',
        contentType: 'json',
        success: function(response) {
            console.log(response);
            for(let i=0; i<allCategories.length;i++){

                for(let j=0; j<response.length;j++){
                    if(allCategories[i].value === response[j].category_id){
                        allCategories[i].checked = true;
                        break;
                    }
                }
            }
        },
        error: function(xhr, status, errorThrown) {
            let messages = JSON.parse(xhr.responseText);
            displayServerMessages('server-messages',messages,'error-message');

            console.log(messages)
            console.log(xhr);
            console.log(status, errorThrown);
        }
    });
}

function setUpdateBookForm(){

    $(document).on('change','#book-image-js',uploadBookImage);

    $(document).on('blur','#book-title-title-js',()=>{
        checkInputElementIfEmpty('book-title-title-js','book-title-error')
    })

    $(document).on('blur','#page-count-input-js',()=>{
        checkInputElementIfEmpty('page-count-input-js','page-count-error')
    })

    $(document).on('blur','#price-input-js',()=>{
        checkInputElementIfEmpty('price-input-js','price-error')
    })

    $(document).on('blur','#book-description-input-js',()=>{
        checkInputElementIfEmpty('book-description-input-js','book-description-error')
    })

    $(document).on('blur','#release-date-input-js',()=>{
        checkInputDate()
    })

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



    $(document).on('click','#update-book',sendUpdateBookData);
}

function sendUpdateBookData(){
    let errorCount = 0;

    let imageUploadInput = document.getElementById('book-image-js');
    if (imageUploadInput.files && imageUploadInput.files[0]){
        errorCount += checkBookImg();
    }

    errorCount += checkInputElementIfEmpty('book-title-title-js','book-title-error')
    errorCount += checkInputElementIfEmpty('page-count-input-js','page-count-error')
    errorCount += checkInputElementIfEmpty('book-description-input-js','book-description-error')
    errorCount += checkInputElementIfEmpty('price-input-js','price-error')
    errorCount += checkInputDate();
    errorCount += checkCategoriesCheckBoxes();


    if(errorCount){
        return;
    }

    let form = document.getElementById('update-book-form');
    let formData = new FormData(form);

    $.ajax({
        url: 'models/book/update-book.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {

            window.location.href = `index.php?page=writer-books&writer-id=${response[0]}`;
        },
        error: function(xhr, status, errorThrown) {
            let messages = JSON.parse(xhr.responseText);
            displayServerMessages('server-messages',messages,'error-message');

            console.log(messages)
            console.log(xhr);
            console.log(status, errorThrown);
        }
    });
}
