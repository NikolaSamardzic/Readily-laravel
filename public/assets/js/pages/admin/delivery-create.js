$(document).on('blur','#delivery-type-name',()=>{
    checkInputElementWithRegex(/^[A-ZŠĐĆČŽ][a-zšđčćž]{2,}( [A-ZŠĐĆČŽ][a-zšđčćž]{2,})*$/,'delivery-type-name','delivery-type-name-error');
})

function checkDelivery(){
    return  !checkInputElementWithRegex(/^[A-ZŠĐĆČŽ][a-zšđčćž]{2,}( [A-ZŠĐĆČŽ][a-zšđčćž]{2,})*$/,'delivery-type-name','delivery-type-name-error');
}
