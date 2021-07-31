@include('layouts/header')
<div class="container" style="margin-top: 25px">
    <div class="row">
        <div class="col-12">
            <h4>Комментарии:</h4>
            @if ($comments->isNotEmpty())
                <table class="table">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Комментарий</th>
                        <th scope="col">Оценка</th>
                        <th scope="col">Дата</th>
                    </tr>
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{$comment['id']}}</td>
                            <td>{{$comment['comment_content']}}</td>
                            <td>{{$comment['rating']}}</td>
                            <td>{{$comment['created_at']}}</td>
                        </tr>
                    @endforeach
                </table>
            @else
                <p>К этой книге ещё никто не оставлял комментарии. Вы можете стать первым!
                    <a href="/book/{{$book_id}}">Оставить
                        комментарий</a>
                </p>
            @endif
        </div>
    </div>
</div>
