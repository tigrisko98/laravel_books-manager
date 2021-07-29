@include('layouts/header')
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card" style="width: 18rem;">
              <img src="{{Storage::url("images/" . $book['image_url'])}}" class="card-img-top"
                     width="200"
                     alt="">
                <div>


                </div>
                <div class="card-body">
                    <h4>{{$book['title']}}</h4>
                    <p class="card-text">Автор книги: {{$book['author_name']}}</p>
                    <p class="card-text">Год публикации: {{$book['publication_year']}}</p>
                    <p class="card-text">Количество просмотров: {{$book['views']}}</p>
                    <p class="card-text">Средння оценка: {{$avg_rating}}</p>
                </div>
            </div>
        </div>

        <div class="col-8">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="leave-comment-tab" data-bs-toggle="tab"
                            data-bs-target="#leave-comment" type="button" role="tab" aria-controls="leave-comment"
                            aria-selected="true">Оставить комментарий
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="/book/comments/{{$book['id']}}" class="nav-link" type="button">Список
                        комментариев
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="leave-comment" role="tabpanel"
                     aria-labelledby="leave-comment-tab">
                    <h4>Оставить комментарий</h4>
                    <form action="/book/comment/{{$book['id']}}" method="post">
                        {{ csrf_field() }}
                        <label for="content" class="form-label">Комментарий</label>
                        <p>
                            <textarea name="content" class="form-control" id="content"
                                      placeholder="Оставьте Ваш комментарий к книге">{{old('content')}}</textarea>
                        </p>
                        <label for="rating" class="form-label">Оценка</label>
                        <p>
                            <select name="rating" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example">
                                <option selected disabled>Поставьте оценку книге</option>
                                <?php for ($i = 1; $i <= 10; $i++) {
                                    echo "<option value=" . $i . ">$i</option>";
                                }
                                ?>


                            </select>
                        </p>
                        <input type="submit" name="submit" class="btn btn-primary mb-3" value="Отправить комментарий">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@include('layouts/footer')
