@extends('layouts.dash')

@section('content')

    <!-- start with the real content -->
    <div id="real">
        <!-- start content here -->
        <div class="wrap card" id="support">
            <!-- CONTENT -->
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Available Funds -->
                        <div class="regsterUsers">
                            <div class="card">
                                <div class="card-top">
                                    <h1>&#8358; {{ number_format($wallet) }}</h1>
                                </div>
                                <div class="card-bottom">
                                    <p><i class="fa fa-wallet"></i> Available Funds <button class="btn btn-secondary float-right" type="button" data-toggle="modal" data-target="#withdrawModal">Withdraw</button></p>
                                </div>
                            </div>
                        </div>
                        <!-- end Available Funds -->
                    </div>

                    <div class="col-sm-12">
                        @if(count($history) > 0)
                            <table id="datatable-buttons" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Reference</th>
                                        <th>Amount</th>
                                        <th>Fee</th>
                                        <th>Balance Before</th>
                                        <th>Balance After</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($history as $data)
                                        <tr>
                                            <td>#{{$data->reference}}</td>
                                            <td>&#8358;{{$data->amount}}</td>
                                            <td>&#8358;{{$data->skooleo_fee}}</td>
                                            <td>&#8358;{{$data->balance_before}}</td>
                                            <td>&#8358;{{$data->balance_after}}</td>
                                            <td>
                                                @php
                                                    if ($data->status === "PENDING") {
                                                        echo "<button class='btn btn-sm btn-warning'>". $data->status ."</button>";
                                                    } else if ($data->status === "FAILED") {
                                                        echo "<button class='btn btn-sm btn-danger' data-toggle='popover' data-content='". $data->message ."'>". $data->status ."</button>";
                                                    } else if ($data->status === "SUCCESSFUL") {
                                                        echo "<button class='btn btn-sm btn-success'>SUCCESS</button>";
                                                    }
                                                @endphp
                                            </td>
                                            <td>{{date("d-M-Y", strtotime($data->created_at))}}</td>
                                            {{-- <td>{{ $data->created_at->diffForHumans() }}</td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <br><br>
                            <div class="alert alert-info">
                                <strong>Info!</strong> No withdrawal made yet.
                            </div>
                        @endif
                        <br><br>
                        {{-- <div class="float-right">{{ $history->links() }}</div> --}}
                    </div>
                </div>
                <!-- end row -->

            </section>
        </div>
    </div>



@endsection
