@extends('layouts.userLayout')

@section('head')

    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Home"
    />

@endsection

@section('header')
    <x-fixed.header>
        <x-fixed.navigation>
            @foreach($data['links'] as $link)
                <x-fixed.navigation-link
                    :href="$link['href']"
                    :name="$link['name']" />
            @endforeach
        </x-fixed.navigation>
    </x-fixed.header>
@endsection

@section('mainContent')
<div class="phone-nav" id="phone-nav-id">
    <ul id="phone-nav-ul">
        <li><a href="#"
               id="active-link">Home</a></li>
        <li><a href="#"
            >Shop</a></li>
        <li><a href="#"
            >Sign up</a></li>
        <li><a href="#"
            >Log in</a></li>
    </ul>
    <i id="menu-icon-close" class="fa-solid fa-xmark"></i>
</div>

<section id="about-readily">
    <h1>What is Readily?</h1>
    <div id="about-container">
        <p>At Readily, we're passionate about providing you with the books you love. With our online bookstore, you can easily browse and purchase your favorite books, all from the comfort of your own home.</p>

    </div>
    <div id="img-placeholder">
        <img src="{{asset('assets/images/readily.png')}}" class="set-brightness" alt="readily website picture">
    </div>
</section>

<div id="angle-down">
    <div id="position"></div>
    <a href="#position">
        <i id="scroll-down" class="fa-solid fa-angle-down"></i>
    </a>

</div>
<section id="introduction" class="wrapper">
    <div id="introduction-heading-container">
        <h2>Whatever you're into, we've got <br> something for you</h2>
    </div>

    <article id="article1">
        <img src="{{asset('assets/images/introduction/discover.svg')}}" alt="discover something new image" class="svg" />
        <h3>Discover something new every day</h3>
        <p>At Readily, we're all about discovering something new. With our vast selection of titles and new releases added regularly, there's always something fresh and exciting to explore. Join us today and start your journey of discovery.</p>
    </article>

    <article id="article2">
        <img src="{{asset('assets/images/introduction/originals.svg')}}" alt="minimalistic image for original books"class="svg" />
        <h3>Originals you won't find elsewhere</h3>
        <p>At Readily, we pride ourselves on offering a selection of books that you won't find anywhere else. From rare editions to limited releases, we're passionate about bringing you unique and original titles that will inspire and delight you. Join us today and discover the joy of owning a one-of-a-kind book.</p>
    </article>

    <article id="article3">
        <img src="{{asset('assets/images/introduction/help.svg')}}" alt="helping with chooseing book image"class="svg" />
        <h3>Help finding your next great read</h3>
        <p>At Readily, we're here to help you find your next favorite book. Whether you're looking for a specific genre, author, or just need some inspiration, our knowledgeable staff are on hand to offer recommendations and advice. With our user-friendly website and personalized service, discovering your next great read has never been easier. Join us today and let us help you find your next literary obsession.</p>
    </article>
</section>

<section id="discover">
    <img class="svg" id="discover-img-1" src="{{asset('assets/images/introduction/door.svg')}}" alt="descriptive image" />
    <img class="svg" id="discover-img-2" src="{{asset('assets/images/introduction/bed.svg')}}" alt="descriptive image" />

    <div id="discover-container">
        <h2>Read anywhere. Anytime.</h2>
        <p>Discover the best reads on various topics of interest.</p>
        <a href="#">Explore titles</a>
    </div>
</section>

<section id="suggested-books" class="wrapper section-articles">
</section>

