@extends('layouts.layout')

@section('title')
    Список заправок
@endsection


@section('body')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-4 mb-4">
        <div class="d-flex justify-content-between p-2">
            <h2>Перелік</h2>
            <button type="button" class="btn btn-primary"
                    onclick=" window.location.href = '{{ route('fuel-statistic-form') }}'">Додати
            </button>
        </div>
        <div class="d-flex flex-wrap justify-content-around">

            @foreach(json_decode($fuelStatistics->toJson()) as $fuelStat)
                <div class="card mb-4" style="width: 25rem;">
                    <div class="card-body row">
                        <p class="card-text col-7"><b>Відстань:</b> {{ $fuelStat->distance }}</p>
                        <p class="card-text col-5"><b>Обсяг:</b> {{ $fuelStat->volume }}</p>
                        <p class="card-text col-7"><b>Витрата палива:</b> {{ $fuelStat->fuel_consumption }}</p>
                        <p class="card-text col-5"><b>За літр:</b> {{ $fuelStat->price_per_one }}</p>
                        <p class="card-text"><b>Час заправки бака:</b> {{ $fuelStat->tank_refill_time }}</p>
                    </div>
                </div>
            @endforeach

        </div>

        {{--        <nav class="navbar navbar-expand-lg navbar-light justify-content-center">--}}
        {{--            {{ $fuelStatistics->appends(request()->input())->links()}}--}}
        {{--        </nav>--}}
        <nav class="navbar navbar-expand navbar-light justify-content-center">
            {{ $fuelStatistics->appends(request()->input())->links()}}
        </nav>
    </div>

@endsection
