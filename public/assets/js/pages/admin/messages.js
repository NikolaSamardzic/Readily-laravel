console.log("readily.com/admin/messages")
setTableZebra();

messageTable = document.getElementById('active-message-body')

function deleteMessageRow(buttonTag){
    let deliveryId = buttonTag.getAttribute('data-id');
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    $.ajax({
        url:`/messages/${deliveryId}`,
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

            messageTable.removeChild(row);

            removeTableZebra();
            setTableZebra();
        },
        error: (result)=>{
            console.log(result)
            toastr.error(result);
        }
    })
}
