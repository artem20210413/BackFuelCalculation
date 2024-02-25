<header class="d-flex justify-content-between p-3 shadow">
    <div>
        <button type="button" class="btn btn-primary"
                {{--                onclick=" window.location.href = '{{ \Illuminate\Support\Facades\Redirect::back()->getTargetUrl() }}'">Назд--}}
                onclick=" window.location.href = '{{ \Illuminate\Support\Facades\Redirect::route('fuel-statistic-list')->getTargetUrl() }}'">
            Статистика палива
        </button>
    </div>
    <div>
        <button type="button" class="btn btn-danger" onclick=" window.location.href = '{{ route('logout') }}'">Вийти
        </button>
    </div>
</header>
