@extends('layout.master')
@section('siteTitle', 'Show')
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="col-xl-6 py-2 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="col p-2">
                        <h5 class="card-title m-0">{{$ticket->title}}</h5>
                    </div>
                    <div class="col p-2">
                        <p class="card-detail m-0">
                            {{$ticket->content}}
                        </p>
                    </div>
                    <div class="col p-2">
                        <form method="post" action="{{route('ticket.delete', $ticket->slug)}}">
                            @csrf
                            <a href="{{route('ticket.edit', $ticket->slug)}}" class="btn btn-primary">
                                Edit
                            </a>
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection