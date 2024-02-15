console.log("readily.com/admin/categories")

setEventsForCategoriesPage();
setTableZebra();
setEventsForCategoriesTable();

function setEventsForCategoriesPage(){
    $(document).on('blur','#category-name',()=>{
        checkInputElementWithRegex(/^[A-ZŠĐĆČŽ][a-zšđčćž']{2,}( [A-ZŠĐĆČŽ][a-zšđčćž']{2,})*$/,'category-name','category-name-error');
    });


    $(document).on('click','#cancel-button',()=>{
        document.getElementById('category-name-error').style.display = 'none';
        document.getElementById('category-name').value = '';
        document.getElementById('categories-form').style.display = 'none';
        let inputElement = document.getElementById('category-id');
        inputElement.setAttribute('value','0');
    });

    $(document).on('click','#add-subcategory-button',()=>{
        document.getElementById('categories-form').style.display = 'block';
        let inputElement = document.getElementById('category-id');
        inputElement.setAttribute('value','0');
        document.getElementById('select-category-label').style.display = 'block';
        document.getElementById('select-category').style.display = 'block';
        document.getElementById('category-name-error').style.display = 'none';
        let categoryType = document.getElementById('category-type');
        categoryType.setAttribute('value','subcategory');
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });


    $(document).on('click','#add-category-button',()=>{
        document.getElementById('categories-form').style.display = 'block';
        let inputElement = document.getElementById('category-id');
        inputElement.setAttribute('value','0');
        document.getElementById('select-category-label').style.display = 'none';
        document.getElementById('select-category').style.display = 'none';
        document.getElementById('category-name-error').style.display = 'none';

        let categoryType = document.getElementById('category-type');
        categoryType.setAttribute('value','category');
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    $(document).on('click','#save-button',()=>{
        let form = document.getElementById('categories-form');
        let errorCount = 0;
        errorCount += checkInputElementWithRegex(/^[A-ZŠĐĆČŽ][a-zšđčćž']{2,}( [A-ZŠĐĆČŽ][a-zšđčćž']{2,})*$/,'category-name','category-name-error');

        if(errorCount){
            return;
        }

        sendCategoryForm(form);
    });

}

function setEventsForCategoriesTable(){
    let deleteCategories = document.querySelectorAll('.delete-category');
    deleteCategories.forEach(deleteCategory => {
        deleteCategory.addEventListener('click', () => {
            let form = deleteCategory.closest('form');
            sendDeleteCategoryForm(form);
        });
    });

    let activateCategories = document.querySelectorAll('.activate-category');
    activateCategories.forEach(activateCategory => {
        activateCategory.addEventListener('click', () => {
            let form = activateCategory.closest('form');
            sendActivateCategoryForm(form);
        });
    });

    let changeLinks = document.querySelectorAll('.change-links');
    changeLinks.forEach(link=>{
        link.addEventListener('click',()=>{
            let categoryId = link.getAttribute('data-category-id');
            let categoryName = link.getAttribute('data-category-name');
            let categoryType = link.getAttribute('data-category-type');
            let categoryParentId = link.getAttribute('data-category-parent-id');

            let inputId = document.getElementById('category-id');
            let inputName = document.getElementById('category-name');
            let inputType = document.getElementById('category-type');

            inputId.setAttribute('value',categoryId);
            inputType.setAttribute('value',categoryType);
            inputName.value = categoryName;
            document.getElementById('categories-form').style.display = 'block';

            if(categoryType === 'subcategory'){
                document.getElementById('select-category').style.display = 'block';
                document.getElementById('select-category').value = Number(categoryParentId) ;
                document.getElementById('select-category-label').style.display = 'block';
            }else{
                document.getElementById('select-category').style.display = 'none';
                document.getElementById('select-category-label').style.display = 'none';
            }
        })
    })
}

function sendCategoryForm(form){
    let formData = new FormData(form);

    $.ajax({
        url: 'models/category/add-update-categories.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            let serverMessagesContainer = document.querySelector('.server-messages');
            serverMessagesContainer.style.display = 'none';
            document.getElementById('category-name').value = '';
            document.getElementById('categories-form').style.display = 'none';
            let inputElement = document.getElementById('category-id');
            inputElement.setAttribute('value','0');

            populateCategoryTables(response);
        },
        error: function(xhr, status, errorThrown) {
            let messages = JSON.parse(xhr.responseText);
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            let serverMessagesContainer = document.querySelector('.server-messages');
            serverMessagesContainer.style.display = 'block';
            displayServerMessages('server-messages',messages,'error-message');

            console.log(messages)
            console.log(xhr);
            console.log(status, errorThrown);
        }
    });
}

