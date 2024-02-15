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


// function sendLoginData(){
//     let errorCount = 0;
//
//     errorCount += checkInputElementWithRegex(/^[a-zA-Z0-9.šđžćčČĆŠĐŽ()\/\-_]{5,}$/,'username-input-js','username-error');
//     errorCount += checkInputElementWithRegex(/^(?=.*[a-zšđčćž])(?=.*[A-ZČĆŽŠĐ])(?=.*\d)(?=.*[._()/\-])[A-ZŠĐĆŽČa-zšđčćž\d._()/\-]{5,}$/,'password-input-js','password-error');
//
//     if(errorCount){
//         return;
//     }
//
//     let form = document.getElementById('login-form');
//     let formData = new FormData(form);
//
//     $.ajax({
//         url: 'models/login/login.php',
//         type: 'POST',
//         data: formData,
//         contentType: false,
//         processData: false,
//         success: function(response) {
//             // console.log(response);
//             window.location.href = 'index.php?page=home';
//         },
//         error: function(xhr, status, errorThrown) {
//             let messages = JSON.parse(xhr.responseText);
//             displayServerMessages('server-messages',messages,'error-message');
//
//             console.log(messages)
//             console.log(xhr);
//             console.log(status, errorThrown);
//         }
//     });
// }
