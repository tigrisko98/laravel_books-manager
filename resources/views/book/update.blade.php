@include('layouts/header')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Редактирование книги «<?php echo $book['title']; ?>»</h3>
            <form action="/book/update/<?php echo $book['id']?>" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="author_name" class="form-label">Автор</label>
                    <input type="text" name="author_name" class="form-control" id="author_name"
                           placeholder="Введите автора книги"
                           value="<?php echo $book['author_name']; ?>">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Название</label>
                    <input type="text" name="title" class="form-control" id="title"
                           placeholder="Введите название книги"
                           value="<?php echo $book['title']; ?>">
                </div>
                <div class="mb-3">
                    <label for="publication_year" class="form-label">Год публикации</label>
                    <input type="text" name="publication_year" class="form-control" id="publication_year"
                           placeholder="Введите год публикации книги"
                           value="<?php echo $book['publication_year']; ?>">
                </div>
            <!--<div class="mb-3">
                    <label for="image" class="form-label">Изображение книги</label><br>
                    <img src="<?php echo $book['image_url']; ?>" width="200" alt=""><br><br>
                    <input type="file" name="image" class="form-control" id="image" placeholder="" value="">
                </div>-->
                <input type="submit" name="submit" class="btn btn-primary mb-3" value="Обновить данные">
            </form>
        </div>
    </div>
</div>
@include('layouts/footer')
