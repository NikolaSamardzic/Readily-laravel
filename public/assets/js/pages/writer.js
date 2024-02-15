console.log("readily.com/writers/{id}")

createAngleFunctionality('writer-books','.article-book','writer-books-articles-container','books');
createAngleFunctionality('other-writers','.article-writer','other-writers-articles-container','author');

$(document).on('click','#show-more',()=>{
    let short = document.querySelector(".short-info");
    let long = document.querySelector(".long-info");

    short.style.display = "none";
    long.style.display = "block";
})

$(document).on('click','#show-less',()=>{
    let short = document.querySelector(".short-info");
    let long = document.querySelector(".long-info");

    long.style.display = "none";
    short.style.display = "block";
})
