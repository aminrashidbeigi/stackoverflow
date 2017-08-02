@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1> {{ $question->title }}</h1>
            <p>{{ $question->body }}</p>
            <p><i>by: {{ $question->user->name }}</i></p>

            <hr>
            <h3>Solutions</h3>

            @if(Auth::check())
                {!! Form::open([route('solutions.store')]) !!}

                {{ Form::label('body', 'Body:') }}

                {{ Form::textarea('body', null, array('class' => 'form-control')) }}

                {{ Form::submit('Reply', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;')) }}

                {!! Form::close() !!}

            @else
                <p>Do you want to reply to the question? please <a href="{{ route('login') }}">Login</a></p>
            @endif

        </div>
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                <div class="well">
                    <dl class="dl-horizontal">
                        <label>Question Created At :</label>
                        <p>{{$question->created_at}}</p>
                    </dl>
                    <dl class="dl-horizontal">
                    <label>Views :</label>
                    <p>{{$question->view}}</p>
                    </dl>
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