@extends('layout.master')
@section('siteTitle', 'Tickets')
@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="col p-2">
                @if($tickets->isEmpty())
                <p>There is no ticket.</p>
                @else
                @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                            <tr>
                                <td>
                                    {{$ticket->id}}
                                </td>
                                <td>
                                    <a href="{{route('ticket.show', $ticket->slug)}}">
                                        {{$ticket->title}}
                                    </a>
                                </td>
                                <td>{{$ticket->status?'Pending':'Answered'}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            </div>
        </div>
    </div>
@endsection