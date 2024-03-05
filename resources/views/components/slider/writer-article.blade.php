<article class="article-writer"><a href="{{route('user.writer',['user' => $writer['id']])}}">
    </a><img class="set-brightness article-writer-img" src="{{asset('assets/images/avatars')}}/{{$writer['avatar']['src']}}" alt="{{$writer['first_name']}} {{$writer['last_name']}}">
    <h3>{{$writer['first_name']}} {{$writer['last_name']}}</h3>
    <p>{{count($writer['books'])}} titles</p>
</article>
