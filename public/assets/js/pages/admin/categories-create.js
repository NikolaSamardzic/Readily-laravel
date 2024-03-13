$(document).on('blur','#category-name',()=>{
    checkInputElementWithRegex(/^[A-ZŠĐĆČŽ][a-zšđčćž']{2,}( [A-ZŠĐĆČŽ][a-zšđčćž']{2,})*$/,'category-name','category-name-error');
});

function checkCategory(){
    return checkInputElementWithRegex(/^[A-ZŠĐĆČŽ][a-zšđčćž']{2,}( [A-ZŠĐĆČŽ][a-zšđčćž']{2,})*$/,'category-name','category-name-error');
}
