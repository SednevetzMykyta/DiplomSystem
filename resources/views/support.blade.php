@extends('look')

@section('main_content')

    <h1>Форма для відправлення запиту</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="/support/check">
        @csrf
        <input type="email" name="email" id="email" placeholder=" email" class="form-control"><br>
        <input type="text" name="subject" id="subject" placeholder="Тема запиту" class="form-control"><br>
        <textarea name="message" id="message" class="form-control" placeholder="інформація про запит"></textarea><br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
    <br>
    <h1>Всі запити</h1>
    @foreach($supports as $el)
        <div class="alert alert-warning">
            <h3>{{ $el->subject }}</h3>
            <b>{{ $el->email }}</b>
            <p>{{ $el->message }}</p>
        </div>
    @endforeach
@endsection
