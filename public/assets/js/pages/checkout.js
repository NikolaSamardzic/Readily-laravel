console.log("readily.com/checkout")

setTableZebra();

setCheckoutTableEvents();
setCheckoutForm();

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

function setCheckoutTableEvents(){
    let removeTags = document.querySelectorAll('.fa-xmark');

    removeTags.forEach(tag=>{
        tag.addEventListener('click',()=>{
            let tagId = tag.getAttribute('id')
            let idBook = parseInt(tagId.match(/\d+$/)[0]);
            console.log(idBook)


            let cookieValue = document.cookie.replace(/(?:^|.*;\s*)cart\s*=\s*([^;]*).*$|^.*$/, "$1");
            cookieValue = decodeURIComponent(cookieValue.replace(/\+/g, ' '));
            let cart = JSON.parse(cookieValue);

            for(let i=0;i<cart.length;i++){
                if(cart[i].id === idBook){
                    cart.splice(i,1);
                }
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
                    displayUserCartTable(response);
                    setCheckoutTableEvents();
                    setTableZebra();
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
        })
    })

    let inputTags = document.querySelectorAll('.input-qunatity');

    inputTags.forEach(tag=>{
        tag.addEventListener('change',()=>{
            let tagId = tag.getAttribute('id')
            console.log('id ' + tagId)
            let idBook = parseInt(tagId.match(/\d+$/)[0]);
            let quantityValue = document.getElementById(`quantity-${idBook}`).value;


            let cookieValue = document.cookie.replace(/(?:^|.*;\s*)cart\s*=\s*([^;]*).*$|^.*$/, "$1");
            cookieValue = decodeURIComponent(cookieValue.replace(/\+/g, ' '));
            let cart = JSON.parse(cookieValue);

            for(let i=0;i<cart.length;i++){
                if(cart[i].id === idBook){
                    if(Number(quantityValue) !== 0){
                        cart[i].quantity = quantityValue;
                    }else{
                        cart.splice(i,1);
                    }
                }

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
                    displayUserCartTable(response);
                    setCheckoutTableEvents();
                    setTableZebra();
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
        })
    })

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

    if(errorCount){
        return;
    }


    let form = document.getElementById('delivery-form');
    let formData = new FormData(form);

    $.ajax({
        url: 'models/order/order-logic.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            clearAllInputValuesCheckout();
            clearAllInputErrorsCheckout();

            displayServerMessages('server-messages',response,'success-message');
        },
        error: function(xhr, status, errorThrown) {
            let messages = JSON.parse(xhr.responseText);
            displayServerMessages('server-messages',messages,'error-message');

            console.log(messages)
            console.log(xhr);
            console.log(status, errorThrown);
        }
    });
}


function clearAllInputErrorsCheckout(){
    document.getElementById('address-line-error').style.display = 'none';
    document.getElementById('number-error').style.display = 'none';
    document.getElementById('delivery-error').style.display = 'none';
    document.getElementById('city-error').style.display = 'none';
    document.getElementById('state-error').style.display = 'none';
    document.getElementById('zip-code-error').style.display = 'none';
    document.getElementById('country-error').style.display = 'none';

    let messagesContainer = document.querySelector('.server-messages');
    while(messagesContainer.firstChild)messagesContainer.removeChild(messagesContainer.firstChild);
}

function displayUserCartTable(books){
    let tbodyElement = document.getElementById('tbody-checkout');

    while(tbodyElement.firstChild)tbodyElement.removeChild(tbodyElement.firstChild);


    if(books.length === 0){
        let trEmptyTag = document.getElementById("empty");
        trEmptyTag.style.display = "block"
    }else{

        let trEmptyTag = document.getElementById("empty");
        //console.log(trEmptyTag);
        trEmptyTag.style.display = "none";
    }

    let totalPrice = 0;

    for(let i=0;i<books.length;i++){
        let book = books[i];
        let trTag = document.createElement("tr");
        trTag.setAttribute("id",`tr-${book.id}`);

        let imgTag = document.createElement("img");
        imgTag.classList.add("set-brightness");
        imgTag.src = `assets/images/books/small/${book.src}`;
        imgTag.alt = book.title;

        let tdTagImg = document.createElement("td")
        tdTagImg.classList.add("td-image");
        tdTagImg.appendChild(imgTag);

        let titleTag = document.createElement("p");
        titleTag.innerText = book.title;

        let titleContainer = document.createElement("div");
        titleContainer.appendChild(titleTag);

        let tdTitle = document.createElement("td");
        tdTitle.classList.add("td-title")
        tdTitle.appendChild(titleContainer)

        let unitPriceTag = document.createElement("p");
        unitPriceTag.innerText = `$${book.price}.00`;

        let tdUnitPriceTag = document.createElement("td");
        tdUnitPriceTag.classList.add("td-unit-price")
        tdUnitPriceTag.appendChild(unitPriceTag);

        let quantityTag = document.createElement("input");
        quantityTag.classList.add('input-qunatity');
        quantityTag.setAttribute("min","0");
        quantityTag.type = "number";
        quantityTag.setAttribute("id",`quantity-${book.id}`);
        quantityTag.value = `${book.quantity}`;



        let quantityTagContainer = document.createElement("div");
        quantityTagContainer.appendChild(quantityTag);

        let tdQuantity = document.createElement("td");
        tdQuantity.classList.add("td-quantity");
        tdQuantity.appendChild(quantityTagContainer)


        let priceTag = document.createElement("p");
        priceTag.setAttribute("id",`price-${book.id}`);
        priceTag.innerText = "$ " + (book.price *book.quantity).toFixed(2);
        totalPrice += book.price *book.quantity;

        let tdPrice = document.createElement("td");
        tdPrice.classList.add("td-price");
        tdPrice.appendChild(priceTag)

        let removeTag = document.createElement("i");
        removeTag.classList.add("fa-solid","fa-xmark");
        removeTag.setAttribute("id",`remove-${book.id}`);

        let removeTagContainer = document.createElement("div");
        removeTagContainer.appendChild(removeTag);

        let tdRemove = document.createElement("td");
        tdRemove.classList.add("td-remove");

        tdRemove.appendChild(removeTagContainer);

        trTag.appendChild(tdTagImg);
        trTag.appendChild(tdTitle);
        trTag.appendChild(tdUnitPriceTag);
        trTag.appendChild(tdQuantity);
        trTag.appendChild(tdPrice);
        trTag.appendChild(tdRemove);

        tbodyElement.appendChild(trTag);


    }

    let totalPriceTag = document.getElementById('total-price');
    totalPriceTag.textContent = `$${totalPrice}.00`;
}

function clearAllInputValuesCheckout(){
    displayUserCartTable([]);

    document.getElementById('address-line-input-js').value = '';
    document.getElementById('number-input-js').value = '';
    document.getElementById('city-input-js').value = '';
    document.getElementById('state-input-js').value = '';
    document.getElementById('zip-code-input-js').value = '';
    document.getElementById('country-input-js').value = '';
}
