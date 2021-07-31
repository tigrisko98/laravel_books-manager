@include('layouts.header')
<div class="container">
    <div class="row">
        <div class="col-12">
            @if($booksList->isNotEmpty())
                <table class="table">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Автор</th>
                        <th scope="col">Название</th>
                        <th scope="col">Год публикации</th>
                        <th scope="col">Дата создания</th>
                        <th scope="col"></th>
                    </tr>
                    @foreach ($booksList as $book)
                        <tr>
                            <td>{{$book['id']}}</td>
                            <td>{{$book['author_name']}}</td>
                            <td><a href="/book/{{$book['id']}}">{{$book['title']}}</td>
                            <td>{{$book['publication_year']}}</td>
                            <td>{{$book['created_at']}}</td>
                            <td><a href="/book/update/{{$book['id']}}"
                                   class="btn btn-primary">Редактировать</a>
                                <a href="/book/delete/{{$book['id']}}" class="btn btn-danger">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <p>На данный момент нет добавленных книг. Нажмите "Добавить книгу" в навигационном меню чтобы добавить книгу!</p>
            @endif
        </div>
    </div>
</div>
@include('layouts/footer')
