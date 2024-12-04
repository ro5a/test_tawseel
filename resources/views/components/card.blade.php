<div>
    <a {{$attributes }}>
        <div class="col {{ $category }}">
            <div class="image-container">
                <img src='{{ $img_src}}' alt="image description" class="img-responsive">
            </div>
            <div class="row text-center">
                <h3 class="text-capitalize">
                    {{ $name }}</h3>
                <p style="padding:0 15px;">{{$description}}</p>
                <div style="padding: 10px 0;">
                    <a {{$attributes }} style="margin-bottom:20px ;color:var(--main-color);padding-right: 100px;">
                        @lang('content.read_more')
                    </a>
                    <i class="fa fa-share-alt shareButton" style="cursor: pointer;font-size:20px;color:var(--main-color)"
                    data-link="{{ $link}}" ></i>
                </div>
            </div>
        </div>
    </a></div>
