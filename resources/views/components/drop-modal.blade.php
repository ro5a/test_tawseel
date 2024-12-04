<div class="modal fade" {{ $attributes }} data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 class="text-center">{{ $message }}</h4>
            </div>
            <div class="modal-footer">
                @if (!isset($cancel))
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">الغاء</button>
                @endif
                <a href="{{ $link }}">
                    {{ $action }}
                </a>
            </div>
        </form>
