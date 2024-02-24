function checkInputElementWithRegex(regex,idElement,idErrorElement){
    let element = document.getElementById(`${idElement}`).value;
    let errorMessage = document.getElementById(`${idErrorElement}`);

    if(!regex.test(element)){
        errorMessage.style.display = 'block';
        return 1;
    }

    errorMessage.style.display = 'none';
    return 0;
}

function checkRole(){
    let role = parseInt(document.getElementById('role-input-js').value);
    if(role === 3 || role === 2){
        return 0;
    }else{
        return 1;
    }
}

function uploadAvatar(){

    let userAvatarImg = document.getElementById('user-avatar-img');
    let imageUploadInput = document.getElementById('user-avatar-js');

    if (imageUploadInput.files && imageUploadInput.files[0] && !checkAvatar()){

        let file = imageUploadInput.files[0];

        userAvatarImg.src =  URL.createObjectURL(file);
    }else{
        userAvatarImg.setAttribute('src','../assets/images/avatars/default-avatar.jpg');
    }
}

function checkAvatar(){

    let imageUploadInput = document.getElementById('user-avatar-js');
    let errorMessage = document.getElementById('avatar-error');

    if (imageUploadInput.files && imageUploadInput.files[0]){

        let file = imageUploadInput.files[0];

        let validExtensions = ["jpg", "png"];
        let fileExtension = file.name.split(".").pop().toLowerCase();

        if (!validExtensions.includes(fileExtension)){
            errorMessage.style.display = "block";
            return 1;
        }

        let fileSizeInKB = file.size / 1024;
        if (fileSizeInKB > 700) {
            errorMessage.style.display = "block";
            return 1;
        }
    }

    errorMessage.style.display = "none";
    return 0;
}

function checkBiography(){
    let biographyRegex = /(\s.*){4,}/;

    let biography = document.getElementById('biography-input').value;
    let errorMessage = document.getElementById('biography-error');

    if(!biographyRegex.test(biography)){
        errorMessage.style.display = 'block';
        return 1;
    }

    errorMessage.style.display = 'none';
    return 0;
}

function clearAllInputErrors(){
    document.getElementById('avatar-error').style.display = "none";
    document.getElementById('first-name-error').style.display = "none";
    document.getElementById('last-name-error').style.display = "none";
    document.getElementById('username-error').style.display = "none";
    document.getElementById('password-error').style.display = "none";
    document.getElementById('email-error').style.display = "none";
    document.getElementById('phone-error').style.display = "none";
    document.getElementById('biography-error').style.display = "none";

    document.getElementById('address-line-error').style.display = "none";
    document.getElementById('number-error').style.display = "none";
    document.getElementById('city-error').style.display = "none";
    document.getElementById('state-error').style.display = "none";
    document.getElementById('zip-code-error').style.display = "none";
    document.getElementById('country-error').style.display = "none";
}

function displayServerMessages(container,messages,className){
    let serverMessagesDiv = document.querySelector(`.${container}`);
    serverMessagesDiv.style.display = 'block';

    while(serverMessagesDiv.firstChild)serverMessagesDiv.removeChild(serverMessagesDiv.firstChild);

    let ulTag = document.createElement('ul');

    messages.forEach(message => {
        let liTag = document.createElement('li');
        let pTag = document.createElement('p');
        pTag.classList.add(`${className}`);

        pTag.textContent = message;

        liTag.appendChild(pTag);
        ulTag.appendChild(liTag);
    });

    serverMessagesDiv.appendChild(ulTag);
}

function clearAllServerMessages(container){
    let serverMessagesDiv = document.querySelector(`.${container}`);

    while(serverMessagesDiv.firstChild)serverMessagesDiv.removeChild(serverMessagesDiv.firstChild);
}

function setTableZebra(){
    $("tbody tr:odd").css("background-color","var(--table-tr-bg)")
}

