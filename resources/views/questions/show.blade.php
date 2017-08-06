@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1> {{ $question->title }}</h1>
            <p>{{ $question->body }}</p>
            <p><i>by: {{ $question->user->name }}</i></p>

            <hr>
            <h3>{{ count($solutions) }} Solutions</h3>

            @foreach($solutions as $solution)
                <div class="row" id="vote">
                    <div class="col-md-2">
                        <div class="well well-margin text-center ">
                            {!! Form::model($solution, ['route' => ['vote.increase', $solution->id], 'method' => 'PUT']) !!}
                            {{ Form::submit('&uarr;', array('class' => 'btn btn-default')) }}
                            {!! Form::close() !!}
                            {{--<button type="button" class="btn btn-default">--}}
                                {{--<span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>--}}
                            {{--</button>--}}
                            <h4>{{ $solution->votes }}</h4>
                            {{--<button type="button" class="btn btn-default">--}}
                                {{--<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>--}}
                            {{--</button>--}}

                            {!! Form::model($solution, ['route' => ['vote.decrease', $solution->id], 'method' => 'PUT']) !!}
                            {{ Form::submit('&darr;', array('class' => 'btn btn-default')) }}
                            {!! Form::close() !!}

                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="well text-left" id="solution-body">
                            <p class="text-left">{{$solution->body}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="well" id="solution-info">
                            <div style="display: flex;">
                                @if(Auth::check())
                                    @if(Auth::user()->id == $solution->user_id || strcmp(Auth::user()->type, 'admin') == 0)
                                        {!! Html::linkRoute('solutions.edit', 'Edit', array($solution->id), array('class'=> 'btn btn-primary', 'style' => 'margin: 3px;')) !!}
                                        {!! Form::model($solution, ['route' => ['solutions.destroy', $solution->id], 'method' => 'DELETE']) !!}
                                        {{ Form::submit('Delete', array('class' => 'btn btn-danger', 'style' => 'margin: 3px;')) }}
                                        {!! Form::close() !!}
                                    @endif
                                @endif
                            </div>
                            <div class="text-center">
                                <p>solution by {{ $solution->user->name }} <br>{{\App\Http\Controllers\QuestionController::time_elapsed_string($solution->created_at)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach

            @if(Auth::check())
                {!! Form::open(['route' => 'solutions.store']) !!}
                {{ Form::label('body', 'Body:') }}
                {{ Form::textarea('body', null, array('class' => 'form-control')) }}
                {{ Form::hidden('question_id', $question->id) }}
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

    <script>

        {{--function increase(solution_id){--}}
            {{--{{$id = solution_id}}--}}
            {{--window.location = {{ route('vote.increase', $id) }};--}}
        {{--}--}}

        var clientHeight = document.getElementById('vote').clientHeight;
//        console.log(clientHeight);
        document.getElementById('solution-body').style.minHeight =clientHeight-20 + "px";
        document.getElementById('solution-info').style.minHeight =clientHeight-20 + "px";
    </script>
@endsection
