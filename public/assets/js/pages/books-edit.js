console.log("readily.com/books/{id}/edit")

setUpdateBookForm();

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

    return !errorCount;

}
