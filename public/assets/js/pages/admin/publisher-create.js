$(document).on('blur','#publisher-name',()=>{
    checkInputElementWithRegex(/^[A-ZŠĐĆČŽ][a-zšđčćž']{2,}( [A-ZŠĐĆČŽ][a-zšđčćž']{2,})*$/,'publisher-name','publisher-name-error');
})

function checkPublisher(){
    return !checkInputElementWithRegex(/^[A-ZŠĐĆČŽ][a-zšđčćž']{2,}( [A-ZŠĐĆČŽ][a-zšđčćž']{2,})*$/,'publisher-name','publisher-name-error');
}
