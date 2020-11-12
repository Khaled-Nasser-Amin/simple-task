<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TicketController extends Controller
{
    public function __construct(){
         $this->middleware('permission:tickets-create')->only('create');
         $this->middleware('permission:tickets-read')->only('index');
         $this->middleware('permission:tickets-update')->only('edit');
         $this->middleware('permission:tickets-delete')->only('destroy');
         $this->middleware('CheckTicket')->only(['update','destroy','edit','']);
    }

    public function index(Request $request)
    {
        $tickets=Ticket::where('id','!=',auth()->user()->id)->latest()->paginate(10);
        return view('tickets.index',compact('tickets'));
    }


    public function create()
    {
        return view('tickets.create');

    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required' , Rule::unique('tickets')],
            'ex_date' => 'required|date|dateFormat:Y-m-d|after:yesterday',
        ]);

        $ticket=Ticket::create($request->all());
        auth()->user()->ticket()->save($ticket);
        session()->flash('success','Created Successfully');
        return redirect()->route('tickets.index');
    }


    public function edit($id)
    {
        $ticket=Ticket::find($id);
        return view('tickets.update',compact('ticket'));

    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => ['required' , Rule::unique('tickets')->ignore($id)],
            'ex_date' => 'required|date|dateFormat:Y-m-d|after:yesterday',
        ]);
        $ticket=Ticket::find($id);
        $ticket->update($request->all());
        session()->flash('success','Updated Successfully');
        return redirect()->route('tickets.index');
    }


    public function destroy($id)
    {
        $ticket=Ticket::find($id);
        $ticket->delete();
        session()->flash('success','Deleted Successfully');
        return  redirect()->route('tickets.index');
    }
}
