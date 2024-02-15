console.log("readily.com/books/create")

setInsertBookForm();

function setInsertBookForm(){

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


    $(document).on('click','#insert-new-book',sendInsertBookData);
}


function sendInsertBookData(){
    let errorCount = 0;

    errorCount += checkBookImg();
    errorCount += checkInputElementIfEmpty('book-title-title-js','book-title-error')
    errorCount += checkInputElementIfEmpty('page-count-input-js','page-count-error')
    errorCount += checkInputElementIfEmpty('book-description-input-js','book-description-error')
    errorCount += checkInputElementIfEmpty('price-input-js','price-error')
    errorCount += checkInputDate();
    errorCount += checkCategoriesCheckBoxes();


    if(errorCount){
        return;
    }

    let form = document.getElementById('insert-book-form');
    let formData = new FormData(form);

    $.ajax({
        url: 'models/book/add-book.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            clearAllInputBookValues();
            clearAllInputBookErrors();

            displayServerMessages('server-messages',response,'success-message');
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

function clearAllInputBookErrors(){
    document.getElementById('book-image-error').style.display = "none";
    document.getElementById('book-title-error').style.display = "none";
    document.getElementById('page-count-error').style.display = "none";
    document.getElementById('price-error').style.display = "none";
    document.getElementById('release-date-error').style.display = "none";
    document.getElementById('publisher-error').style.display = "none";
    document.getElementById('book-category-error').style.display = "none";
    document.getElementById('book-description-error').style.display = "none";

}

function clearAllInputBookValues(){
    let bookImgContainer = document.querySelector('.book-image-container-form');
    while(bookImgContainer.firstChild)bookImgContainer.removeChild(bookImgContainer.firstChild);

    document.getElementById('book-image-js').value = "";

    document.getElementById('book-title-title-js').value = "";
    document.getElementById('book-description-input-js').value = "";
    document.getElementById('page-count-input-js').value = "";
    document.getElementById('price-input-js').value = "";
    document.getElementById('release-date-input-js').value = "";
    document.getElementById('publisher-input-js').value = 1;

    let checkboxes = document.querySelectorAll('.book-category-cb');

    checkboxes.forEach((checkbox) => {
        checkbox.checked = false;
    });

}
