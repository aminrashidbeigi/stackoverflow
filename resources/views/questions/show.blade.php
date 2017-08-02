@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1> {{ $question->title }}</h1>
            <p>{{ $question->body }}</p>
        </div>
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                <div class="well">
                    <dl class="dl-horizontal">
                        <label>Question Created At :</label>
                        <p>{{$question->created_at}}</p>
                    </dl>
                    {{--<dl class="dl-horizontal">--}}
                    {{--<label>Category :</label>--}}
                    {{--<p>{{$question->category->name}}</p>--}}
                    {{--</dl>--}}
                    {{--<dl class="dl-horizontal">--}}
                        {{--<label>Post URL :</label>--}}
                        {{--<p>{{url($question->slug)}}</p>--}}
                    {{--</dl>--}}
                    {{--<hr>--}}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Html::linkRoute('questions.edit', 'Edit', array($question->id), array('class'=> 'btn btn-primary btn-lg btn-block')) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::model($question, ['route' => ['questions.destroy', $question->id], 'method' => 'DELETE']) !!}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-lg btn-block')) }}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection