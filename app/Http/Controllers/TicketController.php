<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Http\Requests\TicketFormRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketFormRequest $request)
    {
        $slug = uniqid();
        $ticket = new Ticket(array(
            'title'=>$request->get('title'),
            'content'=>$request->get('content'),
            'slug'=>$slug
        ));
        $ticket->save();
        return redirect('/create')->with('status', 'Your ticket has been created!. Its unique id is '.$slug);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        return view('show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        return view('edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TicketFormRequest $request, $slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $ticket->title = $request->get('title');
        $ticket->content = $request->get('content');
        if($request->get('status') != null){
            $ticket->status = 0;
        }
        else{
            $ticket->status = 1;
        }
        $ticket->save();
        return redirect(route('ticket.edit', $ticket->slug))->with('status', 'The ticket '.$slug.' has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $ticket->delete();
        return redirect(route('home'))->with('status', 'The ticket '.$slug.' is deleted.');
    }
}
