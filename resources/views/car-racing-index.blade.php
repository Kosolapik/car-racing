@extends('layouts.app')

@section('content')
    <div class="header">
        <nav class="navbar navbar-expand-lg bg-body-secondary" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand" href="#">CarRacingTable</a>
            </div>
        </nav>
    </div>
    <div class="main">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Имя пилота</th>
                        <th scope="col">Город</th>
                        <th scope="col">Автомобиль</th>
                        <th scope="col">1-й заезд</th>
                        <th scope="col">2-й заезд</th>
                        <th scope="col">3-й заезд</th>
                        <th scope="col">4-й заезд</th>
                        <th scope="col">Сумма очков</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($table as $cell => $value)
                        <tr>
                            <th>{{ $index++ }}</th>
                            <td>{{ $value['name'] }}</td>
                            <td>{{ $value['city'] }}</td>
                            <td>{{ $value['car'] }}</td>
                            <td>{{ $value['attempts'][0] }}</td>
                            <td>{{ $value['attempts'][1] }}</td>
                            <td>{{ $value['attempts'][2] }}</td>
                            <td>{{ $value['attempts'][3] }}</td>
                            <td>{{ $value['total'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
