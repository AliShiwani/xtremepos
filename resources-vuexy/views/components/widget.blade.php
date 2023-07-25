<div class="card {{$class ?? 'card-solid'}}" @if(!empty($id)) id="{{$id}}" @endif >
    @if(empty($header))
        @if(!empty($title) || !empty($tool))
        <div class="card-header">
            {!!$icon ?? '' !!}
            <h3 class="card-title">{{ $title ?? '' }}</h3>
            {!!$tool ?? ''!!}
        </div>
        @endif
    @else
        <div class="card-header">
            {!! $header !!}
        </div>
    @endif

    <div class="card">
        <div class="card-body row">
            {{$slot}}
        </div>
    </div>
    <!-- /.box-body -->
</div>