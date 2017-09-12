@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chat</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            @foreach($messages as $message)
                                <div class="row">

                                    <div class="col-md-10 {{ ($message->user_id === auth()->user()->id) ? 'pull-right text-danger text-right' : 'pull-left text-success text-left' }}">
                                        <div class="row">
                                            <sup>{{ $message->updated_at->diffForHumans() }}</sup>
                                        </div>
                                        <div class="row">
                                            <b> {{ $message->user->name }} </b>
                                        </div>
                                        <div class="row">
                                            {{ $message->body }}
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                            <div class="row">
                                <form action="{{route('messages.send')}}" method="post" >
                                    {{ csrf_field() }}
                                    <input type="hidden" name="group_id" value="{{ $messages->first()->group_id }}">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" placeholder="Your message here" name="body">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" class="btn btn-sm btn-primary" value="send">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
