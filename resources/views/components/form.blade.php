<div class="container-xxl flex-grow-1 container-p-y">
    <x-messages><x-slot name='type'>info</x-slot></x-messages>
    <h4 class="fw-bold py-2 mb-3 fs-2">{{ $title }}</h4>

    <!-- Multi Column with Form Separator -->
    <div class="card mb-4">

        <form class="card-body row" {{ $attributes }} method="POST" enctype="multipart/form-data">
            @csrf
            {{ $formInput }}




            <div class="pt-4">
                <button type="submit" class="btn btn-primary text-white me-sm-3 me-1">{{ $action }}</button>
                <a href="{{ $route }}" type="button" class="btn btn-outline-secondary" >الغاء</a>
            </div>
        </form>
    </div>
</div>
