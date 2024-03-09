<div id="comments-container-div">

    @foreach($book->comments as $comment)

        <article class="article-comment">
            <div class="comment-user-info-container">
                <div class="avatar-and-name-container">

                    <img class="set-brightness comment-avatar" alt="avatar" src="{{asset('assets/images/avatars')}}/@if(empty($comment->user->avatar)){{'default-avatar.jpg'}}@else{{$comment->user->avatar['src']}}@endif">

                    <p class="comment-username">{{$comment->user['username']}}</p>

                </div>
                @if($comment->user->userReview($comment['book_id']))

                    <div class="comments-stars">

                        @for($i=0;$i<5;$i++)
                            @if($comment->user->userReview($comment['book_id'])['stars']>$i)
                                <i class="fa-solid fa-star"></i>
                            @else
                                <i class="fa-regular fa-star"></i>
                            @endif

                        @endfor

                        <p>{{$comment->user->userReview($comment['book_id'])['stars']}}/5</p>
                    </div>

                @endif
            </div>

            <div class="text-and-pictures-container">
                <div class="comment-text">
                    <p class="comment-text-row">{{$comment['text']}}</p>
                </div>
                <div class="comment-pictures-container">
                    @foreach($comment->commentImages as $commentImage)
                        <img class="set-brightness comment-picture" alt="user uploaded picture" src="{{asset('assets/images/comments')}}/{{$commentImage->image['src']}}">
                    @endforeach
                </div>
            </div>
        </article>

    @endforeach



</div>
