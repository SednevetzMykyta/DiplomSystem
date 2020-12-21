@extends('look')

@section('main_content')
    <h1>  Користувач </h1>
    <b>{{ $el->email }}</b>
    <p>{{ $el->message }}</p>

    echo '<p>Уникальных посетителей: ' . $row['hosts'] . '<br />';
        echo 'Просмотров: ' . $row['views'] . '</p>';
@endsection
