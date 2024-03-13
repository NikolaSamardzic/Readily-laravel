console.log("readily.com/admin/publishers")
setTableZebra();

let activeCategoryTable = document.getElementById('active-category-body');
let deletedCategoryTable = document.getElementById('deleted-category-body');

function deleteCategoryRow(buttonTag){
    let categoryId = buttonTag.getAttribute('data-id');
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


    $.ajax({
        url:`/categories/${categoryId}`,
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

            row.cells[5].firstChild.textContent = 'Activate';
            row.cells[5].firstChild.setAttribute('onclick', 'activateCategoryRow(this)');
            row.cells[5].firstChild.classList.remove('danger-option');
            row.cells[5].firstChild.classList.add('safe-option');

            deletedCategoryTable.insertBefore(row, deletedCategoryTable.firstChild);

            removeTableZebra();
            setTableZebra();
        },
        error: (result)=>{
            console.log(result)
            toastr.error(result);
        }
    })
}

function activateCategoryRow(buttonTag){
    let deliveryId = buttonTag.getAttribute('data-id');
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    $.ajax({
        url:`/categories/${deliveryId}/activate`,
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

            row.cells[5].firstChild.textContent = 'Delete';
            row.cells[5].firstChild.setAttribute('onclick', 'deleteCategoryRow(this)');
            row.cells[5].firstChild.classList.remove('safe-option');
            row.cells[5].firstChild.classList.add('danger-option');

            activeCategoryTable.insertBefore(row, activeCategoryTable.firstChild);

            removeTableZebra();
            setTableZebra();
        },
        error: (result)=>{
            console.log(result)
            toastr.error(result);
        }
    })
}
