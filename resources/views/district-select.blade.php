<option>-Select District-</option>

@if(!empty($district))

  @foreach($district as $key => $value)

    <option value="{{ $key }}">{{ $value }} </option>

  @endforeach

@endif