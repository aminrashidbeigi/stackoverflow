@extends('master')

@section('content')

    @foreach($questions->reverse() as $question)
        <div class="row">
            <div class="col-md-2">
                <div class="well text-center" style="display: flex;">
                    <div style="width: 50%;">
                        <h4>{{ $question->view }}</h4><h5 style="margin: 3px;">Views</h5>
                    </div>
                    <div style="width: 50%;">
                        <h4>{{ count($question->solutions) }}</h4><h5 style="margin: 3px;">Solutions</h5>
                    </div>

                </div>
            </div>

            <div class="col-md-8">
                <div class="well">
                    <a href="{{ route('questions.show', $question->id) }}" class="text-left">
                        <h4>{{$question->title}}</h4>
                    </a>
                    <p class="text-right">
                        {{\App\Http\Controllers\QuestionController::time_elapsed_string($question->created_at)}}
                    </p>
                </div>
            </div>

            @if(Auth::check())
                @if(Auth::user()->id == $question->user_id || strcmp(Auth::user()->role, 'admin') == 0)
                <div class="col-md-2">
                    <div class="well" style="display: flex;">
                        {!! Html::linkRoute('questions.edit', 'Edit', array($question->id), array('class'=> 'btn btn-primary', 'style' => 'margin: 3px;')) !!}
                        {!! Form::model($question, ['route' => ['questions.destroy', $question->id], 'method' => 'DELETE']) !!}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger', 'style' => 'margin: 3px;')) }}
                        {!! Form::close() !!}
                    </div>
                </div>
                @endif
            @endif

        </div>
        <hr>
    @endforeach
    <div class="text-center">
        {{ $questions->links() }}
    </div>

@endsection