function setEventsForUserTable(){
    let deleteUsers = document.querySelectorAll('.delete-user');
    deleteUsers.forEach(deleteUser => {
        deleteUser.addEventListener('click', () => {
            let form = deleteUser.closest('form');
            sendDeleteUserForm(form);
        });
    });

    let activateUsers = document.querySelectorAll('.activate-user');
    activateUsers.forEach(activateUser => {
        activateUser.addEventListener('click', () => {
            let form = activateUser.closest('form');
            sendActivateUserForm(form);
        });
    });

    let banUsers = document.querySelectorAll('.ban-user');
    banUsers.forEach(banUser => {
        banUser.addEventListener('click', () => {
            let form = banUser.closest('form');
            sendBanUserForm(form);
        });
    });

    let unbanUsers = document.querySelectorAll('.unban-user');
    unbanUsers.forEach(unbanUser => {
        unbanUser.addEventListener('click', () => {
            let form = unbanUser.closest('form');
            sendUnbanUserForm(form);
        });
    });
}

function sendDeleteUserForm(form){
    let formData = new FormData(form);

    $.ajax({
        url: 'models/user/delete-user.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            let element = document.querySelector('.server-messages');
            element.style.display = 'none';
            populateUserTables(response);
        },
        error: function(xhr, status, errorThrown) {
            let messages = JSON.parse(xhr.responseText);
            let element = document.querySelector('.server-messages');
            element.style.display = 'block';
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            displayServerMessages('server-messages',messages,'error-message');

            console.log(messages)
            console.log(xhr);
            console.log(status, errorThrown);
        }
    });
}

