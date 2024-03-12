console.log("readily.com/admin/delivery-options")
setTableZebra();

let activeDeliveryTable = document.getElementById('active-delivery-body');
let deletedDeliveryTable = document.getElementById('deleted-delivery-body');

function deleteDeliveryRow(buttonTag){
    console.log('radi')
    let deliveryId = buttonTag.getAttribute('data-id');
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


    $.ajax({
        url:`/deliveries/${deliveryId}`,
        method:'DELETE',
        processData: false,
        headers: {
            Accept: "application/json; charset=utf-8",
            'X-CSRF-TOKEN': csrfToken
        },
        contentType: false,
        success: (result) =>{

            toastr.success(result.message);

            let row = buttonTag.parentNode.parentNode;

            row.cells[4].firstChild.textContent = 'Activate';
            row.cells[4].firstChild.setAttribute('onclick', 'activateDeliveryRow(this)');
            row.cells[4].firstChild.classList.remove('danger-option');
            row.cells[4].firstChild.classList.add('safe-option');

            deletedDeliveryTable.insertBefore(row, deletedDeliveryTable.firstChild);

            removeTableZebra();
            setTableZebra();
        },
        error: (result)=>{
            console.log(result)
            toastr.error(result);
        }
    })
}

function activateDeliveryRow(buttonTag){
    let deliveryId = buttonTag.getAttribute('data-id');
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    $.ajax({
        url:`/deliveries/${deliveryId}/activate`,
        method:'PUT',
        processData: false,
        headers: {
            Accept: "application/json; charset=utf-8",
            'X-CSRF-TOKEN': csrfToken
        },
        contentType: false,
        success: (result) =>{

            toastr.success(result.message);

            let row = buttonTag.parentNode.parentNode;

            row.cells[4].firstChild.textContent = 'Delete';
            row.cells[4].firstChild.setAttribute('onclick', 'deleteDeliveryRow(this)');
            row.cells[4].firstChild.classList.remove('safe-option');
            row.cells[4].firstChild.classList.add('danger-option');

            activeDeliveryTable.insertBefore(row, activeDeliveryTable.firstChild);

            removeTableZebra();
            setTableZebra();
        },
        error: (result)=>{
            console.log(result)
            toastr.error(result);
        }
    })
}
