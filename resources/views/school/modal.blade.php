
<!-- Switch Account Modal -->
<div id="switchModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                @if(count($schools) > 0)
                    @foreach ($schools as $school)
                        <div class="row" style="border-bottom:solid #d6d6d6 1px; padding: 15px 0 15px 0;">
                            <div class="col-sm-9"><strong>{{ $school->schoolname }}</strong></div>
                            <div class="col-sm-3">
                                <form action="{{ route('school.account.switch') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="schooldetailsid" value="{{ $school->id }}">
                                    <input type="hidden" name="accountid" value="{{ $school->school_id }}">
                                    <input type="submit" class="btn btn-sm {{ $school->is_used==1 ? 'btn-success':'btn-info' }}" value="{{ $school->is_used==1 ? 'Active':'Switch' }}">
                                </form>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-center">
                        <br>
                        <button class="btn btn-info" data-toggle="modal" data-target="#newAccountModal">Create new account</button>
                    </div>
                @else
                    <div class="text-center">
                        <div class="col-lg-12 alert alert-warning text-center">
                            <strong>No account have been created!</strong>
                        </div>
                        <button class="btn btn-info" data-toggle="modal" data-target="#newAccountModal">Create an account</button>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
<!-- end task card -->

<!-- Add New Account Modal -->
<div id="newAccountModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New School Account</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('school.account.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <h5><u>School Details</u></h5>
                    <br>

                    <div class="form-group">
                        <input id="schoolname" type="text" placeholder="School Name *" class="form-control {{ $errors->has('schoolname') ? ' is-invalid' : '' }}" name="schoolname" value="{{ old('schoolname') }}" required>

                        @if ($errors->has('schoolname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('schoolname') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="schooladdr" type="text" placeholder="School Address *" class="form-control {{ $errors->has('schooladdr') ? ' is-invalid' : '' }}" name="schooladdr" value="{{ old('schooladdr') }}" required>

                        @if ($errors->has('schooladdr'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('schooladdr') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="schoolphone" type="number" placeholder="School Phone *" class="form-control {{ $errors->has('schoolphone') ? ' is-invalid' : '' }}" name="schoolphone" value="{{ old('schoolphone') }}" required>

                        @if ($errors->has('schoolphone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('schoolphone') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="schoolemail" type="email" placeholder="School Email *" class="form-control {{ $errors->has('schoolemail') ? ' is-invalid' : '' }}" name="schoolemail" value="{{ old('schoolemail') }}" required>

                        @if ($errors->has('schoolemail'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('schoolemail') }}</strong>
                            </span>
                        @endif
                    </div>
                    <hr>

                    <h5><u>Registrant's Details</u></h5>
                    <br>

                    <div class="form-group">
                        <input id="registeredby" type="text" placeholder="Registrant's Name *" class="form-control {{ $errors->has('registeredby') ? ' is-invalid' : '' }}" name="registeredby" value="{{ old('registeredby') }}" required>

                        @if ($errors->has('registeredby'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('registeredby') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <select name="registrarstatus" id="registrarstatus" class="form-control ">
                            <option value="Owner/Proprietor"> Proprietor or Owner</option>
                            <option value="Headmaster/Principal"> Headmaster or Principal</option>
                            <option value="Account Officer"> School Account Officer</option>
                        </select>
                    </div>
                    <hr>

                    <h5><u>Corporate Account</u></h5>
                    <br>

                    <div class="form-group">
                        <label for="bank name">Select Bank</label>
                        <select id="bank" name="bankname" class="form-control">
                            <option value="">-- select bank --</option>
                            @if (count($banknames) > 0)
                                @foreach ($banknames as $bankname)
                                    <option value="{{$bankname['code']}}">{{$bankname['name']}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="account number">Account Number</label>
                        <input type="text" class="form-control" id="acctno" name="acctno" placeholder="0023976543">
                    </div>

                    <div class="form-group">
                        <label for="account name">Account Name</label>
                        <input type="text" class="form-control" id="acctname" name="acctname" placeholder="Account Name" readonly>
                        <div id="loader"><img width='35px' height='35px' src="{{asset('user_assets/img/loader1.gif')}}" ></div>
                    </div>

                    <hr>
                    <div class="form-group">
                        <label for="">Upload Govt. Approved Document (Image Only)</label><br>
                        <small>(eg. CAC Document or Ministry of Education Document. Max-Size: 2MB)</small>
                        <input type="file" class="form-control" name="govtdoc">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- Withdrawal modal -->
<div id="withdrawModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Withdrawal</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('wallet.withdraw') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="amount-to-withdraw">Amount</label>
                        <input type="number" id="withdraw-amount" name="amount" class="form-control" min="0" oninput="this.value = Math.abs(this.value)" required>
                    </div>

                    <br>
                    <b class="text-success">Withdrawal Fee: </b> &#8358;{{ \App\WebSettings::find(1)->withdrawal_fee }} <br>
                    <b>NB:</b> Settlement will be made to the account provided to us.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="withdraw-btn" class="btn btn-primary">Proceed</button>
                <img src="{{ asset('user_assets/img/loader1.gif') }}" class="withdraw-loader" alt="Loader">
                </form>
            </div>
        </div>

    </div>
</div>