function populateCategoryTables(categories){
    let activeCategories = categories[0].activeCategories;
    let deletedCategories = categories[0].deletedCategories;

    let activeCategoriesTable = document.querySelector('#table-active-categories tbody');
    let deletedCategoriesTable = document.querySelector('#table-deleted-categories tbody');

    let activeCategoriesSelect = document.querySelector('#select-category');

    while(activeCategoriesSelect.firstChild)activeCategoriesSelect.removeChild(activeCategoriesSelect.firstChild);
    while(activeCategoriesTable.firstChild)activeCategoriesTable.removeChild(activeCategoriesTable.firstChild);
    while(deletedCategoriesTable.firstChild)deletedCategoriesTable.removeChild(deletedCategoriesTable.firstChild);


    activeCategories.forEach(category=>{
        let trTag = document.createElement('tr');

        let tdTagName = document.createElement('td');
        let tdTagParentCategory = document.createElement('td');
        let tdTagBookCount = document.createElement('td');
        let tdTagCreatedAt = document.createElement('td');
        let tdTagChange = document.createElement('td');
        let tdTagDelete = document.createElement('td');

        tdTagName.textContent = category.name;
        tdTagBookCount.textContent = category.book_count;
        tdTagCreatedAt.textContent = category.created_at;

        tdTagParentCategory.textContent = category.parent ? category.parent : '/';

        let aTag = document.createElement('a');
        aTag.classList.add('safe-option','change-links');
        aTag.setAttribute('data-category-id',category.id);
        aTag.setAttribute('data-category-name',category.name);
        aTag.setAttribute('data-category-type',category.category_id ? 'subcategory' : 'category');
        aTag.setAttribute('data-category-parent-id',category.category_id ? category.category_id : '');
        aTag.textContent = 'Change';
        aTag.setAttribute('href',`#`);
        tdTagChange.appendChild(aTag);

        let formDelete = document.createElement('form');

        let inputCategoryIdDelete = document.createElement('input');
        inputCategoryIdDelete.setAttribute('type','text');
        inputCategoryIdDelete.setAttribute('name','category-id');
        inputCategoryIdDelete.style.display = 'none';
        inputCategoryIdDelete.value = category.id;

        let inputButtonDelete = document.createElement('input');
        inputButtonDelete.setAttribute('type','button');
        inputButtonDelete.classList.add('danger-option','delete-category');
        inputButtonDelete.value = 'Delete';

        formDelete.appendChild(inputCategoryIdDelete);
        formDelete.appendChild(inputButtonDelete);
        tdTagDelete.appendChild(formDelete);

        trTag.appendChild(tdTagName);
        trTag.appendChild(tdTagParentCategory);
        trTag.appendChild(tdTagBookCount);
        trTag.appendChild(tdTagCreatedAt);
        trTag.appendChild(tdTagChange);
        trTag.appendChild(tdTagDelete);

        activeCategoriesTable.appendChild(trTag);
    })


    deletedCategories.forEach(category=>{
        let trTag = document.createElement('tr');

        let tdTagName = document.createElement('td');
        let tdTagParentCategory = document.createElement('td');
        let tdTagBookCount = document.createElement('td');
        let tdTagDeletedAt = document.createElement('td');
        let tdTagChange = document.createElement('td');
        let tdTagActivate = document.createElement('td');

        tdTagName.textContent = category.name;
        tdTagBookCount.textContent = category.book_count;
        tdTagDeletedAt.textContent = category.deleted_at;

        tdTagParentCategory.textContent = category.parent ? category.parent : '/';

        let aTag = document.createElement('a');
        aTag.setAttribute('data-category-id',category.id);
        aTag.setAttribute('data-category-name',category.name);
        aTag.setAttribute('data-category-type',category.category_id ? 'subcategory' : 'category');
        aTag.setAttribute('data-category-parent-id',category.category_id ? category.category_id : '');
        aTag.classList.add('safe-option','change-links');
        aTag.textContent = 'Change';
        aTag.setAttribute('href',`#`);
        tdTagChange.appendChild(aTag);

        let formActivate = document.createElement('form');

        let inputCategoryIdActivate = document.createElement('input');
        inputCategoryIdActivate.setAttribute('type','text');
        inputCategoryIdActivate.setAttribute('name','category-id');
        inputCategoryIdActivate.style.display = 'none';
        inputCategoryIdActivate.value = category.id;

        let inputButtonActivate = document.createElement('input');
        inputButtonActivate.setAttribute('type','button');
        inputButtonActivate.classList.add('safe-option','activate-category');
        inputButtonActivate.value = 'Activate';

        formActivate.appendChild(inputCategoryIdActivate);
        formActivate.appendChild(inputButtonActivate);
        tdTagActivate.appendChild(formActivate);

        trTag.appendChild(tdTagName);
        trTag.appendChild(tdTagParentCategory);
        trTag.appendChild(tdTagBookCount);
        trTag.appendChild(tdTagDeletedAt);
        trTag.appendChild(tdTagChange);
        trTag.appendChild(tdTagActivate);

        deletedCategoriesTable.appendChild(trTag);
    })

    activeCategories.forEach(category=>{
        if(!category.category_id){
            let option = document.createElement('option');
            option.setAttribute('value',category.id);
            option.textContent = category.name;
            activeCategoriesSelect.appendChild(option);
        }
    })

    setEventsForCategoriesTable();
    setTableZebra();
}

function sendDeleteCategoryForm(form){
    let formData = new FormData(form);

    $.ajax({
        url: 'models/category/delete-category.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            let element = document.querySelector('.server-messages');
            element.style.display = 'none';
            populateCategoryTables(response);
        },
        error: function(xhr, status, errorThrown) {
            let messages = JSON.parse(xhr.responseText);
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            let element = document.querySelector('.server-messages');
            element.style.display = 'block';
            displayServerMessages('server-messages',messages,'error-message');

            console.log(messages)
            console.log(xhr);
            console.log(status, errorThrown);
        }
    });
}

function sendActivateCategoryForm(form){
    let formData = new FormData(form);

    $.ajax({
        url: 'models/category/activate-category.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            let element = document.querySelector('.server-messages');
            element.style.display = 'none';
            populateCategoryTables(response);
        },
        error: function(xhr, status, errorThrown) {
            let messages = JSON.parse(xhr.responseText);
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            let element = document.querySelector('.server-messages');
            element.style.display = 'block';
            displayServerMessages('server-messages',messages,'error-message');

            console.log(messages)
            console.log(xhr);
            console.log(status, errorThrown);
        }
    });
}
