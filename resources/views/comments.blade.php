<section id="comments">
<h3>Коментарии</h3>
    <div>
        <div class="comment">
            <ul>
                @foreach($comments as $comment)
                    <li>Автор: {{$comment->user}}<br>{{$comment->message}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
</section>