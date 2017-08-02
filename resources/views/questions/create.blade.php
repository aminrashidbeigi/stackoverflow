@extends('master')

@section('stylesheets')
    {!! Html::style('css/select2.min.css')  !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Ask Your Question</h1>
            <hr>
            {!! Form::open(['route' => 'questions.store']) !!}
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}

            {{--{{ Form::label('tags', 'Tags:') }}--}}
            {{--<select class="form-control select22" name="tags[]" multiple="multiple">--}}
                {{--@foreach($tags as $tag)--}}
                    {{--<option value="{{ $tag->id }}">{{ $tag->name }}</option>--}}
                {{--@endforeach--}}
            {{--</select>--}}

            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body', null, array('class' => 'form-control')) }}

            {{ Form::submit('Create', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;')) }}
            {!! Form::close() !!}

        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.select22').select2();
    </script>
@endsection
