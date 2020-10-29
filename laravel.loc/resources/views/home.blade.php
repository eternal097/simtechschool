@extends('layouts.main')

@section('title')Главная страница@endsection

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1>Ваши сообщения</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
            <p>
                <a href="{{ route('contact') }}" class="btn btn-primary my-2">Отправить сообщение</a>
            </p>
        </div>
    </section>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">E-mail</th>
                <th scope="col">Пол</th>
                <th scope="col">Страна</th>
                <th scope="col">Сообщение</th>
                <th scope="col">Фото</th>

            </tr>
            </thead>
            <tbody>
            @foreach($data as $el)
            <tr>
                <td>{{$el->name}}</td>
                <td>{{$el->email}}</td>
                <td>{{$el->gender}}</td>
                <td>{{$el->country}}</td>
                <td>{{$el->text}}</td>
                <td><img src="storage/uploads/{{$el->photo}}" alt="..." class="img-thumbnail"></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{$data->links()}}
    </div>
@endsection
