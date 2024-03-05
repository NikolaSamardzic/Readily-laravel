console.log("readily.com/writer/{id}/books")

//setEventsForWriterBooksPage();
setTableZebra();
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
        toastr.success(result.message);
    }else{
        console.log(result)
        toastr.error(result.message);
    }
}

//
// function sendDeleteBookFormWriter(form){
//     let formData = new FormData(form);
//
//     $.ajax({
//         url: 'models/book/delete-book.php',
//         type: 'POST',
//         data: formData,
//         contentType: false,
//         processData: false,
//         success: function(response) {
//             populateWriterBooksTables(response);
//         },
//         error: function(xhr, status, errorThrown) {
//             let messages = JSON.parse(xhr.responseText);
//             let element = document.querySelector('.server-messages');
//             element.style.display = 'block';
//             displayServerMessages('server-messages',messages,'error-message');
//
//             console.log(messages)
//             console.log(xhr);
//             console.log(status, errorThrown);
//         }
//     });
// }
//
// function sendActivateBookFormWriter(form){
//     let formData = new FormData(form);
//
//     $.ajax({
//         url: 'models/book/activate-book.php',
//         type: 'POST',
//         data: formData,
//         contentType: false,
//         processData: false,
//         success: function(response) {
//             populateWriterBooksTables(response);
//         },
//         error: function(xhr, status, errorThrown) {
//             let messages = JSON.parse(xhr.responseText);
//             let element = document.querySelector('.server-messages');
//             element.style.display = 'block';
//             displayServerMessages('server-messages',messages,'error-message');
//
//             console.log(messages)
//             console.log(xhr);
//             console.log(status, errorThrown);
//         }
//     });
// }

function populateWriterBooksTables(books){
    console.log(books);
    let activeBooks = books[0].activeBooks;
    let deletedBooks = books[0].deletedBooks;

    let activeBooksTable = document.querySelector('#table-active-books tbody');
    let deletedBooksTable = document.querySelector('#table-deleted-books tbody');

    while(activeBooksTable.firstChild)activeBooksTable.removeChild(activeBooksTable.firstChild);
    while(deletedBooksTable.firstChild)deletedBooksTable.removeChild(deletedBooksTable.firstChild);

    activeBooks.forEach(book=>{
        let trTag = document.createElement('tr');

        let tdTagImg = document.createElement('td');
        let tdTagTitle = document.createElement('td');
        let tdTagPrice = document.createElement('td');
        let tdTagReleaseDate = document.createElement('td');
        let tdTagChange = document.createElement('td');
        let tdTagDelete = document.createElement('td');

        tdTagImg.classList.add('td-image');

        let imgTag = document.createElement('img');
        imgTag.setAttribute('src',`assets/images/books/small/${book.src}`);
        imgTag.setAttribute('alt',`${book.name}`);

        tdTagImg.appendChild(imgTag);

        tdTagTitle.textContent = book.name;
        tdTagPrice.textContent = '$' + book.price + '.00';
        tdTagReleaseDate.textContent = book.release_date;

        let aTag = document.createElement('a');
        aTag.classList.add('safe-option','change-links');
        aTag.textContent = 'Change';
        aTag.setAttribute('href',`index.php?page=update-book&book-id=${book.id}`);
        tdTagChange.appendChild(aTag);

        let formDelete = document.createElement('form');

        let inputBookIdDelete = document.createElement('input');
        inputBookIdDelete.setAttribute('type','text');
        inputBookIdDelete.setAttribute('name','book-id');
        inputBookIdDelete.style.display = 'none';
        inputBookIdDelete.value = book.id;

        let inputWriterIdDelete = document.createElement('input');
        inputWriterIdDelete.setAttribute('type','text');
        inputWriterIdDelete.setAttribute('name','writer-id');
        inputWriterIdDelete.setAttribute('value',`${book.writer_id}`);
        inputWriterIdDelete.style.display = 'none';
        inputWriterIdDelete.value = book.writer_id;


        let inputButtonDelete = document.createElement('input');
        inputButtonDelete.setAttribute('type','button');
        inputButtonDelete.classList.add('danger-option','delete-book');
        inputButtonDelete.setAttribute('value',`${book.book_id}`);
        inputButtonDelete.value = 'Delete';

        formDelete.appendChild(inputBookIdDelete);
        formDelete.appendChild(inputWriterIdDelete);
        formDelete.appendChild(inputButtonDelete);
        tdTagDelete.appendChild(formDelete);

        trTag.appendChild(tdTagImg);
        trTag.appendChild(tdTagTitle);
        trTag.appendChild(tdTagPrice);
        trTag.appendChild(tdTagReleaseDate);
        trTag.appendChild(tdTagChange);
        trTag.appendChild(tdTagDelete);

        activeBooksTable.appendChild(trTag);
    })


    deletedBooks.forEach(book=>{
        let trTag = document.createElement('tr');

        let tdTagImg = document.createElement('td');
        let tdTagTitle = document.createElement('td');
        let tdTagPrice = document.createElement('td');
        let tdTagReleaseDate = document.createElement('td');
        let tdTagChange = document.createElement('td');
        let tdTagActivate = document.createElement('td');

        tdTagImg.classList.add('td-image');

        let imgTag = document.createElement('img');
        imgTag.setAttribute('src',`assets/images/books/small/${book.src}`);
        imgTag.setAttribute('alt',`${book.name}`);

        tdTagImg.appendChild(imgTag);

        tdTagTitle.textContent = book.name;
        tdTagPrice.textContent = '$' + book.price + '.00';
        tdTagReleaseDate.textContent = book.release_date;

        let aTag = document.createElement('a');
        aTag.classList.add('safe-option','change-links');
        aTag.textContent = 'Change';
        aTag.setAttribute('href',`index.php?page=update-book&book-id=${book.id}`);
        tdTagChange.appendChild(aTag);

        let formActivate = document.createElement('form');

        let inputBookIdActivate = document.createElement('input');
        inputBookIdActivate.setAttribute('type','text');
        inputBookIdActivate.setAttribute('name','book-id');
        //inputBookIdActivate.setAttribute('value',`${book.id}`);
        inputBookIdActivate.style.display = 'none';
        inputBookIdActivate.value = book.id;

        let inputWriterIdActivate = document.createElement('input');
        inputWriterIdActivate.setAttribute('type','text');
        inputWriterIdActivate.setAttribute('name','writer-id');
        //inputWriterIdActivate.setAttribute('value',`${book.writer_id}`);
        inputWriterIdActivate.style.display = 'none';
        inputWriterIdActivate.value = book.writer_id;


        let inputButtonActivate = document.createElement('input');
        inputButtonActivate.setAttribute('type','button');
        inputButtonActivate.classList.add('safe-option','activate-book');
        inputButtonActivate.value = 'Activate';

        formActivate.appendChild(inputBookIdActivate);
        formActivate.appendChild(inputWriterIdActivate);
        formActivate.appendChild(inputButtonActivate);
        tdTagActivate.appendChild(formActivate);

        trTag.appendChild(tdTagImg);
        trTag.appendChild(tdTagTitle);
        trTag.appendChild(tdTagPrice);
        trTag.appendChild(tdTagReleaseDate);
        trTag.appendChild(tdTagChange);
        trTag.appendChild(tdTagActivate);

        deletedBooksTable.appendChild(trTag);
    })

    setTableZebra();
    setEventsForWriterBooksPage();
}
