@include('layouts/header')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Добавление новой книги</h3>
            <form action="/book/create" method="POST" enctype="multipart/form-data">
                @csrf
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="author_name" class="form-label">Автор</label>
                    <input type="text" name="author_name" value="{{ old("author_name") }}" class="form-control"
                           id="author_name"
                           placeholder="Введите автора книги">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Название</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title"
                           placeholder="Введите название книги">
                </div>
                <div class="mb-3">
                    <label for="publication_year" class="form-label">Год публикации</label>
                    <input type="text" name="publication_year" value="{{ old('publication_year') }}"
                           class="form-control"
                           id="publication_year" placeholder="Введите год публикации книги">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Изображение книги</label>
                    <input type="file" name="image" value="{{ old('image') }}" class="form-control" id="image" placeholder="">
                </div>
                <input type="submit" name="submit" class="btn btn-primary mb-3" value="Создать книгу">
            </form>
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
