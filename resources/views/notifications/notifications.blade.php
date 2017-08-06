@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Notifications</h1>
            <hr>
            @if(count($notifications) > 0)
                @foreach($notifications as $notification)
                    @if(!$notification->is_view)
                        <div class="alert alert-info" role="alert">
                            <b>New:</b>
                            {{ $notification->message }}
                            {{\App\Http\Controllers\NotificationController::viewed($notification->id, \Illuminate\Support\Facades\Auth::user()->id)}}
                        </div>
                    @else
                        <div class="alert alert-success" role="alert">
                            {{ $notification->message }}
                            {{\App\Http\Controllers\NotificationController::viewed($notification->id, \Illuminate\Support\Facades\Auth::user()->id)}}
                        </div>
                    @endif
                @endforeach
            @else
                <p>You have not notifications</p>
            @endif
        </div>
    </div>
@endsection
