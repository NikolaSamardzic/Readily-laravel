console.log("readily.com/users/create")

setSignupForm();

function setSignupForm(){
    $(document).on('change','#user-avatar-js',uploadAvatar);
    $(document).on('change','#role-input-js',()=>{
        checkRole();
        setBiography();
    });
    $(document).on('blur','#biography-input',checkBiography);

    $(document).on('blur','#first-name-input-js',()=>{
        checkInputElementWithRegex(/^[A-ZŠĐĆČŽ][a-zšđčćž]{2,}( [A-ZŠĐĆČŽ][a-zšđčćž]{2,})*$/,'first-name-input-js','first-name-error');
    });
    $(document).on('blur','#last-name-input-js',()=>{
        checkInputElementWithRegex(/^[A-ZŠĐĆČŽ][a-zšđčćž]{2,}( [A-ZŠĐĆČŽ][a-zšđčćž]{2,})*$/,'last-name-input-js','last-name-error');
    });
    $(document).on('blur','#username-input-js',()=>{
        checkInputElementWithRegex(/^[a-zA-Z0-9.šđžćčČĆŠĐŽ()\/\-_]{5,}$/,'username-input-js','username-error');
    });
    $(document).on('blur','#password-input-js',()=>{
        checkInputElementWithRegex(/^(?=.*[a-zšđčćž])(?=.*[A-ZČĆŽŠĐ])(?=.*\d)(?=.*[._()/\-])[A-ZŠĐĆŽČa-zšđčćž\d._()/\-]{5,}$/,'password-input-js','password-error');
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

    $(document).on('click','#create-account-button',sendSignupData);
}

function setBiography(){
    let role = parseInt(document.getElementById('role-input-js').value);

    let title = document.getElementById('biography-title');
    let textarea = document.getElementById('biography-input');
    let errorMessage = document.getElementById('biography-error');

    if(role === 3){
        title.style.display = 'block';
        textarea.style.display = 'block';
        textarea.value = " ";
        errorMessage.style.display = 'none';
        return;
    }

    title.style.display = 'none';
    textarea.style.display = 'none';
    errorMessage.style.display = 'none';
}

function sendSignupData(){
    let errorCount = 0;

    let addressLine = document.getElementById('address-line-input-js').value;
    let addressNumber = document.getElementById('number-input-js').value;
    let city = document.getElementById('city-input-js').value;
    let state = document.getElementById('state-input-js').value;
    let zipCode = document.getElementById('zip-code-input-js').value;
    let country = document.getElementById('country-input-js').value;
    let role = document.getElementById('role-input-js').value;

    errorCount += checkAvatar();
    errorCount += checkInputElementWithRegex(/^[A-ZŠĐĆČŽ][a-zšđčćž]{2,}( [A-ZŠĐĆČŽ][a-zšđčćž]{2,})*$/,'first-name-input-js','first-name-error');
    errorCount += checkInputElementWithRegex(/^[A-ZŠĐĆČŽ][a-zšđčćž]{2,}( [A-ZŠĐĆČŽ][a-zšđčćž]{2,})*$/,'last-name-input-js','last-name-error');
    errorCount += checkInputElementWithRegex(/^[a-zA-Z0-9.šđžćčČĆŠĐŽ()\/\-_]{5,}$/,'username-input-js','username-error');
    errorCount += checkInputElementWithRegex(/^(?=.*[a-zšđčćž])(?=.*[A-ZČĆŽŠĐ])(?=.*\d)(?=.*[._()/\-])[A-ZŠĐĆŽČa-zšđčćž\d._()/\-]{5,}$/,'password-input-js','password-error');
    errorCount += checkInputElementWithRegex(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,'email-input-js','email-error');
    errorCount += checkInputElementWithRegex(/^\d{5,15}$/,'phone-input-js','phone-error');
    errorCount += checkRole();
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

    return errorCount;
}

function clearAllInputValues(){
    document.getElementById('user-avatar-js').value = "";

    let avatarImg = document.getElementById('user-avatar-img');
    avatarImg.setAttribute('src','assets/images/avatars/default-avatar.jpg');

    document.getElementById('first-name-input-js').value = "";
    document.getElementById('last-name-input-js').value = "";
    document.getElementById('username-input-js').value = "";
    document.getElementById('password-input-js').value = "";
    document.getElementById('email-input-js').value = "";
    document.getElementById('phone-input-js').value = "";
    document.getElementById('biography-input-js').value = "";

    document.getElementById('address-line-input-js').value = "";
    document.getElementById('number-input-js').value = "";
    document.getElementById('city-input-js').value = "";
    document.getElementById('state-input-js').value = "";
    document.getElementById('zip-code-input-js').value = "";
    document.getElementById('country-input-js').value = "";
}

