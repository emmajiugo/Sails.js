@extends('layouts.dash')

@section('content')
    <!-- start with the real content -->
    <div id="real">
      <!-- start content here -->
      <div class="wrap card" id="support">
        <!-- CONTENT -->
        <section class="app-content">

            <div class="row">
                <div class="col-lg-12" style="min-height:500px">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#supportModal">Request Support</button>
                            <br><br>
                        </div>
                    </div>

                    <div class="row">
                        @if(count($tickets) > 0)
                            <div class="col-sm-12 support-tickets-list table-responsive">

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Support Ticket</th>
                                            <th>Date</th>
                                            <th>Replies</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($tickets as $ticket)

                                            <tr>
                                                <td>{{ strtoupper($ticket->subject) }}</td>
                                                <td><small>{{ date("jS F, Y h:i A", strtotime($ticket->created_at)) }}</small></td>
                                                <td><span class="badge badge-success"> {{ count($ticket->supportreplies) }} </span></td>
                                                <td>
                                                    <a href="{{ route('school.ticket.show', $ticket->msg_hash) }}" class="btn btn-sm btn-primary">View</a>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-2 offset-md-5 text-center">
                                <br><br>
                                {{ $tickets->links() }}
                            </div>
                        @else
                            <div class="col-md-12 text-center">
                                {{-- <img src="{{asset('user_assets/img/support.png') }}" class="img-responsive" height="100" width="auto" alt="Support Ticket"> --}}
                                <br><br>
                                <div class="alert alert-icon alert-info" role="alert">
                                    <i class="mdi mdi-information"></i>
                                    <strong>Heads up!</strong> No support ticket created yet.
                                </div>

                                <div class="text-center">
                                    <br><br>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#supportModal">Request Support</button>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- end row -->

                </div>
            </div>
            <!-- end row -->

            <!-- Modal -->
            <div id="supportModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Support Message</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('school.support.post') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Subject</label>
                                    <input type="text" class="form-control" name="subject" placeholder="Enter Subject">
                                </div>
                                <div class="form-group">
                                    <label for="">Select Department</label>
                                    <select name="department" class="form-control">
                                        <option value="">-- select department --</option>
                                        <option value="Inquiry">INQUIRY</option>
                                        <option value="Financial">FINANCIAL</option>
                                        <option value="Support">SUPPORT</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Message</label>
                                    <textarea class="form-control" name="supportbody" rows="10" placeholder="Enter Message"></textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </section>
      </div>
    </div>

@endsection
