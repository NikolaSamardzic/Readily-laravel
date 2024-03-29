console.log("readily.com/books/{id}")

createAngleFunctionality('related-categories-container','.article-category','book-related-categories-section','category');
createAngleFunctionality('div-info-section','.article-info-container','div-info-container','category')
createAngleFunctionality('related-books','#related-books-articles-container','related-books-articles-container','books')
createAngleFunctionality('authors-books','#autors-books-articles-container','autors-books-articles-container','books')

let formReview = document.getElementById('star-rating-form');

if(formReview){
    let starsContainer = document.querySelectorAll('.star-icon-container');
    let idBook = formReview.getAttribute('data-book-id');


    starsContainer.forEach(star=>{
        star.addEventListener('click',()=>{
            let idReview = formReview.getAttribute('data-review-id');
            let radioBtn = star.querySelector('input[type="radio"]');
            radioBtn.checked = true;
            let rating = radioBtn.value;

            let stars = document.querySelectorAll('.book-rating-star');

            for(let i=0;i<stars.length;i++){
                if(rating>=i){
                    stars[i].classList.remove('fa-regular');
                    stars[i].classList.add('fa-solid');

                }
                else{
                    stars[i].classList.remove('fa-solid');
                    stars[i].classList.add('fa-regular');
                }
            }

            console.log(formReview.getAttribute('data-is-set'))

            let formData = new FormData(formReview);

            if(parseInt(formReview.getAttribute('data-is-set'))) formData.append('_method', 'PUT');


            path = parseInt(formReview.getAttribute('data-is-set')) ? `/reviews/${idReview}` : `/reviews`

            $.ajax({
                url: path,
                type: 'POST',
                data: formData,
                headers: {
                    Accept: "application/json; charset=utf-8",
                },
                contentType: false,
                processData: false,
                success: function(response) {
                    if(!parseInt(formReview.getAttribute('data-is-set'))){
                        formReview.setAttribute('data-is-set',1);
                        formReview.setAttribute('data-review-id',response.review);
                    }

                    toastr.success(response.message)
                },
                error: function(xhr, status, errorThrown) {
                    let messages = JSON.parse(xhr.responseText);

                    displayServerMessages('server-messages',messages,'error-message');

                    console.log(messages)
                    console.log(xhr);
                    console.log(status, errorThrown);
                }
            });
        })
    })
}

let formComment = document.getElementById('form-comment');

if(formComment){

    $(document).on('blur','#biography-input',checkBiography);

    let inputTag = document.querySelector('.comment-image');
    commentImageInput(inputTag);

    $(document).on('click','#comment-button',sendCommentForm);
}
function sendCommentForm(){
    let errorCount = 0;

    errorCount += checkBiography();

    errorCount += checkCommentImages();
    if(errorCount){
        return;
    }

    let form = document.getElementById('form-comment');
    let formData = new FormData(form);

    $.ajax({
        url: '/comments',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            toastr.success(response.message)
            document.getElementById('biography-input').value = "";

            let commentImages = document.querySelectorAll('.comment-image');
            let commentImagesArray = Array.prototype.slice.call(commentImages, 1);

            commentImages.forEach((elem) => {
                elem.value = '';
            });

            commentImagesArray.forEach((elem) => {
                elem.remove();
            });
        },
        error: function(xhr, status, errorThrown) {
            let messages = JSON.parse(xhr.responseText);
            displayServerMessages('comment-server-error',messages,'error-message');

            console.log(messages)
            console.log(xhr);
            console.log(status, errorThrown);
        }
    });
}

function commentImageInput(element){

    element.addEventListener('change',()=>{
        let commentImagesContainer = document.querySelector('#comment-images-container');
        let commentImages = document.querySelectorAll('.comment-image');

        let uploadedImages = Array.from(commentImages).filter(image => image.files.length > 0);
        checkCommentImages();
        if (element.files.length > 0 &&  commentImages.length < 3 ){
            let newInput = document.createElement('input');
            newInput.type = 'file';
            newInput.name = 'comment-image[]';
            newInput.classList.add('comment-image');
            commentImageInput(newInput);

            commentImagesContainer.appendChild(newInput);
        }else if(element.files.length === 0 &&  uploadedImages.length <2){
            if (commentImages.length > 1) {
                element.remove();
            }
        }
    })


}


function checkCommentImages(){
    let commentImages = document.querySelectorAll('.comment-image');
    let errorMessage = document.getElementById('comment-images-error');

    let totalSize = 0;

    let isValid = true;

    Array.from(commentImages).forEach(image => {

        if (image.files.length > 0) {
            let file = image.files[0];
            let fileType = file.type.split('/')[1];
            let fileSize = file.size / (1024 * 1024);

            if (fileType !== 'jpg' && fileType !== 'jpeg' && fileType !== 'png') {
                isValid = false
            }

            totalSize += fileSize;

            if (totalSize > 2) {
                isValid = false
            }
        }
    });


    if(isValid){
        errorMessage.style.display = "none";
        return 0;
    }

    errorMessage.style.display = "block";
    return 0;
}
