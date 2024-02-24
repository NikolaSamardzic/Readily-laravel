//import '../utilities/utilities.js';
console.log("readily.com/login");

setLoginForm();

function setLoginForm(){
    $(document).on('blur','#username-input-js',()=>{
        checkInputElementWithRegex(/^[a-zA-Z0-9.šđžćčČĆŠĐŽ()\/\-_]{5,}$/,'username-input-js','username-error');
    });
    $(document).on('blur','#password-input-js',()=>{
        checkInputElementWithRegex(/^(?=.*[a-zšđčćž])(?=.*[A-ZČĆŽŠĐ])(?=.*\d)(?=.*[._()/\-])[A-ZŠĐĆŽČa-zšđčćž\d._()/\-]{5,}$/,'password-input-js','password-error');
    });

    //$(document).on('click','#log-in-button',sendLoginData);
}


function sendLoginData(){
    let errorCount = 0;

    errorCount += checkInputElementWithRegex(/^[a-zA-Z0-9.šđžćčČĆŠĐŽ()\/\-_]{5,}$/,'username-input-js','username-error');
    errorCount += checkInputElementWithRegex(/^(?=.*[a-zšđčćž])(?=.*[A-ZČĆŽŠĐ])(?=.*\d)(?=.*[._()/\-])[A-ZŠĐĆŽČa-zšđčćž\d._()/\-]{5,}$/,'password-input-js','password-error');

    return !errorCount;
}