<section id="bestselling-books" class="wrapper section-articles">
    <h2 class="section-heading">Bestselling Books</h2>

    <div class="article-container article-book-container" id="bestselling-books-articles-container">

        <article class='article-book'>
            <div class='bg-article-color-6 article-div-img-container'>
                <img  class='set-brightness' src='{{asset('assets/images/books/small/51.jpg')}}' alt='Unshakeable: Your Financial Freedom Playbook'>
            </div>
            <div class='article-books-text-container'>
                <div class='title-and-author'>
                    <h3>Unshakeable: Your Financial Freedom Playbook</h3>
                    <a class='author-link' href='#'>Tony Robbins</a>
                </div>
                <div class='stars-and-cart-container'>
                    <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-46'></i>
                    <div class='stars-container'>
                        <i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-regular fa-star'></i>
                    </div>
                    <p class='rating-text'>4/5</p>
                </div>
            </div>
            <a class='link-to-single-a-book' href='#'>
            </a>
        </article>

        <article class='article-book'>
            <div class='bg-article-color-9 article-div-img-container'>
                <img  class='set-brightness' src='{{asset('assets/images/books/small/136.jpg')}}' alt='Harry Potter and the Prisoner of Azkaban'>
            </div>
            <div class='article-books-text-container'>
                <div class='title-and-author'>
                    <h3>Harry Potter and the Prisoner of Azkaban</h3>
                    <a class='author-link' href='#'>Joanne Rowling</a>
                </div>
                <div class='stars-and-cart-container'>
                    <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-129'></i>
                    <div class='stars-container'>
                        <i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-regular fa-star'></i>
                    </div>
                    <p class='rating-text'>4/5</p>
                </div>
            </div>
            <a class='link-to-single-a-book' href='index.php?page=book&id=129'>
            </a>
        </article>

        <article class='article-book'>
            <div class='bg-article-color-7 article-div-img-container'>
                <img  class='set-brightness' src='assets/images/books/small/144.jpg' alt='The Institute'>
            </div>
            <div class='article-books-text-container'>
                <div class='title-and-author'>
                    <h3>The Institute</h3>
                    <a class='author-link' href='index.php?page=writer&id=43'>Stephen King</a>
                </div>
                <div class='stars-and-cart-container'>
                    <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-137'></i>
                    <div class='stars-container'>
                        <i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-regular fa-star'></i>
                    </div>
                    <p class='rating-text'>4/5</p>
                </div>
            </div>
            <a class='link-to-single-a-book' href='index.php?page=book&id=137'>
            </a>
        </article>

        <article class='article-book'>
            <div class='bg-article-color-8 article-div-img-container'>
                <img  class='set-brightness' src='assets/images/books/small/95.jpg' alt='Charlie and the Great Glass Elevator'>
            </div>
            <div class='article-books-text-container'>
                <div class='title-and-author'>
                    <h3>Charlie and the Great Glass Elevator</h3>
                    <a class='author-link' href='index.php?page=writer&id=45'>Roald Dahl</a>
                </div>
                <div class='stars-and-cart-container'>
                    <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-88'></i>
                    <div class='stars-container'>
                        <i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-regular fa-star'></i>
                    </div>
                    <p class='rating-text'>4/5</p>
                </div>
            </div>
            <a class='link-to-single-a-book' href='index.php?page=book&id=88'>
            </a>
        </article>

        <article class='article-book'>
            <div class='bg-article-color-2 article-div-img-container'>
                <img  class='set-brightness' src='assets/images/books/small/139.jpg' alt='Harry Potter and the Order of the Phoenix'>
            </div>
            <div class='article-books-text-container'>
                <div class='title-and-author'>
                    <h3>Harry Potter and the Order of the Phoenix</h3>
                    <a class='author-link' href='index.php?page=writer&id=42'>Joanne Rowling</a>
                </div>
                <div class='stars-and-cart-container'>
                    <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-132'></i>
                    <div class='stars-container'>
                        <i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i>
                    </div>
                    <p class='rating-text'>0 ratings</p>
                </div>
            </div>
            <a class='link-to-single-a-book' href='index.php?page=book&id=132'>
            </a>
        </article>

        <article class='article-book'>
            <div class='bg-article-color-6 article-div-img-container'>
                <img  class='set-brightness' src='assets/images/books/small/83.jpg' alt='One Fish Two Fish Red Fish Blue Fish'>
            </div>
            <div class='article-books-text-container'>
                <div class='title-and-author'>
                    <h3>One Fish Two Fish Red Fish Blue Fish</h3>
                    <a class='author-link' href='index.php?page=writer&id=44'>Theodor Seuss</a>
                </div>
                <div class='stars-and-cart-container'>
                    <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-76'></i>
                    <div class='stars-container'>
                        <i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i>
                    </div>
                    <p class='rating-text'>2/5</p>
                </div>
            </div>
            <a class='link-to-single-a-book' href='index.php?page=book&id=76'>
            </a>
        </article>

        <article class='article-book'>
            <div class='bg-article-color-8 article-div-img-container'>
                <img  class='set-brightness' src='assets/images/books/small/85.jpg' alt='How the Grinch Stole Christmas'>
            </div>
            <div class='article-books-text-container'>
                <div class='title-and-author'>
                    <h3>How the Grinch Stole Christmas</h3>
                    <a class='author-link' href='index.php?page=writer&id=44'>Theodor Seuss</a>
                </div>
                <div class='stars-and-cart-container'>
                    <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-78'></i>
                    <div class='stars-container'>
                        <i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i>
                    </div>
                    <p class='rating-text'>0 ratings</p>
                </div>
            </div>
            <a class='link-to-single-a-book' href='index.php?page=book&id=78'>
            </a>
        </article>

        <article class='article-book'>
            <div class='bg-article-color-7 article-div-img-container'>
                <img  class='set-brightness' src='assets/images/books/small/94.jpg' alt='The BFG'>
            </div>
            <div class='article-books-text-container'>
                <div class='title-and-author'>
                    <h3>The BFG</h3>
                    <a class='author-link' href='index.php?page=writer&id=45'>Roald Dahl</a>
                </div>
                <div class='stars-and-cart-container'>
                    <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-87'></i>
                    <div class='stars-container'>
                        <i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i>
                    </div>
                    <p class='rating-text'>0 ratings</p>
                </div>
            </div>
            <a class='link-to-single-a-book' href='index.php?page=book&id=87'>
            </a>
        </article>

        <article class='article-book'>
            <div class='bg-article-color-7 article-div-img-container'>
                <img  class='set-brightness' src='assets/images/books/small/20.jpg' alt='The Memoirs of Sherlock Holmes'>
            </div>
            <div class='article-books-text-container'>
                <div class='title-and-author'>
                    <h3>The Memoirs of Sherlock Holmes</h3>
                    <a class='author-link' href='index.php?page=writer&id=33'>Sir Arthur Conan Doyle</a>
                </div>
                <div class='stars-and-cart-container'>
                    <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-17'></i>
                    <div class='stars-container'>
                        <i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i>
                    </div>
                    <p class='rating-text'>0 ratings</p>
                </div>
            </div>
            <a class='link-to-single-a-book' href='index.php?page=book&id=17'>
            </a>
        </article>

        <article class='article-book'>
            <div class='bg-article-color-6 article-div-img-container'>
                <img  class='set-brightness' src='assets/images/books/small/93.jpg' alt='James and the Giant Peach'>
            </div>
            <div class='article-books-text-container'>
                <div class='title-and-author'>
                    <h3>James and the Giant Peach</h3>
                    <a class='author-link' href='index.php?page=writer&id=45'>Roald Dahl</a>
                </div>
                <div class='stars-and-cart-container'>
                    <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-86'></i>
                    <div class='stars-container'>
                        <i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i>
                    </div>
                    <p class='rating-text'>3/5</p>
                </div>
            </div>
            <a class='link-to-single-a-book' href='index.php?page=book&id=86'>
            </a>
        </article>

        <article class='article-book'>
            <div class='bg-article-color-9 article-div-img-container'>
                <img  class='set-brightness' src='assets/images/books/small/106.jpg' alt='The Choice: The Dragon Heart Legacy'>
            </div>
            <div class='article-books-text-container'>
                <div class='title-and-author'>
                    <h3>The Choice: The Dragon Heart Legacy</h3>
                    <a class='author-link' href='index.php?page=writer&id=47'>Nora Roberts</a>
                </div>
                <div class='stars-and-cart-container'>
                    <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-99'></i>
                    <div class='stars-container'>
                        <i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i>
                    </div>
                    <p class='rating-text'>0 ratings</p>
                </div>
            </div>
            <a class='link-to-single-a-book' href='index.php?page=book&id=99'>
            </a>
        </article>

        <article class='article-book'>
            <div class='bg-article-color-3 article-div-img-container'>
                <img  class='set-brightness' src='assets/images/books/small/28.jpg' alt='The Road to Little Dribbling: Adventures of an Ame'>
            </div>
            <div class='article-books-text-container'>
                <div class='title-and-author'>
                    <h3>The Road to Little Dribbling: Adventures of an Ame</h3>
                    <a class='author-link' href='index.php?page=writer&id=34'>Bill Bryson</a>
                </div>
                <div class='stars-and-cart-container'>
                    <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-23'></i>
                    <div class='stars-container'>
                        <i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i>
                    </div>
                    <p class='rating-text'>0 ratings</p>
                </div>
            </div>
            <a class='link-to-single-a-book' href='index.php?page=book&id=23'>
            </a>
        </article>

        <article class='article-book'>
            <div class='bg-article-color-4 article-div-img-container'>
                <img  class='set-brightness' src='assets/images/books/small/39.jpg' alt='How to Win Friends and Influence People'>
            </div>
            <div class='article-books-text-container'>
                <div class='title-and-author'>
                    <h3>How to Win Friends and Influence People</h3>
                    <a class='author-link' href='index.php?page=writer&id=36'>Dale Carnegie</a>
                </div>
                <div class='stars-and-cart-container'>
                    <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-34'></i>
                    <div class='stars-container'>
                        <i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i>
                    </div>
                    <p class='rating-text'>0 ratings</p>
                </div>
            </div>
            <a class='link-to-single-a-book' href='index.php?page=book&id=34'>
            </a>
        </article>

        <article class='article-book'>
            <div class='bg-article-color-5 article-div-img-container'>
                <img  class='set-brightness' src='assets/images/books/small/112.jpg' alt='The Path Between the Seas'>
            </div>
            <div class='article-books-text-container'>
                <div class='title-and-author'>
                    <h3>The Path Between the Seas</h3>
                    <a class='author-link' href='index.php?page=writer&id=49'>David Cullough</a>
                </div>
                <div class='stars-and-cart-container'>
                    <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-105'></i>
                    <div class='stars-container'>
                        <i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i>
                    </div>
                    <p class='rating-text'>0 ratings</p>
                </div>
            </div>
            <a class='link-to-single-a-book' href='index.php?page=book&id=105'>
            </a>
        </article>

        <article class='article-book'>
            <div class='bg-article-color-1 article-div-img-container'>
                <img  class='set-brightness' src='assets/images/books/small/56.jpg' alt='The French Chef Cookbook'>
            </div>
            <div class='article-books-text-container'>
                <div class='title-and-author'>
                    <h3>The French Chef Cookbook</h3>
                    <a class='author-link' href='index.php?page=writer&id=38'>Julia Child</a>
                </div>
                <div class='stars-and-cart-container'>
                    <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-51'></i>
                    <div class='stars-container'>
                        <i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i>
                    </div>
                    <p class='rating-text'>0 ratings</p>
                </div>
            </div>
            <a class='link-to-single-a-book' href='index.php?page=book&id=51'>
            </a>
        </article>

        <article class='article-book'>
            <div class='bg-article-color-7 article-div-img-container'>
                <img  class='set-brightness' src='assets/images/books/small/73.jpg' alt='Facebook: The Inside Story'>
            </div>
            <div class='article-books-text-container'>
                <div class='title-and-author'>
                    <h3>Facebook: The Inside Story</h3>
                    <a class='author-link' href='index.php?page=writer&id=40'>Steven Levy</a>
                </div>
                <div class='stars-and-cart-container'>
                    <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-67'></i>
                    <div class='stars-container'>
                        <i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i>
                    </div>
                    <p class='rating-text'>0 ratings</p>
                </div>
            </div>
            <a class='link-to-single-a-book' href='index.php?page=book&id=67'>
            </a>
        </article>

        <article class='article-book'>
            <div class='bg-article-color-3 article-div-img-container'>
                <img  class='set-brightness' src='assets/images/books/small/90.jpg' alt='Hop on Pop'>
            </div>
            <div class='article-books-text-container'>
                <div class='title-and-author'>
                    <h3>Hop on Pop</h3>
                    <a class='author-link' href='index.php?page=writer&id=44'>Theodor Seuss</a>
                </div>
                <div class='stars-and-cart-container'>
                    <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-83'></i>
                    <div class='stars-container'>
                        <i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i>
                    </div>
                    <p class='rating-text'>0 ratings</p>
                </div>
            </div>
            <a class='link-to-single-a-book' href='index.php?page=book&id=83'>
            </a>
        </article>

        <article class='article-book'>
            <div class='bg-article-color-1 article-div-img-container'>
                <img  class='set-brightness' src='assets/images/books/small/148.jpg' alt='Mr. Mercedes'>
            </div>
            <div class='article-books-text-container'>
                <div class='title-and-author'>
                    <h3>Mr. Mercedes</h3>
                    <a class='author-link' href='index.php?page=writer&id=43'>Stephen King</a>
                </div>
                <div class='stars-and-cart-container'>
                    <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-141'></i>
                    <div class='stars-container'>
                        <i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i>
                    </div>
                    <p class='rating-text'>0 ratings</p>
                </div>
            </div>
            <a class='link-to-single-a-book' href='index.php?page=book&id=141'>
            </a>
        </article>

        <article class='article-book'>
            <div class='bg-article-color-2 article-div-img-container'>
                <img  class='set-brightness' src='assets/images/books/small/99.jpg' alt='The Return'>
            </div>
            <div class='article-books-text-container'>
                <div class='title-and-author'>
                    <h3>The Return</h3>
                    <a class='author-link' href='index.php?page=writer&id=46'>Nicholas Sparks</a>
                </div>
                <div class='stars-and-cart-container'>
                    <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-92'></i>
                    <div class='stars-container'>
                        <i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i>
                    </div>
                    <p class='rating-text'>0 ratings</p>
                </div>
            </div>
            <a class='link-to-single-a-book' href='index.php?page=book&id=92'>
            </a>
        </article>

        <article class='article-book'>
            <div class='bg-article-color-0 article-div-img-container'>
                <img  class='set-brightness' src='assets/images/books/small/13.jpg' alt='The Murder at the Vicarage'>
            </div>
            <div class='article-books-text-container'>
                <div class='title-and-author'>
                    <h3>The Murder at the Vicarage</h3>
                    <a class='author-link' href='index.php?page=writer&id=32'>Agatha Christie</a>
                </div>
                <div class='stars-and-cart-container'>
                    <i class='fa-solid fa-cart-shopping shopping-cart' id='book-id-10'></i>
                    <div class='stars-container'>
                        <i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i><i class='fa-regular fa-star'></i>
                    </div>
                    <p class='rating-text'>0 ratings</p>
                </div>
            </div>
            <a class='link-to-single-a-book' href='index.php?page=book&id=10'>
            </a>
        </article>

    </div>
