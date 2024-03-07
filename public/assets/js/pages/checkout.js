console.log("readily.com/checkout")

setTableZebra();

setCheckoutForm();
async function updateCart(numberTag){
    let idBookOrder = numberTag.getAttribute('data-book-order-id');

    let cookieValue = document.cookie.replace(/(?:^|.*;\s*)cart\s*=\s*([^;]*).*$|^.*$/, "$1");
    cookieValue = decodeURIComponent(cookieValue.replace(/\+/g, ' '));
    let cart = JSON.parse(cookieValue)

    for(let i=0;i<cart.length;i++){
        if(cart[i].id == idBookOrder){
            cart[i].quantity = numberTag.value;
        }
    }

    let jsonString = JSON.stringify(cart);
    document.cookie = `cart=${jsonString};path=/;`;

    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let response =await fetch(  `/cart`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        }
    })

    let result = await response.json()
    if (response.ok) {
        toastr.success(result.message);

        let totalAmountBox = document.getElementById('total-price');
        totalAmountBox.textContent = `Total: ${result.totalAmount}`;

        removeTableZebra();
        setTableZebra();
    }else{
        console.log(result)
        toastr.error(result.message);
    }

    console.log(numberTag.value);
}
async function  removeCheckoutRow(removeButton){
    let idBookOrder = removeButton.getAttribute('data-book-order-id');

    let cookieValue = document.cookie.replace(/(?:^|.*;\s*)cart\s*=\s*([^;]*).*$|^.*$/, "$1");
    cookieValue = decodeURIComponent(cookieValue.replace(/\+/g, ' '));
    let cart = JSON.parse(cookieValue)

    for(let i=0;i<cart.length;i++){
        if(cart[i].id == idBookOrder){

            cart.splice(i,1);
        }
    }

    let jsonString = JSON.stringify(cart);
    document.cookie = `cart=${jsonString};path=/;`;

    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let response =await fetch(  `/cart`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        }
    })


    let result = await response.json()
    if (response.ok) {
        toastr.success(result.message);
        removeButton.parentNode.parentNode.parentNode.parentNode.removeChild(removeButton.parentNode.parentNode.parentNode)

        let totalAmountBox = document.getElementById('total-price');
        totalAmountBox.textContent = `Total: ${result.totalAmount}`;

        if(result.totalAmount == 0){
            let trEmptyTag = document.getElementById("empty");
            trEmptyTag.style.display = "block"
        }

        removeTableZebra();
        setTableZebra();
    }else{
        console.log(result)
        toastr.error(result.message);
    }
}

function setCheckoutForm(){
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

    $(document).on('click','.checkout-button',sendCheckoutData);
}


function sendCheckoutData(){
    let errorCount = 0;

    errorCount += checkInputElementWithRegex(/^[a-zšđžćčA-ZŠĐŽĆČ0-9\s.\-#\\/,]+$/,'address-line-input-js','address-line-error');
    errorCount += checkInputElementWithRegex(/^\d+[a-zA-Z]?$/,'number-input-js','number-error');
    errorCount += checkInputElementWithRegex(/^([A-ZŠĐŽĆČ][a-zšđžćč]{2,}\s?)+$/,'city-input-js','city-error');
    errorCount += checkInputElementWithRegex(/^([A-ZŠĐČĆŽ][a-zšđčćž]{2,}\s?)+$/,'state-input-js','state-error');
    errorCount += checkInputElementWithRegex(/^([A-ZŠĐČĆŽ][a-zšđčćž]{2,}\s?)+$/,'country-input-js','country-error');
    errorCount += checkInputElementWithRegex(/^\d{5,15}$/,'zip-code-input-js','zip-code-error');

    let cookieValue = document.cookie.replace(/(?:^|.*;\s*)cart\s*=\s*([^;]*).*$|^.*$/, "$1");
    cookieValue = decodeURIComponent(cookieValue.replace(/\+/g, ' '));
    let cart = JSON.parse(cookieValue);

    if(!cart.length){
        errorCount++;
        let message = ['Your cart is empty. Please add a book to proceed with the purchase.'];
        displayServerMessages('server-messages',message,'error-message');

    }

    return true;
}


