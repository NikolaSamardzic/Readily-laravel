const url = window.location.pathname;
console.log(url);

loadScript('utilities/utilities.js');

const regExAndPage = [
    [/^\/login$/, 'pages/login.js'],
    [/^\/users\/\d+\/edit$/, 'pages/user-edit.js'],
    [/^\/users\/create$/, 'pages/user-create.js'],
    [/^\/users\/\d+$/, 'pages/user-index.js'],
    [/^\/admin\/users$/, 'pages/admin/users.js'],
    [/^\/admin\/publishers$/, 'pages/admin/publishers.js'],
    [/^\/admin\/surveys$/, 'pages/admin/surveys.js'],
    [/^\/admin\/categories$/, 'pages/admin/categories.js'],
    [/^\/admin\/messages$/, 'pages/admin/messages.js'],
    [/^\/admin\/orders$/, 'pages/admin/orders.js'],
    [/^\/admin\/delivery-options$/, 'pages/admin/delivery-options.js'],
    [/^\/writers\/\d+\/books$/, 'pages/writer-books.js'],
    [/^\/writer\/\d+\/books\/create$/, 'pages/books-create.js'],
    [/^\/writers\/\d+\/books\/\d+\/edit$/, 'pages/books-edit.js'],
    [/^\/books\/\d+$/, 'pages/book.js'],
    [/^\/$/, 'pages/home.js'],
    [/^\/writers\/\d+$/, 'pages/writer.js'],
    [/^\/shop$/, 'pages/shop.js'],
    [/^\/checkout$/, 'pages/checkout.js'],
    [/^\/admin\/logged-in-users$/, 'pages/admin/logged-in-users.js'],
    [/^\/admin\/visitors$/, 'pages/admin/visitors.js']
]

window.onload = function(){
    for (let i=0;i<regExAndPage.length;i++){
        let regEx = regExAndPage[i][0];
        let page = regExAndPage[i][1];

        if(regEx.test(url)){
            loadScript(page);
            break;
        }
    }

    setThemeClass();
    setHeader();
}

function loadScript(src){
    const script = document.createElement("script");
    script.src = `http://127.0.0.1:8000/assets/js/${src}`;
    document.head.prepend(script);
}