</section>

<section id="popular-categories" class="wrapper section-articles">
    <h2 class="section-heading">Popular Categories</h2>

    <div class="article-container article-category-container" id="popular-categories-articles-container">

        <article class="article-category">
            <a href="index.php?page=shop&category-id=4"></a>
            <p>Mystery</p>
            <img src="assets/images/books/small/7.jpg" alt="Murder on the Orient Express" class="set-brightness"></article>

        <article class="article-category">
            <a href="index.php?page=shop&category-id=5"></a>
            <p>Travel</p>
            <img src="assets/images/books/small/24.jpg" alt="Notes from a Small Island" class="set-brightness"></article>

        <article class="article-category">
            <a href="index.php?page=shop&category-id=6"></a>
            <p>Self Improvement</p>
            <img src="assets/images/books/small/39.jpg" alt="How to Win Friends and Influence People" class="set-brightness"></article>

        <article class="article-category">
            <a href="index.php?page=shop&category-id=7"></a>
            <p>Cooking</p>
            <img src="assets/images/books/small/54.jpg" alt="Mastering the Art of French Cooking" class="set-brightness"></article>

        <article class="article-category">
            <a href="index.php?page=shop&category-id=8"></a>
            <p>Technology And Science</p>
            <img src="assets/images/books/small/69.jpg" alt="Hackers" class="set-brightness"></article>

        <article class="article-category">
            <a href="index.php?page=shop&category-id=9"></a>
            <p>Children's Books</p>
            <img src="assets/images/books/small/81.jpg" alt="Green Eggs and Ham" class="set-brightness"></article>

        <article class="article-category">
            <a href="index.php?page=shop&category-id=10"></a>
            <p>Romance</p>
            <img src="assets/images/books/small/96.jpg" alt="Dreamland" class="set-brightness"></article>

        <article class="article-category">
            <a href="index.php?page=shop&category-id=11"></a>
            <p>History</p>
            <img src="assets/images/books/small/25.jpg" alt="A Short History of Nearly Everything" class="set-brightness"></article>

        <article class="article-category">
            <a href="index.php?page=shop&category-id=12"></a>
            <p>Business And Economics</p>
            <img src="assets/images/books/small/40.jpg" alt="How to Stop Worrying & Start Living" class="set-brightness"></article>

        <article class="article-category">
            <a href="index.php?page=shop&category-id=13"></a>
            <p>Fiction</p>
            <img src="assets/images/books/small/136.jpg" alt="Harry Potter and the Prisoner of Azkaban" class="set-brightness"></article>
    </div>
