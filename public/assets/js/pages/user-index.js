console.log("readily.com/users/{id}")

setUpdateUserForm();

function setUpdateUserForm(){
    $(document).on('change','#user-avatar-js',uploadAvatar);
    $(document).on('blur','#biography-input-js',checkBiography);

    $(document).on('blur','#first-name-input-js',()=>{
        checkInputElementWithRegex(/^[A-ZŠĐĆČŽ][a-zšđčćž]{2,}( [A-ZŠĐĆČŽ][a-zšđčćž]{2,})*$/,'first-name-input-js','first-name-error');
    });
    $(document).on('blur','#last-name-input-js',()=>{
        checkInputElementWithRegex(/^[A-ZŠĐĆČŽ][a-zšđčćž]{2,}( [A-ZŠĐĆČŽ][a-zšđčćž]{2,})*$/,'last-name-input-js','last-name-error');
    });
    $(document).on('blur','#username-input-js',()=>{
        checkInputElementWithRegex(/^[a-zA-Z0-9.šđžćčČĆŠĐŽ()\/\-_]{5,}$/,'username-input-js','username-error');
    });
    $(document).on('blur','#email-input-js',()=>{
        checkInputElementWithRegex(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,'email-input-js','email-error');
    });
    $(document).on('blur','#phone-input-js',()=>{
        checkInputElementWithRegex(/^\d{5,15}$/,'phone-input-js','phone-error');
    });
    $(document).on('blur','#address-line-input-js',()=>{
        checkInputElementWithRegex(/^[a-zšđžćčA-ZŠĐŽĆČ0-9\s.\-#\\/,]+$/,'address-line-input-js','address-line-error');
    });
    $(document).on('blur','#number-input-js',()=>{
        checkInputElementWithRegex(/^\d+[a-zA-Z]?$/,'number-input-js','number-error');
    });
    $(document).on('blur','#city-input-js',()=>{
        checkInputElementWithRegex(/^([A-ZŠĐŽĆČ][a-zšđžćč]{2,}\s?)+$/,'city-input-js','city-error');
    });
    $(document).on('blur','#state-input-js',()=>{
        checkInputElementWithRegex(/^([A-ZŠĐČĆŽ][a-zšđčćž]{2,}\s?)+$/,'state-input-js','state-error');
    });
    $(document).on('blur','#country-input-js',()=>{
        checkInputElementWithRegex(/^([A-ZŠĐČĆŽ][a-zšđčćž]{2,}\s?)+$/,'country-input-js','country-error');
    });
    $(document).on('blur','#zip-code-input-js',()=>{
        checkInputElementWithRegex(/^\d{5,15}$/,'zip-code-input-js','zip-code-error');
    });

    $(document).on('click','#save-account-button',saveUpdatedUserData);
}

function setUserData(){

    document.getElementById('user-avatar-js').value = "";

    let avatarImg = document.getElementById('user-avatar-img');

    let cookie = document.cookie.split(';');

    for(let i=0; i<cookie.length;i++){

        let name = cookie[i].trim().split('=')[0];
        let value = decodeURIComponent(cookie[i].trim().split('=')[1]);

        switch(name){
            case 'avatarSrc':
                avatarImg.setAttribute('src',`../assets/images/avatars/${value}`);
                break;
            case 'firstName':
                document.getElementById('first-name-input-js').value = value;
                document.querySelector('p.first-name-input').textContent = value;
                break;
            case 'lastName':
                document.getElementById('last-name-input-js').value = value;
                document.querySelector('p.last-name-input').textContent = value;
                break;
            case 'username':
                document.getElementById('username-input-js').value = value;
                document.querySelector('p.username-input').textContent = value;
                break;
            case 'email':
                document.getElementById('email-input-js').value = value;
                document.querySelector('p.email-input').textContent = value;
                break;
            case 'phone':
                document.getElementById('phone-input-js').value = value;
                document.querySelector('p.phone-input').textContent = value;
                break;
            case 'biographyText':
                document.getElementById('biography-input-js').value = value;
                document.querySelector('p.biography-input').textContent = value;
                break;
            case 'addressLine':
                document.getElementById('address-line-input-js').value = value === '/' ? '': value;
                document.querySelector('p.address-line-input').textContent = value;
                break;
            case 'addressNumber':
                document.getElementById('number-input-js').value = value === '/' ? '': value;
                document.querySelector('p.number-input').textContent = value;
                break;
            case 'city':
                document.getElementById('city-input-js').value = value === '/' ? '': value;
                document.querySelector('p.city-input').textContent = value;
                break;
            case 'state':
                document.getElementById('state-input-js').value = value === '/' ? '': value;
                document.querySelector('p.state-input').textContent = value;
                break;
            case 'zipCode':
                document.getElementById('zip-code-input-js').value = value === '/' ? '': value;
                document.querySelector('p.zip-code-input').textContent = value;
                break;
            case 'country':
                document.getElementById('country-input-js').value = value === '/' ? '': value;
                document.querySelector('p.country-input').textContent = value;
                break;

        }
    }
}


function deleteUser(){
    return window.confirm("This account will be permanently deleted.")
}

function saveUpdatedUserData(){
    let errorCount = 0;

    let addressLine = document.getElementById('address-line-input-js').value;
    let addressNumber = document.getElementById('number-input-js').value;
    let city = document.getElementById('city-input-js').value;
    let state = document.getElementById('state-input-js').value;
    let zipCode = document.getElementById('zip-code-input-js').value;
    let country = document.getElementById('country-input-js').value;
    let role = parseInt(document.getElementById('role-input').value)

    errorCount += checkAvatar();
    errorCount += checkInputElementWithRegex(/^[A-ZŠĐĆČŽ][a-zšđčćž]{2,}( [A-ZŠĐĆČŽ][a-zšđčćž]{2,})*$/,'first-name-input-js','first-name-error');
    errorCount += checkInputElementWithRegex(/^[A-ZŠĐĆČŽ][a-zšđčćž]{2,}( [A-ZŠĐĆČŽ][a-zšđčćž]{2,})*$/,'last-name-input-js','last-name-error');
    errorCount += checkInputElementWithRegex(/^[a-zA-Z0-9.šđžćčČĆŠĐŽ()\/\-_]{5,}$/,'username-input-js','username-error');
    errorCount += checkInputElementWithRegex(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,'email-input-js','email-error');
    errorCount += checkInputElementWithRegex(/^\d{5,15}$/,'phone-input-js','phone-error');
    if(role === 3){
        errorCount += checkBiography();
    }

    if(addressLine.length || addressNumber.length || city.length || state.length || zipCode.length || country.length){
        errorCount += checkInputElementWithRegex(/^[a-zšđžćčA-ZŠĐŽĆČ0-9\s.\-#\\/,]+$/,'address-line-input-js','address-line-error');
        errorCount += checkInputElementWithRegex(/^\d+[a-zA-Z]?$/,'number-input-js','number-error');
        errorCount += checkInputElementWithRegex(/^([A-ZŠĐŽĆČ][a-zšđžćč]{2,}\s?)+$/,'city-input-js','city-error');
        errorCount += checkInputElementWithRegex(/^([A-ZŠĐČĆŽ][a-zšđčćž]{2,}\s?)+$/,'state-input-js','state-error');
        errorCount += checkInputElementWithRegex(/^([A-ZŠĐČĆŽ][a-zšđčćž]{2,}\s?)+$/,'country-input-js','country-error');
        errorCount += checkInputElementWithRegex(/^\d{5,15}$/,'zip-code-input-js','zip-code-error');
    }

    if(errorCount){
        return;
    }

    let form = document.getElementById('update-user-form');
    let formData = new FormData(form);

    $.ajax({
        url: 'models/user/update-user-info.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function() {
            location.reload();
        },
        error: function(xhr, status, errorThrown) {
            let messages = JSON.parse(xhr.responseText);
            displayServerMessages('error-server-messages',messages,'error-message');

            console.log(messages)
            console.log(xhr);
            console.log(status, errorThrown);
        }
    });
}


