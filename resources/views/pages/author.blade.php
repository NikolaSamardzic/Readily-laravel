@extends('layouts.userLayout')

@section('head')
    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Home"
    />
@endsection
@section('mainContent')
<section id="author-section">

    <h1>Author</h1>

    <div id="img-container" class="set-brightness">
        <img src="{{asset('assets/images')}}/author.jpg" alt="author"/>
    </div>


    <h2>First name</h2>
    <p>Nikola</p>

    <h2>Last Name</h2>
    <p>Samardžić</p>

    <h2>Index</h2>
    <p>54/21</p>

</section>


@endsection
