@include('layouts.header')
<div class="container">
    <div class="row">
        <div class="col-12">
            @if(!empty($booksList))
            <table class="table">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Автор</th>
                    <th scope="col">Название</th>
                    <th scope="col">Год публикации</th>
                    <th scope="col">Дата создания</th>
                    <th scope="col"></th>
                </tr>
                @foreach($booksList as $book)
                    <tr>
                        <td><?php echo $book['id']?></td>
                        <td><?php echo $book['author_name']?></td>
                        <td><?php echo $book['title']?></td>
                        <td><?php echo $book['publication_year']?></td>
                        <td><?php echo $book['created_at']?></td>
                        <td><a href="/book/update/<?php echo $book['id']; ?>"
                               class="btn btn-primary">Редактировать</a>
                    </tr>
                @endforeach
            @endif
        </div>
    </div>
</div>
@include('layouts/footer')
