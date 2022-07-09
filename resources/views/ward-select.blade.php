<option>-Select Ward-</option>

@if(!empty($ward))

  @foreach($ward as $key => $value)

    <option value="{{ $key }}">{{ $value }} </option>

  @endforeach

@endif