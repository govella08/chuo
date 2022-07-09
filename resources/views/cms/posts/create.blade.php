@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create a New Post') }}</div>

                <div class="card-body">
                    <form method="POST" action="/posts" aria-label="{{ __('create') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title_translation" class="col-md-4 col-form-label text-md-right">{{ __('Title Sw') }}</label>

                            <div class="col-md-6">
                                <input id="title_translation" type="text" class="form-control{{ $errors->has('title_translation') ? ' is-invalid' : '' }}" name="title_translation" value="{{ old('title_translation') }}" required>

                                @if ($errors->has('title_translation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title_translation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description En') }}</label>

                            <div class="col-md-6">
                                <textarea name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" required>{{old('description')}}</textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description_translation" class="col-md-4 col-form-label text-md-right">{{ __('Description Sw') }}</label>

                            <div class="col-md-6">
                                <textarea name="description_translation" class="form-control{{ $errors->has('description_translation') ? ' is-invalid' : '' }}" required>{{old('description_translation')}}</textarea>
                                @if ($errors->has('description_translation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description_translation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Post') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
