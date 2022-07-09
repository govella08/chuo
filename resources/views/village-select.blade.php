<option>-Select Village-</option>

@if(!empty($village))

  @foreach($village as $key => $value)

    <option value="{{ $key }}">{{ $value }} </option>

  @endforeach

@endif