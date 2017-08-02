@extends('master')

@section('content')

    @foreach($questions as $question)
        <div class="row">
            <div class="col-md-10">
                <h3>{{$question->title}}</h3>
                <p>{{$question->body}}</p>
            </div>
            <div class="col-md-2">
                {!! Html::linkRoute('questions.edit', 'Edit', array($question->id), array('class'=> 'btn btn-default')) !!}
            </div>

        </div>
        <hr>
    @endforeach
    <div class="text-center">
        {{ $questions->links() }}
    </div>

@endsection

