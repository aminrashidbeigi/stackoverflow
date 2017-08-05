@extends('master')

@section('stylesheets')
    {!! Html::style('css/select2.min.css')  !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit Solution</h1>
            <hr>
            {!! Form::model($solution, ['route' => ['solutions.update', $solution->id], 'method' => 'PUT']) !!}
            {{--{{ Form::label('category_id', 'Category:') }}--}}
            {{--<select class="form-control" name="category_id">--}}
            {{--@foreach($categories as $category)--}}
            {{--<option value="{{ $category->id }}">{{ $category->name }}</option>--}}
            {{--@endforeach--}}
            {{--</select>--}}

            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body', $solution->body, array('class' => 'form-control')) }}

            {{ Form::submit('Save', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;')) }}

            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/select2.min.js') !!}
@endsection
