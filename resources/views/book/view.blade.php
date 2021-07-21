@include('layouts/header')
<div class="container">
    <div class="row">
        <div class="col-3">
            <div class="card" style="width: 18rem;">
            <!--   <img src="{{$book['image_url']}}" class="card-img-top" width="200"
                     alt=""> -->
                <div class="card-body">
                    <h4>{{$book['title']}}</h4>
                    <p class="card-text">Автор книги: {{$book['author_name']}}</p>
                    <p class="card-text">Год публикации: {{$book['publication_year']}}</p>
                </div>
            </div>
        </div>

        <div class="col-9">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="leave-comment-tab" data-bs-toggle="tab"
                            data-bs-target="#leave-comment" type="button" role="tab" aria-controls="leave-comment"
                            aria-selected="true">Оставить комментарий
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="comments-list-tab" data-bs-toggle="tab" data-bs-target="#comments-list"
                            type="button" role="tab" aria-controls="comments-list" >Список
                        комментариев
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="leave-comment" role="tabpanel"
                     aria-labelledby="leave-comment-tab">
                    <h4>Оставить комментарий</h4>
                    <form action="comment/{{$book['id']}}" method="post">
                        {{ csrf_field() }}
                        <label for="content" class="form-label">Комментарий</label>
                        <p>
                            <textarea name="content" class="form-control" id="content"
                                      placeholder="Оставьте Ваш комментарий к книге"></textarea>
                        </p>
                        <input type="submit" name="submit" class="btn btn-primary mb-3" value="Отправить комментарий">
                    </form>
                </div>
                <div class="tab-pane fade" id="comments-list" role="tabpanel" aria-labelledby="comments-list-tab">
                    <h4>Комментарии:</h4>
                    @if (!empty($comments))
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
                                    <td>{{$comment['content']}}</td>
                                    <td>{{$comment['rating']}}</td>
                                    <td>{{$comment['created_at']}}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>К этой книге ещё никто не оставлял комментарии. Вы можете стать первым!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts/footer')
