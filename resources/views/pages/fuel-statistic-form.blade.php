@extends('layouts.layout')

@section('title')
    Увійти
@endsection


@section('body')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form class="d-flex justify-content-center align-items-center flex-column p-4 container" method="post">
        @csrf

        <div class="row">

            <div class="center mt-2 col-4">
                <label class="form-label">Відстань</label>
                <input required type="text" pattern="[0-9]+([.,][0-9]+)?" class="form-control @error('distance') is-invalid @enderror"
                       name="distance" placeholder="123.4" value="{{ old('distance') }}">
                @error('distance')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="center mt-2 col-4">
                <label class="form-label">Об'єм</label>
                <input required type="text" pattern="[0-9]+([.,][0-9]+)?" class="form-control @error('volume') is-invalid @enderror"
                       name="volume" placeholder="30" value="{{ old('volume') }}">
                @error('volume')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="center mt-2 col-4">
                <label class="form-label">Цена</label>
                <input required type="text" pattern="[0-9]+([.,][0-9]+)?" class="form-control @error('refill_amount') is-invalid @enderror"
                       name="refill_amount" placeholder="800.25" value="{{ old('refill_amount') }}">
                @error('refill_amount')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="center mt-2 col-4">
                <label class="form-label">Алиас АЗС</label>
                <select required class="form-select @error('gas_station_alias') is-invalid @enderror"
                        name="gas_station_alias">
                    @foreach($gasStations as $item)
                        <option
                            value="{{$item->alias}}" {{ old('gas_station_alias') === $item->alias ? 'selected' : '' }}>{{$item->name}}</option>
                    @endforeach
                </select>
                @error('gas_station_alias')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="center mt-2 col-4">
                <label class="form-label">Тип пального</label>
                <select required class="form-select @error('fuel_type_alias') is-invalid @enderror"
                        name="fuel_type_alias">
                    @foreach($fuelTypes as $item)
                        <option
                            value="{{$item->alias}}" {{ old('fuel_type_alias', 'gas') === $item->alias ? 'selected' : '' }}>{{$item->name}}</option>
                    @endforeach
                </select>
                @error('fuel_type_alias')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="center mt-2 col-4">
                <label class="form-label">Тип руху</label>
                <select required class="form-select @error('movement_type_alias') is-invalid @enderror"
                        name="movement_type_alias">
                    @foreach($movementTypes as $item)
                        <option
                            value="{{$item->alias}}" {{ old('movement_type_alias', 'gas') === $item->alias ? 'selected' : '' }}>{{$item->name}}</option>
                    @endforeach
                </select>
                @error('movement_type_alias')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>


            <div class="center mt-2">
                <label class="form-label">Відсоток заторів</label>
                <input required type="range" class="form-range @error('traffic_jam_percentage') is-invalid @enderror"
                       name="traffic_jam_percentage" min="0" max="100" step="0.1"
                       value="{{ old('traffic_jam_percentage', 50.0) }}">
                @error('traffic_jam_percentage')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="center mt-2">
                <label class="form-label">Час заправки бака</label>
                <input required type="datetime-local"
                       class="form-control @error('tank_refill_time') is-invalid @enderror"
                       name="tank_refill_time" value="{{ old('tank_refill_time', now()->format('Y-m-d\TH:i')) }}">
                @error('tank_refill_time')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="center mt-2">
                <label class="form-label">Опис</label>
                <textarea class="form-control @error('description') is-invalid @enderror"
                          name="description" placeholder="TEST">{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Зберегти</button>
    </form>

@endsection
