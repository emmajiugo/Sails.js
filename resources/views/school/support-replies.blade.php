@extends('layouts.dash')

@section('content')
    <!-- start with the real content -->
    <div id="real">
      <!-- start content here -->
      <div class="wrap card" id="support">
        <!-- CONTENT -->
        <section class="app-content">

            <div class="row" style="min-height:500px">
                <div class="col-md-12">
                    <h4>
                        <u><b>{{ $ticket->subject }}</b></u>
                        <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#replyModal">Send Reply</button>
                    </h4>
                    <br>
                    <hr>
                    <br>
                </div>

                {{-- follow up replies --}}
                @foreach ($ticket->supportreplies()->orderBy('created_at', 'desc')->get() as $reply)
                    <div class="{{ $reply->reply_type=='user' ? 'col-md-10' : 'offset-2 col-md-10' }}">
                        <div class="card">
                            <div class="card-container">
                                {!! nl2br($reply->body) !!}
                                <br><br>
                                <small><b>Date:</b> {{ date("jS F, Y | h:i A", strtotime($reply->created_at)) }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- main message --}}
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-container">
                            {!! nl2br($ticket->body) !!}
                            <br><br>
                            <small><b>Date:</b> {{ date("jS F, Y | h:i A", strtotime($ticket->created_at)) }}</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div id="replyModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Reply Message</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('school.reply.post', $ticket->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="msg_hash" value="{{ $ticket->msg_hash }}">
                                <label for="">Reply Message</label>
                                <textarea name="reply_body" class="form-control" cols="30" rows="10" placeholder="Write your reply here..."></textarea>
                                <br>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-block">Reply</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </section>
      </div>
    </div>

@endsection