function checkInputElementIfEmpty(idElement,idError){
    let element = document.getElementById(idElement);
    let error = document.getElementById(idError);

    if(element.value === ""){
        error.style.display = "block";
        return 1;
    }

    error.style.display = "none";
    return 0;
}
function sendUnbanUserForm(form){
    let formData = new FormData(form);

    $.ajax({
        url: 'models/user/unban-user.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            let element = document.querySelector('.server-messages');
            element.style.display = 'none';
            populateUserTables(response);
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

function checkInputDate(){
    let today = new Date();

    let input = document.getElementById('release-date-input-js').value;


    if (!input) {
        document.getElementById('release-date-error').style.display = 'block'
        return 1;
    }


    let inputDate = new Date(input);

    if (inputDate > today) {

        document.getElementById('release-date-error').style.display = 'block'
        return 1;
    }

    document.getElementById('release-date-error').style.display = 'none'
    return 0;
}

function checkBookImg(){
    let imageUploadInput = document.getElementById('book-image-js');
    let errorMessage = document.getElementById('book-image-error');

    if (imageUploadInput.files && imageUploadInput.files[0]){

        let file = imageUploadInput.files[0];

        let validExtensions = ["jpg", "jpeg", "png"];
        let fileExtension = file.name.split(".").pop().toLowerCase();

        if (!validExtensions.includes(fileExtension)){
            errorMessage.style.display = "block";
            return 1;
        }

        let fileSizeInKB = file.size / 1024;
        if (fileSizeInKB > 700) {
            errorMessage.style.display = "block";
            return 1;
        }

        let img = new Image();
        img.src = URL.createObjectURL(file);

        img.onload = function(){
            if(img.height/img.width < 200/170){
                errorMessage.style.display = "block";
                return 1;
            }
        }
    }else{
        errorMessage.style.display = "block";
        return 1;
    }

    errorMessage.style.display = "none";
    return 0;
}

function uploadBookImage(){
    let bookImgContainer = document.querySelector('.book-image-container-form');
    let imageUploadInput = document.getElementById('book-image-js');

    if (imageUploadInput.files && imageUploadInput.files[0] && !checkBookImg()){
        while(bookImgContainer.firstChild)bookImgContainer.removeChild(bookImgContainer.firstChild);

        let file = imageUploadInput.files[0];
        let fileURL = URL.createObjectURL(file);

        let imgTag = document.createElement('img');
        imgTag.src = fileURL;

        bookImgContainer.appendChild(imgTag)
    }else{
        while(bookImgContainer.firstChild)bookImgContainer.removeChild(bookImgContainer.firstChild);
    }
}

function checkCategoriesCheckBoxes(){
    let checkboxes = document.querySelectorAll('.book-category-cb');

    let isChecked = false;

    checkboxes.forEach((checkbox) => {
        if (checkbox.checked) {
            isChecked = true;
        }
    });

    if(isChecked){
        document.getElementById('book-category-error').style.display = 'none';
        return 0;
    }

    document.getElementById('book-category-error').style.display = 'block';
    return 1;
}

function sendBanUserForm(form){
    let formData = new FormData(form);

    $.ajax({
        url: 'models/user/ban-user.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            let element = document.querySelector('.server-messages');
            element.style.display = 'none';
            populateUserTables(response);
        },
        error: function(xhr, status, errorThrown) {
            let messages = JSON.parse(xhr.responseText);
            let element = document.querySelector('.server-messages');
            element.style.display = 'block';
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            displayServerMessages('server-messages',messages,'error-message');

            console.log(messages)
            console.log(xhr);
            console.log(status, errorThrown);
        }
    });
}

function sendActivateUserForm(form){
    let formData = new FormData(form);

    $.ajax({
        url: 'models/user/activate-user.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            let element = document.querySelector('.server-messages');
            element.style.display = 'none';
            populateUserTables(response);
        },
        error: function(xhr, status, errorThrown) {
            let messages = JSON.parse(xhr.responseText);
            let element = document.querySelector('.server-messages');
            element.style.display = 'block';
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            displayServerMessages('server-messages',messages,'error-message');

            console.log(messages)
            console.log(xhr);
            console.log(status, errorThrown);
        }
    });
}

function createAngleFunctionality(locationId,articleClass, setId, typeOfArticle){
    let section = document.getElementById(locationId);
    let articleContainerTag = document.querySelector(articleClass);

    let articleWidth;
    let articleGap;

    switch (typeOfArticle){
        case 'books':
            articleWidth = 180;
            articleGap = 40;
            break;
        case 'category':
            articleWidth = 250;
            articleGap = 20;
            break;
        case 'info':
            articleWidth = 220;
            articleGap = 20;
            break;
        case 'author':
            articleWidth = 180;
            articleGap = 40;
            break;
    }


    let leftAngleDiv = document.createElement("div");
    let rightAngleDiv = document.createElement("div");

    leftAngleDiv.setAttribute("id",setId + "-left-angle-container");
    rightAngleDiv.setAttribute("id",setId + "-right-angle-container");

    leftAngleDiv.classList.add("angle-container");
    rightAngleDiv.classList.add("angle-container");

    leftAngleDiv.innerHTML = '<i class="fa-solid fa-angle-left"></i>';
    rightAngleDiv.innerHTML = '<i class="fa-solid fa-angle-right"></i>';

    leftAngleDiv.style.left = '-20px';
    rightAngleDiv.style.right = '-20px';

    leftAngleDiv.style.bottom = (articleContainerTag.offsetHeight/2 -20) + "px";
    rightAngleDiv.style.bottom = (articleContainerTag.offsetHeight/2 -20) + "px";

    section.appendChild(leftAngleDiv);
    section.appendChild(rightAngleDiv);

    checkAngleVisibility(setId,`${setId}-left-angle-container`,`${setId}-right-angle-container`);

    $(document).on("click",`#${setId}-left-angle-container`,()=>{
        scrollLeft(setId,articleWidth,articleGap,`${setId}-left-angle-container`,`${setId}-right-angle-container`);
    });
    $(document).on("click",`#${setId}-right-angle-container`,()=>{
        scrollRight(setId,articleWidth,articleGap,`${setId}-left-angle-container`,`${setId}-right-angle-container`);
    });

    $(document).on("wheel",`#${setId}`,()=>{
        checkAngleVisibility(setId,`${setId}-left-angle-container`,`${setId}-right-angle-container`);
    })

    window.addEventListener("resize",()=>{
        checkAngleVisibility(setId,`${setId}-left-angle-container`,`${setId}-right-angle-container`);
    })

}

function scrollLeft(id,articleWidth,gap,idLeft,idRight){
    let container = document.getElementById(id);
    let widthOfAnArticle = articleWidth + gap;

    let scrollRightWidth = container.scrollWidth - container.scrollLeft - container.clientWidth;

    let articlesThatCanFit = Math.floor(container.clientWidth/widthOfAnArticle) * widthOfAnArticle;
    let rightWidthScrolled = Math.ceil(scrollRightWidth/widthOfAnArticle) * widthOfAnArticle;


    container.scrollLeft =container.scrollWidth - (rightWidthScrolled + articlesThatCanFit + container.clientWidth) ;

    let rightAngle = document.getElementById(idRight);
    rightAngle.style.display = "grid";
    let leftAngle = document.getElementById(idLeft);

    if((container.scrollWidth - (rightWidthScrolled + articlesThatCanFit + container.clientWidth))<=0){
        leftAngle.style.display = "none";
    }else{
        leftAngle.style.display = "grid";
    }
}

function scrollRight(id,articleWidth,gap,idLeft,idRight){
    let container = document.getElementById(id);
    let widthOfAnArticle = articleWidth + gap;

    let widthScrolled = Math.ceil(container.scrollLeft/widthOfAnArticle) * widthOfAnArticle;
    let articlesThatCanFit = Math.floor(container.clientWidth/widthOfAnArticle) * widthOfAnArticle;

    container.scrollLeft = widthScrolled+ articlesThatCanFit;

    let leftAngle = document.getElementById(idLeft);
    leftAngle.style.display = "grid";
    let rightAngle = document.getElementById(idRight);
    if((container.scrollWidth-container.clientWidth) <= widthScrolled+ articlesThatCanFit){
        rightAngle.style.display = "none";
    }else{
        rightAngle.style.display = "grid";
    }


}

function categoryArticleGenerator(category){
    let article = document.createElement("article");

    let name = category.category_name;

    let nameTag = document.createElement('p');
    nameTag.innerText = name;

    let imgTag = document.createElement("img");
    imgTag.src = `assets/images/books/small/${category.src}`;
    imgTag.alt = category.name;

    imgTag.classList.add("set-brightness");

    let link = document.createElement("a");
    link.href =`index.php?page=shop&id=${category.category_id}`;

    article.classList.add("article-category");
    article.appendChild(link);
    article.appendChild(nameTag);
    article.appendChild(imgTag);

    article.classList.add("article-category");

    return article
}

function bookArticleGenerator(book,label,image){

    let writer_id = book.writer_id;

    let article = document.createElement("article");
    article.classList.add("article-book");

    let divImgContainer = document.createElement("div");

    let lastDigit = book.id.toString().slice(-1);
    divImgContainer.classList.add(`bg-article-color-${lastDigit}`);
    divImgContainer.classList.add('article-div-img-container');

    let bookImg = document.createElement("img");
    bookImg.setAttribute("data-id",`${book.id}`);
    bookImg.classList.add("set-brightness");

    if(image){
        bookImg.src = `assets/images/books/small/${book.src}`;
    }
    bookImg.alt = book.title;

    let divTextConatiner = document.createElement("div");
    divTextConatiner.classList.add("article-books-text-container");

    let divTitleAndAuthor = document.createElement("div");
    divTitleAndAuthor.classList.add("title-and-author");

    let titleTag = document.createElement("h3");
    let authorTag = document.createElement("a");
    authorTag.classList.add("author-link");
    authorTag.href =`index.php?page=writer&id=${writer_id}`;
    authorTag.innerText = book.writer;

    if(book.title.length >33){
        titleTag.innerText = book.title.substring(0,30) + " ...";
    }else{
        titleTag.innerText = book.title;
    }

    divTitleAndAuthor.appendChild(titleTag);
    divTitleAndAuthor.appendChild(authorTag);

    let divStarsAndCart = document.createElement("div");
    divStarsAndCart.classList.add("stars-and-cart-container");

    let cartTag = document.createElement("i");
    cartTag.classList.add('fa-solid','fa-cart-shopping','shopping-cart');
    cartTag.setAttribute("id",'book-id-'+book.id);

    cartTag.addEventListener("click",()=>{
        addToCart(book.id);
    })


    let divStarsContainer = document.createElement("div");
    divStarsContainer.classList.add("stars-container");
    for(let i=0;i<5;i++){
        if(book.review >i){
            divStarsContainer.innerHTML +='<i class="fa-solid fa-star"></i>'
        }else{
            divStarsContainer.innerHTML +='<i class="fa-regular fa-star"></i>'
        }
    }

    let rewievNumber = document.createElement("p");
    rewievNumber.classList.add("rating-text")
    if(book.review>0){
        rewievNumber.innerText=`${book.review}/5`
    }else{
        rewievNumber.innerText= "0 ratings";
    }

    divStarsAndCart.appendChild(cartTag);
    divStarsAndCart.appendChild(divStarsContainer);
    divStarsAndCart.appendChild(rewievNumber);

    divTextConatiner.appendChild(divTitleAndAuthor);
    divTextConatiner.appendChild(divStarsAndCart);

    let linkToABookTag = document.createElement("a");
    linkToABookTag.classList.add("link-to-single-a-book");
    linkToABookTag.href =`index.php?page=book&id=${book.id}`;

    divImgContainer.appendChild(bookImg);
    article.appendChild(divImgContainer);
    article.appendChild(divTextConatiner);
    article.appendChild(linkToABookTag);

    return article;
}

function populateUserTables(users){
    let activeUsers = users[0].activeUsers;
    let deletedUsers = users[0].deletedUsers;
    let bannedUsers = users[0].bannedUsers;

    let activeUsersTable = document.querySelector('#table-active-users tbody');
    let deletedUsersTable = document.querySelector('#table-deleted-users tbody');
    let bannedUsersTable = document.querySelector('#table-banned-users tbody');

    while(activeUsersTable.firstChild)activeUsersTable.removeChild(activeUsersTable.firstChild);
    while(deletedUsersTable.firstChild)deletedUsersTable.removeChild(deletedUsersTable.firstChild);
    while(bannedUsersTable.firstChild)bannedUsersTable.removeChild(bannedUsersTable.firstChild);

    activeUsers.forEach(user=>{
        let trTag = document.createElement('tr');

        let tdTagUsername = document.createElement('td');
        let tdTagEmail = document.createElement('td');
        let tdTagRole = document.createElement('td');
        let tdTagCreatedAt = document.createElement('td');
        let tdTagChange = document.createElement('td');
        let tdTagBan = document.createElement('td');
        let tdTagDelete = document.createElement('td');

        tdTagUsername.textContent = user.username;
        tdTagEmail.textContent = user.email;
        tdTagRole.textContent = user.name;
        tdTagCreatedAt.textContent = user.created_at;

        let aTag = document.createElement('a');
        aTag.classList.add('safe-option');
        aTag.textContent = 'Change';
        aTag.setAttribute('href',`index.php?page=user-profile&selected-user=${user.id}`);
        tdTagChange.appendChild(aTag);

        let formBan = document.createElement('form');

        let inputUserId = document.createElement('input');
        inputUserId.setAttribute('type','text');
        inputUserId.setAttribute('name','userId');
        inputUserId.style.display = 'none';
        inputUserId.value = user.id;

        let inputButtonBan = document.createElement('input');
        inputButtonBan.setAttribute('type','button');
        inputButtonBan.classList.add('danger-option','ban-user');
        inputButtonBan.value = 'Ban';

        formBan.appendChild(inputUserId);
        formBan.appendChild(inputButtonBan);
        tdTagBan.appendChild(formBan);


        let formBDelete = document.createElement('form');

        let inputUserIdDelete = document.createElement('input');
        inputUserIdDelete.setAttribute('type','text');
        inputUserIdDelete.setAttribute('name','userId');
        inputUserIdDelete.style.display = 'none';
        inputUserIdDelete.value = user.id;

        let inputButtonDelete = document.createElement('input');
        inputButtonDelete.setAttribute('type','button');
        inputButtonDelete.classList.add('danger-option','delete-user');
        inputButtonDelete.value = 'Delete';

        formBDelete.appendChild(inputUserIdDelete);
        formBDelete.appendChild(inputButtonDelete);
        tdTagDelete.appendChild(formBDelete);

        trTag.appendChild(tdTagUsername);
        trTag.appendChild(tdTagEmail);
        trTag.appendChild(tdTagRole);
        trTag.appendChild(tdTagCreatedAt);
        trTag.appendChild(tdTagChange);
        trTag.appendChild(tdTagBan);
        trTag.appendChild(tdTagDelete);

        activeUsersTable.appendChild(trTag);
    })

    deletedUsers.forEach(user=>{
        let trTag = document.createElement('tr');

        let tdTagUsername = document.createElement('td');
        let tdTagEmail = document.createElement('td');
        let tdTagRole = document.createElement('td');
        let tdTagCreatedAt = document.createElement('td');
        let tdTagDeletedAt = document.createElement('td');
        let tdTagChange = document.createElement('td');
        let tdTagActivate = document.createElement('td');

        tdTagUsername.textContent = user.username;
        tdTagEmail.textContent = user.email;
        tdTagRole.textContent = user.name;
        tdTagCreatedAt.textContent = user.created_at;
        tdTagDeletedAt.textContent = user.deleted_at;

        let aTag = document.createElement('a');
        aTag.classList.add('safe-option');
        aTag.textContent = 'Change';
        aTag.setAttribute('href',`index.php?page=user-profile&selected-user=${user.id}`);
        tdTagChange.appendChild(aTag);

        let formActivate = document.createElement('form');

        let inputUserId = document.createElement('input');
        inputUserId.setAttribute('type','text');
        inputUserId.setAttribute('name','userId');
        inputUserId.style.display = 'none';
        inputUserId.value = user.id;

        let inputButtonActivate = document.createElement('input');
        inputButtonActivate.setAttribute('type','button');
        inputButtonActivate.classList.add('safe-option','activate-user');
        inputButtonActivate.value = 'Activate';

        formActivate.appendChild(inputUserId);
        formActivate.appendChild(inputButtonActivate);
        tdTagActivate.appendChild(formActivate);


        trTag.appendChild(tdTagUsername);
        trTag.appendChild(tdTagEmail);
        trTag.appendChild(tdTagRole);
        trTag.appendChild(tdTagCreatedAt);
        trTag.appendChild(tdTagDeletedAt);
        trTag.appendChild(tdTagChange);
        trTag.appendChild(tdTagActivate);

        deletedUsersTable.appendChild(trTag);
    })


    bannedUsers.forEach(user=>{
        let trTag = document.createElement('tr');

        let tdTagUsername = document.createElement('td');
        let tdTagEmail = document.createElement('td');
        let tdTagRole = document.createElement('td');
        let tdTagCreatedAt = document.createElement('td');
        let tdTagBannedAt = document.createElement('td');
        let tdTagChange = document.createElement('td');
        let tdTagAUnban = document.createElement('td');

        tdTagUsername.textContent = user.username;
        tdTagEmail.textContent = user.email;
        tdTagRole.textContent = user.name;
        tdTagCreatedAt.textContent = user.created_at;
        tdTagBannedAt.textContent = user.banned_at;

        let aTag = document.createElement('a');
        aTag.classList.add('safe-option');
        aTag.textContent = 'Change';
        aTag.setAttribute('href',`index.php?page=user-profile&selected-user=${user.id}`);
        tdTagChange.appendChild(aTag);

        let formUnban = document.createElement('form');

        let inputUserId = document.createElement('input');
        inputUserId.setAttribute('type','text');
        inputUserId.setAttribute('name','userId');
        inputUserId.style.display = 'none';
        inputUserId.value = user.id;

        let inputButtonUnban = document.createElement('input');
        inputButtonUnban.setAttribute('type','button');
        inputButtonUnban.classList.add('safe-option','unban-user');
        inputButtonUnban.value = 'Unban';

        formUnban.appendChild(inputUserId);
        formUnban.appendChild(inputButtonUnban);
        tdTagAUnban.appendChild(formUnban);


        trTag.appendChild(tdTagUsername);
        trTag.appendChild(tdTagEmail);
        trTag.appendChild(tdTagRole);
        trTag.appendChild(tdTagCreatedAt);
        trTag.appendChild(tdTagBannedAt);
        trTag.appendChild(tdTagChange);
        trTag.appendChild(tdTagAUnban);

        bannedUsersTable.appendChild(trTag);
    })


    setEventsForUserTable();
    setTableZebra();
}
function sectionGenerator(locationId,setId,heading,callback,data,typeOfArticle){

    let articleWidth;
    let articleGap;

    let section = document.getElementById(locationId);



    let headingTag = document.createElement("h2");
    headingTag.innerText = heading;
    headingTag.classList.add("section-heading");



    let articleContainerTag = document.createElement("div");
    articleContainerTag.classList.add("article-container");
    articleContainerTag.setAttribute("id",setId);

    for(let i=0; i<data.length;i++){
        let article;

        if(typeOfArticle === "books"){
            article = callback(data[i],false,true);
            articleWidth = 180;
            articleGap = 40;
            articleContainerTag.classList.add("article-book-container");
        }else if(typeOfArticle === "category"){
            article = callback(data[i].id);
            articleWidth = 250;
            articleGap = 20;
            articleContainerTag.classList.add("article-category-container");
        }else if(typeOfArticle === "info"){
            article = callback(data[i]);
            articleWidth = 220;
            articleGap = 20;
            articleContainerTag.classList.add("article-info-container");
        }
        else{

            let parametar = window.location.href.split('?');
            let nameAndValue = parametar[1].split('=');
            let idSkip = nameAndValue[1];

            if(data[i].id === idSkip)continue;

            article = callback(data[i].id);
            articleWidth = 180;
            articleGap = 40;
            articleContainerTag.classList.add("article-author-container");
        }


        articleContainerTag.appendChild(article);
    }

    section.appendChild(headingTag);
    section.appendChild(articleContainerTag);

    // Adding scrolling functionality

    // Creating left and right angle container
    let leftAngleDiv = document.createElement("div");
    let rightAngleDiv = document.createElement("div");

    leftAngleDiv.setAttribute("id",setId + "-left-angle-container");
    rightAngleDiv.setAttribute("id",setId + "-right-angle-container");

    leftAngleDiv.classList.add("angle-container");
    rightAngleDiv.classList.add("angle-container");

    // Addiing left and right angle icons
    leftAngleDiv.innerHTML = '<i class="fa-solid fa-angle-left"></i>';
    rightAngleDiv.innerHTML = '<i class="fa-solid fa-angle-right"></i>';

    leftAngleDiv.style.left = '-20px';
    rightAngleDiv.style.right = '-20px';

    leftAngleDiv.style.bottom = (articleContainerTag.offsetHeight/2 -20) + "px";
    rightAngleDiv.style.bottom = (articleContainerTag.offsetHeight/2 -20) + "px";



    section.appendChild(leftAngleDiv);
    section.appendChild(rightAngleDiv);

    checkAngleVisibility(setId,`${setId}-left-angle-container`,`${setId}-right-angle-container`);



    $(document).on("click",`#${setId}-left-angle-container`,()=>{
        scrollLeft(setId,articleWidth,articleGap,`${setId}-left-angle-container`,`${setId}-right-angle-container`);
    });
    $(document).on("click",`#${setId}-right-angle-container`,()=>{
        scrollRight(setId,articleWidth,articleGap,`${setId}-left-angle-container`,`${setId}-right-angle-container`);

    });

    $(document).on("wheel",`#${setId}`,()=>{
        checkAngleVisibility(setId,`${setId}-left-angle-container`,`${setId}-right-angle-container`);
    })

    window.addEventListener("resize",()=>{
        checkAngleVisibility(setId,`${setId}-left-angle-container`,`${setId}-right-angle-container`);
    })
}

function setItemToLocalStorage(name,value){
    localStorage.setItem(name,JSON.stringify(value));
}

function checkAngleVisibility(idElement,idLeft,idRight){
    let container = document.getElementById(idElement);

    let leftAngle = document.getElementById(idLeft);
    let rightAngle = document.getElementById(idRight);

    if(container.scrollLeft === 0){
        leftAngle.style.display = "none";
    }else{
        leftAngle.style.display = "grid";
    }

    if((container.scrollWidth - (container.scrollLeft + container.clientWidth)) >0 ){
        rightAngle.style.display = "grid";
    }else{
        rightAngle.style.display = "none";
    }
}

function addToCart(id){

    let cookieValue = document.cookie.replace(/(?:^|.*;\s*)cart\s*=\s*([^;]*).*$|^.*$/, "$1");
    cookieValue = decodeURIComponent(cookieValue.replace(/\+/g, ' '));

    if(!cookieValue){
        window.location.href = `index.php?page=login`;
        return;
    }

    let cart = JSON.parse(cookieValue);
    console.log(" ");
    console.log("JS:");
    cart.forEach(car=>{
        console.log(car);
    })

    let item = cart.find(x=>x.id === id);

    if(item == null){
        item = {
            id : id,
            quantity:1
        }
        cart.push(item);
    }else{
        item.quantity++;
    }

    let jsonString = JSON.stringify(cart);
    document.cookie = `cart=${jsonString};path=/;`;

    $.ajax({
        url: 'models/cart/cart-logic.php',
        type: 'POST',
        data: {},
        contentType: false,
        processData: false,
        success: function(response) {
            console.log(" ")
            console.log("PHP:")
            console.log(response);
        },
        error: function(xhr, status, errorThrown) {
            let messages = JSON.parse(xhr.responseText);

            console.log(messages)
            console.log(xhr);
            console.log(status, errorThrown);
        }
    });
}

function setHeader(){
    $(document).on("click","#menu-icon-open",openPhoneNavigation);
    $(document).on("click","#menu-icon-close",closePhoneNavigation);
    $(document).on("click","#dark-mode-icon",toggleTheme);
    $(document).on("click","#light-mode-icon",toggleTheme);

    toggleThemeIcon();
}

function closePhoneNavigation(){

    let phoneNav = document.querySelector(".phone-nav");
    phoneNav.classList.remove("nav-entering");
    phoneNav.classList.add("nav-leaving");


    setTimeout(() => {
        $("body").removeClass("pre-loader");
        phoneNav.classList.remove("display-phone-nav");

    }, 450);
}

function openPhoneNavigation(){
    let phoneNav = document.querySelector(".phone-nav");

    $("body").addClass("pre-loader");

    phoneNav.classList.add("display-phone-nav");
    phoneNav.classList.add("nav-entering");
    phoneNav.classList.remove("nav-leaving");
}

function toggleThemeIcon(){
    let light = document.getElementById("light-mode-icon");
    let dark = document.getElementById("dark-mode-icon");

    if(document.body.classList.contains("light-mode")){
        dark.style.display= "block";
        light.style.display = "none";
    }else{
        light.style.display= "block";
        dark.style.display = "none";
    }

}

function toggleTheme(){
    let theme;

    if(document.body.classList.contains("light-mode")){
        document.body.classList.remove("light-mode");
        document.body.classList.add("dark-mode");
        toggleThemeIcon()
        theme = "dark";
    }else{
        document.body.classList.add("light-mode");
        document.body.classList.remove("dark-mode");
        toggleThemeIcon()
        theme = "light"
    }

    setItemToLocalStorage("theme", theme);
}

function setThemeClass(){
    let prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)");
    let currentTheme = getItemFromLocalStorage("theme");

    if (currentTheme === "dark")
    {
        document.body.classList.toggle("dark-mode");
    }
    else if (currentTheme === "light")
    {
        document.body.classList.toggle("light-mode");
    }
    else if(prefersDarkScheme.matches){
        document.body.classList.toggle("dark-mode");
    }else{
        document.body.classList.toggle("light-mode");
    }
}

function getItemFromLocalStorage(name){
    return JSON.parse(localStorage.getItem(name));
}
