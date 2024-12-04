<div class="container-xxl flex-grow-1 container-p-y">
    <x-messages><x-slot name='type'>info</x-slot></x-messages>
    <div id="message"> </div>
    <h4 class="fw-bold"> {{$tableName}}</h4>

    <!-- Bordered Table -->
    <div class="card " >
        <h5 class="card-header">{{$button}}</h5>
        <div class="d-flex justify-content-center">
            {{ $pagination }}
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table  id={{$id ?? "datatable"}} class="table table-bordered" >
                    <thead >
                        {{$tableHead}}
                    </thead>
                    <tbody >
                        {{$tableBody}}
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $pagination }}
        </div>
    </div>
    <!--/ Bordered Table -->
    <div id="content_modal"></div>
</div>
