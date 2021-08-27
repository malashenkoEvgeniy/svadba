@foreach( $options as $option )
    <div class="color-input-block">
        <input type="radio" name="color" data-color="{{ $option->colors_id }}" id="color{{ $option->colors_id }}" @if($loop->first) checked @endif>
        <label for="color{{ $option->colors_id }}">
            <span class="colors-value-block" style="background-color: {{ $option->colors->meaning }}"></span>
            {{ $option->colors->translate()->title }}
        </label>
    </div>
@endforeach
