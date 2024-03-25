const url = window.location.pathname;
console.log(url);

loadScript('utilities/utilities.js');

const regExAndPage = [
    [/^\/$/, 'pages/home.js'],

    [/^\/admin\/categories$/, 'pages/admin/categories.js'],
    [/^\/admin\/categories\/create$/, 'pages/admin/categories-create.js'],
    [/^\/admin\/categories\/\d+\/edit/, 'pages/admin/categories-create.js'],

    [/^\/admin\/deliveries$/, 'pages/admin/delivery-options.js'],
    [/^\/admin\/deliveries\/create$/, 'pages/admin/delivery-create.js'],
    [/^\/admin\/deliveries\/\d+\/edit/, 'pages/admin/delivery-create.js'],

    [/^\/admin\/logg\/orders$/, 'pages/admin/orders.js'],
    [/^\/admin\/logg\/users$/, 'pages/admin/logged-in-users.js'],
    [/^\/admin\/logg\/visitors$/, 'pages/admin/visitors.js'],

    [/^\/admin\/messages$/, 'pages/admin/messages.js'],

    [/^\/admin\/publishers$/, 'pages/admin/publishers.js'],
    [/^\/admin\/publishers\/create$/, 'pages/admin/publisher-create.js'],
    [/^\/admin\/publishers\/\d+\/edit$/, 'pages/admin/publisher-create.js'],

    [/^\/admin\/users$/, 'pages/admin/users.js'],

    [/^\/books\/\d+$/, 'pages/book.js'],
    [/^\/books\/\d+\/edit$/, 'pages/books-edit.js'],

    [/^\/cart\/checkout$/, 'pages/checkout.js'],
    [/^\/login$/, 'pages/login.js'],
    [/^\/shop$/, 'pages/shop.js'],

    [/^\/users\/create$/, 'pages/user-create.js'],
    [/^\/users\/\d+$/, 'pages/user-index.js'],
    [/^\/users\/\d+\/edit$/, 'pages/user-edit.js'],

    [/^\/writers\/\d+$/, 'pages/writer.js'],
    [/^\/writers\/\d+\/books$/, 'pages/writer-books.js'],
    [/^\/writer\/\d+\/books\/create$/, 'pages/books-create.js'],
]

window.onload = function(){
    for (let i=0;i<regExAndPage.length;i++){
        let regEx = regExAndPage[i][0];
        let page = regExAndPage[i][1];

        if(regEx.test(url)){
            loadScript(page);

            if(!page.includes('admin')){
                setThemeClass();
                setHeader();
            }
            break;
        }
    }


}

function loadScript(src){
    const script = document.createElement("script");
    script.src = `http://127.0.0.1:8000/assets/js/${src}`;
    document.head.prepend(script);
}
