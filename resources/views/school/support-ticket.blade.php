@extends('layouts.dash')

@section('content')
    <!-- start with the real content -->
    <div id="real">
      <!-- start content here -->
      <div class="wrap card" id="support">
        <!-- CONTENT -->
        <section class="app-content">

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-color panel-dark" style="min-height: 500px;">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#supportModal">Request Support</button>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">                                        
                                    @if(count($tickets) > 0)
                                        <div class="text-center">
                                            {{$tickets->links()}}
                                        </div>
                                        <div class="timeline">
                                            <article class="timeline-item alt">
                                                <div class="text-right">
                                                    <div class="time-show first">
                                                        <a href="#" class="btn btn-custom">Conversations</a>
                                                    </div>
                                                </div>
                                            </article>
                                            @foreach ($tickets as $ticket)
                                                <article class="timeline-item alt">
                                                    <div class="timeline-desk">
                                                        <div class="panel">
                                                            <div class="timeline-box">
                                                                <span class="arrow-alt"></span>
                                                                <span class="timeline-icon"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span>
                                                                <h4 class="">{{date("jS F, Y", strtotime($ticket->created_at))}}</h4>
                                                                <p class="timeline-date text-muted"><small>{{date("h:i A", strtotime($ticket->created_at))}}</small></p>
                                                                <p><b>{{strtoupper($ticket->subject)}}</b></p>
                                                                <p>{{$ticket->body}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                                @foreach ($ticket->supportreply as $reply)
                                                    <article class="timeline-item ">
                                                        <div class="timeline-desk">
                                                            <div class="panel">
                                                                <div class="timeline-box">
                                                                    <span class="arrow"></span>
                                                                    <span class="timeline-icon bg-success"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span>
                                                                    <h4 class="text-success">{{date("jS F, Y", strtotime($reply->created_at))}}</h4>
                                                                    <p class="timeline-date text-muted"><small>{{date("h:i A", strtotime($reply->created_at))}}</small></p>
                                                                    <p>{{$reply->body}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                @endforeach
                                            @endforeach
                                        </div>
                                        <div class="text-center">
                                            {{$tickets->links()}}
                                        </div>
                                    @else
                                        <div class="col-md-12">
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
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- Modal -->
            <div id="supportModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Support Message</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ action('SupportTicketController@store') }}" method="post">
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
                                        <option value="Financial">FINANACIAL</option>
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