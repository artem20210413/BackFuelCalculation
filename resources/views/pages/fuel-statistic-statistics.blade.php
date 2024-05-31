@extends('layouts.layout')

@section('title')
    Список заправок
@endsection


@section('body')

    @php
        /**
        * @var \App\Services\Dto\StatisticDto $statistic
        */
    @endphp
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-4 mb-4">
        <div class="d-flex justify-content-between p-2">
            <h2>Статистика палива</h2>
            <button type="button" class="btn btn-primary"
                    onclick=" window.location.href = '{{ route('fuel-statistic-form') }}'">Додати
            </button>
        </div>
        <div class="d-flex flex-wrap justify-content-around">

            <div class="card" style="width: 25rem;">
                <div class="card-body row">
                    <p class="card-text col-7"><b>Відстань:</b> {{ $statistic?->getLastFillUp()->distance ?? '-' }}</p>
                    <p class="card-text col-5"><b>Обсяг:</b> {{ $statistic?->getLastFillUp()->volume ?? '-'  }}</p>
                    <p class="card-text col-7"><b>Витрата
                            палива:</b> {{ $statistic?->getLastFillUp()->fuel_consumption ?? '-'  }}</p>
                    <p class="card-text col-5"><b>За літр:</b> {{ $statistic?->getLastFillUp()->price_per_one ?? '-'  }}</p>
                    <p class="card-text"><b>Час заправки
                            бака:</b> {{ $statistic?->getLastFillUp()->tank_refill_time ?? '-'  }}</p>
                </div>
            </div>


            <form id="dateForm" class="row mt-3 mb-3">
                <div class="form-group col-6">
                    <label for="start_date">З:</label>
                    <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror"
                           name="start_date"
                           value="{{ old('start_date', request()->input('start_date', now()->subDays(30)->format('Y-m-d\TH:i'))) }}">


                    @error('start_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-6">
                    <label for="end_date">До:</label>
                    <input type="datetime-local" class="form-control @error('end_date') is-invalid @enderror"
                           name="end_date"
                           value="{{ old('end_date',request()->input('end_date', now()->format('Y-m-d\TH:i'))) }}">
                    @error('end_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </form>

            <div class="card mb-4" style="width: 25rem;">
                <div class="card-body row">
                    <p class="card-text col-12"><b>Кількість заправок:</b> {{ $statistic?->getCountOfRefills() }}</p>
                    <p class="card-text col-12"><b>Кількість заправлених
                            літрів:</b> {{ $statistic?->getCountOfFilledLiters() }}</p>
                    <p class="card-text col-12"><b>Кількість проїдених
                            км:</b> {{ $statistic?->getCountOfKilometersTraveled() }}</p>
                    <p class="card-text col-12"><b>Сума витрачених
                            грошей:</b> {{ $statistic?->getAmountOfMoneySpent() }}
                    </p>
                </div>
            </div>

        </div>


    </div>

    <script>
        const dateForm = document.getElementById('dateForm');
        const formInputs = document.querySelectorAll('#dateForm input');
        formInputs.forEach(function (input) {
            input.addEventListener('change', function () {
                dateForm.submit();
            });
        });
    </script>
@endsection
