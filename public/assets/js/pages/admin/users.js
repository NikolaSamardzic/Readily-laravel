console.log("readily.com/admin/users")

setTableZebra();
setEventsForUserTable();

let activeUsersTable = document.getElementById('active-users-body');
let deletedUsersTable = document.getElementById('deleted-users-body');
let bannedUsersTable = document.getElementById('banned-users-body');

async function deleteUserRow(buttonTag){
    let userId = buttonTag.getAttribute('data-id');
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


    $.ajax({
        url:`/users/${userId}`,
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
            row.cells[5].firstChild.setAttribute('onclick', 'activateUserRow(this)');
            row.cells[5].firstChild.classList.remove('danger-option');
            row.cells[5].firstChild.classList.add('safe-option');


            row.cells[6].remove();

            deletedUsersTable.insertBefore(row, deletedUsersTable.firstChild);

            removeTableZebra();
            setTableZebra();
        },
        error: (result)=>{
            console.log(result)
            toastr.error(result);
        }
    })
}


async function activateUserRow(buttonTag){
    let userId = buttonTag.getAttribute('data-id');
    console.log(userId)
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    $.ajax({
        url:`/users/${userId}/activate`,
        method:'PUT',
        processData: false,
        headers: {
            Accept: "application/json; charset=utf-8",
            'X-CSRF-TOKEN': csrfToken
        },
        contentType: false,
        success: (result) =>{
            console.log(result)
            toastr.success(result.message);

            console.log(result.id)
            let row = buttonTag.parentNode.parentNode;

            row.cells[5].firstChild.textContent = 'Ban';
            row.cells[5].firstChild.setAttribute('onclick', 'banUserRow(this)');
            row.cells[5].firstChild.classList.remove('safe-option');
            row.cells[5].firstChild.classList.add('danger-option');

            tdTag = document.createElement('td');

            deleteTag = document.createElement('button');
            deleteTag.setAttribute('data-id',result.id);
            deleteTag.setAttribute('onclick', 'deleteUserRow(this)');
            deleteTag.textContent = 'Delete'
            deleteTag.classList.add('danger-option')
            deleteTag.textContent = 'Delete';
            tdTag.appendChild(deleteTag);
            row.appendChild(tdTag);

            activeUsersTable.insertBefore(row, activeUsersTable.firstChild);

            removeTableZebra();
            setTableZebra();
        },
        error: (result)=>{
            console.log(result)
            toastr.error(result);
        }
    })
}




async function banUserRow(buttonTag){
    let userId = buttonTag.getAttribute('data-id');
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    $.ajax({
        url:`/users/${userId}/ban`,
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

            row.cells[5].firstChild.textContent = 'Unban';
            row.cells[5].firstChild.setAttribute('onclick', 'unbanUserRow(this)');
            row.cells[5].firstChild.classList.remove('danger-option');
            row.cells[5].firstChild.classList.add('safe-option');


            row.cells[6].remove();

            bannedUsersTable.insertBefore(row, bannedUsersTable.firstChild);

            removeTableZebra();
            setTableZebra();
        },
        error: (result)=>{
            console.log(result)
            toastr.error(result);
        }
    })
}

function unbanUserRow(buttonTag){
    let userId = buttonTag.getAttribute('data-id');
    console.log(userId)
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    $.ajax({
        url:`/users/${userId}/unban`,
        method:'PUT',
        processData: false,
        headers: {
            Accept: "application/json; charset=utf-8",
            'X-CSRF-TOKEN': csrfToken
        },
        contentType: false,
        success: (result) =>{
            console.log(result)
            toastr.success(result.message);

            console.log(result.id)
            let row = buttonTag.parentNode.parentNode;

            row.cells[5].firstChild.textContent = 'Ban';
            row.cells[5].firstChild.setAttribute('onclick', 'banUserRow(this)');
            row.cells[5].firstChild.classList.remove('safe-option');
            row.cells[5].firstChild.classList.add('danger-option');

            tdTag = document.createElement('td');

            deleteTag = document.createElement('button');
            deleteTag.setAttribute('data-id',result.id);
            deleteTag.setAttribute('onclick', 'deleteUserRow(this)');
            deleteTag.textContent = 'Delete'
            deleteTag.classList.add('danger-option')
            deleteTag.textContent = 'Delete';
            tdTag.appendChild(deleteTag);
            row.appendChild(tdTag);

            activeUsersTable.insertBefore(row, activeUsersTable.firstChild);

            removeTableZebra();
            setTableZebra();
        },
        error: (result)=>{
            console.log(result)
            toastr.error(result);
        }
    })
}
