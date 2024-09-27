<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticket_list = Ticket::where('customer_id', Auth::guard('customer')->user()->id)->get();
        return view('ticket.ticket_list', compact('ticket_list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_info = Auth::user();
        return view('ticket.issue_ticket', compact('user_info'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id'      => 'required',
            'customer_name'    => 'required',
            'subject'          => 'required',
            'description'      => 'required',
            'priority_level'   => 'required|in:Low,Medium,High',
            'attachment'       => 'image|mimes:jpg,png,gif,bmp,pdf|max:2048',
        ]);

        try {
            $ticket = new Ticket();
            $ticket->customer_id    = $request->customer_id; //take from hidden field
            $ticket->customer_name  = $request->customer_name; //take from hidden field
            $ticket->subject        = $request->subject;
            $ticket->description    = $request->description;
            $ticket->priority_level = $request->priority_level;
            $ticket->status         = 1;
            $ticket->resolved_at    = null;

            if ($request->hasFile('attachment')) {
                $ticketAttachment = $this->imageUpload($request, 'attachment', 'uploads/tickets');

                if ($ticketAttachment) {
                    $ticket->attachment = $ticketAttachment;
                } else {
                    throw new \Exception('Attachment upload failed');
                }
            }

            $ticket->save();

            $subject = 'Subject: ' . $request->subject;
            $customer_email = $request->customer_email;
            $customer_name = $request->customer_name;
            $body = 'Customer ID: ' . $request->customer_id . "\n" .
                'Customer Name: ' . $request->customer_name . "\n" .
                'Subject: ' . $request->subject . "\n" .
                'Description: ' . $request->description . "\n" .
                'Priority Level: ' . $request->priority_level . "\n";

            // Send the email
            Mail::raw($body, function ($message) use ($subject, $customer_email, $customer_name) {
                $message->to('admin@gmail.com')
                    ->subject($subject)
                    ->from($customer_email, $customer_name);
            });
            Session::flash('success', 'Ticket Issued Successfully');
            return back();
        } catch (\Throwable $th) {
            Session::flash('errors', 'Something Went Wrong!');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        $update_data = Ticket::findOrFail($ticket['id']);
        return view('ticket.update_ticket', compact('update_data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'customer_id'      => 'required',
            'customer_name'    => 'required',
            'subject'          => 'required',
            'description'      => 'required',
            'priority_level'   => 'required|in:Low,Medium,High',
            'attachment'       => 'image|mimes:jpg,png,gif,bmp,pdf|max:2048',
        ]);
        try {

            $ticket->customer_id    = $request->customer_id; //take from hidden field
            $ticket->customer_name  = $request->customer_name; //take from hidden field
            $ticket->subject        = $request->subject;
            $ticket->description    = $request->description;
            $ticket->priority_level = $request->priority_level;
            $ticket->status         = 1;
            $ticket->resolved_at    = null;

            $ticket_file = Ticket::where('customer_id', Auth::guard('customer')->user()->id)->first();
            $ticketAttachment = '';
            if ($request->hasFile('attachment')) {
                if (!empty($ticket_file['attachment']) && file_exists($ticket_file['attachment'])) {
                    unlink($ticket_file['attachment']);
                }
                $ticketAttachment = $this->imageUpload($request, 'attachment', 'uploads/tickets');
            } else {
                $ticketAttachment = $ticket_file['attachment'];
            }
            $ticket->attachment = $ticketAttachment;

            $ticket->save();
            Session::flash('success', ' Ticket updated Successfully');
            return redirect()->route('ticket.list');
        } catch (\Throwable $th) {
            Session::flash('errors', 'Something Went Wrong!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        if (Auth::guard('customer')->check()) {
            Ticket::find($ticket['id'])->delete();
            return back()->with('success', 'Successfully Close the Ticket!');
        } else {
            return back()->with('error', 'Unauthorized action.');
        }
    }
}
