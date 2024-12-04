<div class="modal fade" id="{{$target}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content py-md-5 px-md-4 p-sm-3 p-4 p-5 " style="padding: 20px">

            <h3 class="text-center">@lang('content.register_course')</h3>
            <div class="card mb-4">

                <form class="card-body" {{$attributes }} style="padding: 20px" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{$form_input}}
                    <div class="pt-4 row register_btn">
                        <button type="button" class="btn btn-secondery text-white"
                            style="width:30%;" data-dismiss="modal"
                            aria-label="Close">@lang('content.cancel')</button>
                        <button type="submit" class="btn btn-warning"
                            style="color:black;width:60%">@lang('content.register')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
