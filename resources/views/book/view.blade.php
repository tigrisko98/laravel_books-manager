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
    </div>
</div>
@include('layouts/footer')
