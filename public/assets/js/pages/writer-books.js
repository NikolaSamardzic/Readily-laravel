console.log("readily.com/writer/{id}/books")

setTableZebra();

let activeBooksTable = document.getElementById('active-books-table');
let deletedBooksTable = document.getElementById('deleted-books-table');

async  function activateBookRow(button){
    let bookId = button.getAttribute('data-id');
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    let response =await fetch(  `/books/${bookId}/activate`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        }
    })

    let result = await response.json()
    if (response.ok) {
        toastr.success(result.message);

        let row = button.parentNode.parentNode;
        row.cells[3].textContent = result.book.release_date.split('T')[0];

        row.cells[5].firstChild.textContent = 'Delete';
        row.cells[5].firstChild.setAttribute('onclick', 'deleteBookRow(this)');
        row.cells[5].firstChild.classList.remove('safe-option');
        row.cells[5].firstChild.classList.add('danger-option');

        activeBooksTable.insertBefore(row, activeBooksTable.firstChild);
    }else{
        console.log(result)
        toastr.error(result.message);
    }
}
async function deleteBookRow(button){

    let bookId = button.getAttribute('data-id');
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    let response =await fetch('/books/' + bookId, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        }
    })

    let result = await response.json()
    if (response.ok) {
        console.log(result)
        toastr.success(result.message);

        let row = button.parentNode.parentNode;
        row.cells[3].textContent = result.book.deleted_at.split('T')[0];

        row.cells[5].firstChild.textContent = 'Activate';
        row.cells[5].firstChild.setAttribute('onclick', 'activateBookRow(this)');
        row.cells[5].firstChild.classList.remove('danger-option');
        row.cells[5].firstChild.classList.add('safe-option');

        deletedBooksTable.insertBefore(row, deletedBooksTable.firstChild);
    }else{
        console.log(result)
        toastr.error(result.message);
    }
}
