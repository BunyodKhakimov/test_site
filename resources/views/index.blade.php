@extends('layouts.app')

@section('content')
    <div class="py-5 text-center">
        <h1>Form Submit Page</h1>
        <h2>{{$form['title']}}</h2>
        <p class="lead">Please fill in and press submit button.</p>
    </div>

    <div class="row g-5 justify-content-center">
        <div class="col-md-5 col-lg-6">
            @if(isset($fields) && count($fields)>0)
                @foreach($fields as $field)
                    @switch($field['type'])
                        @case('input')
                        <label for="{{$field['title']}}" class="form-label">{{$field['title']}}</label>
                        <input type="text" class="form-control" id="{{$field['title']}}" name="{{$field['title']}}" placeholder="{{$field['description']}}">
                        @break

                        @case('textarea')
                        <label for="{{$field['title']}}" class="form-label">{{$field['title']}}</label>
                        <textarea class="form-control" id="{{$field['title']}}" name="{{$field['title']}}" placeholder="{{$field['description']}}" rows="3"></textarea>
                        @break

                        @case('select')
                        <label for="{{$field['title']}}" class="form-label">{{$field['title']}}</label>
                        <select class="form-select" aria-label="{{$field['title']}}">
                            <option selected>{{$field['description']}}</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        @break

                        @default
                        <h4 class="mb-3">Field is broken :(</h4>
                    @endswitch
                    <hr class="my-4">
                @endforeach
            @else
                <h4 class="mb-3">No fields found!</h4>
            @endif
            <form action="" method="post">
                @csrf()
                @method('POST')
                <button class="w-100 btn btn-primary btn-lg" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
