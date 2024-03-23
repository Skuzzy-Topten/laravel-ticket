@extends('layout.master')
@section('siteTitle', 'Ticket Edit')
@section('content')
    <div class="container-fluid">
        <div class="container py-5">
            <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 mx-auto">
                <div class="col">
                    <h4>Edit ticket</h4>
                </div>
                <form method="post">
                    @csrf
                    @foreach($errors->all() as $e)
                        <p class="alert alert-danger">{{$e}}</p>
                    @endforeach
                    @if(session('status'))
                        <div class="alert alert-success">{{session('status')}}</div>
                    @endif
                    <div class="col p-2">
                        <label for="title" class="pb-2">
                            Title
                        </label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Title">
                    </div>
                    <div class="col p-2">
                        <label for="content" class="pb-2">
                            Content
                        </label>
                        <textarea id="content" name="content" class="form-control" placeholder="Content"></textarea>
                    </div>
                    <div class="col p-2">
                        <a href="{{route('ticket.show', $ticket->slug)}}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection