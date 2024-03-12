console.log("readily.com/admin/publishers")
setTableZebra();

let activePublisherTable = document.getElementById('active-publishers-body');
let deletedPublisherTable = document.getElementById('deleted-publishers-body');

function deletePublisherRow(buttonTag){
    let publisherId = buttonTag.getAttribute('data-id');
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


    $.ajax({
        url:`/publishers/${publisherId}`,
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
            row.cells[4].firstChild.setAttribute('onclick', 'activatePublisherRow(this)');
            row.cells[4].firstChild.classList.remove('danger-option');
            row.cells[4].firstChild.classList.add('safe-option');

            deletedPublisherTable.insertBefore(row, deletedPublisherTable.firstChild);

            removeTableZebra();
            setTableZebra();
        },
        error: (result)=>{
            console.log(result)
            toastr.error(result);
        }
    })
}

function activatePublisherRow(buttonTag){
    let deliveryId = buttonTag.getAttribute('data-id');
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    $.ajax({
        url:`/publishers/${deliveryId}/activate`,
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
            row.cells[4].firstChild.setAttribute('onclick', 'deletePublisherRow(this)');
            row.cells[4].firstChild.classList.remove('safe-option');
            row.cells[4].firstChild.classList.add('danger-option');

            activePublisherTable.insertBefore(row, activePublisherTable.firstChild);

            removeTableZebra();
            setTableZebra();
        },
        error: (result)=>{
            console.log(result)
            toastr.error(result);
        }
    })
}