</section>


@endsection


@section('footer')
<footer>
    <div id="footer" class="wrapper">

        <ul id="docements-links">
            <li><a href="index.php?page=author"
                   target="_self">Author</a></li>
            <li><a href="views/pages/documentation.pdf"
                   target="_blank">Documentation</a></li>
            <li><a href="https://github.com/NikolaSamardzic/Readilyphp"
                   target="_blank">GitHub</a></li>
            <li><a href="views/pages/rss.xml"
                   target="_blank">RSS</a></li>
            <li><a href="views/pages/sitemap.xml"
                   target="_blank">Sitemap</a></li>
        </ul>

        <ul id="social-media-links">
            <li><a href="https://www.facebook.com/"
                   target="_blank">Facebook</a></li>
            <li><a href="https://www.instagram.com/"
                   target="_blank">Instagram</a></li>
            <li><a href="https://twitter.com/"
                   target="_blank">Twitter</a></li>
        </ul>

        <ul id="pages-links">
            <li><a href="index.php?page=home">Home</a></li>
            <li><a href="index.php?page=shop">Shop</a></li>
            <li><a href="index.php?page=signup">Sign up</a></li>
            <li><a href="index.php?page=login">Log in</a></li>
        </ul>
    </div>
</footer>

@endsection

@section('scripts')

<script  src="{{asset('assets/js/main.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
@endsection

