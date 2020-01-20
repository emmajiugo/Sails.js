@extends('layouts.dash')

@section('content')

  <!-- start with the real content -->
  <div id="real">
    <div class="row">

      <!-- start user -->
      <div class="col-lg-6">

        <!-- Regster Users -->
        <div class="regsterUsers">
          <div class="card">
            <div class="card-top">
              <h1>Over 3500</h1>
              <i class="fa fa-building"></i>
            </div>
            <div class="card-bottom">
              <p>Schools are registered and verified</p>
              <small>Couldn't find your child's school?! Tell the principal about us to make life easy for yourself.</small>
            </div>
          </div>
        </div>
        <!-- end  Regster Users-->

        <div class="users">
          <div class="card">
            <h1 class="head">Search School</h1>
            <br>

            <div class="">
              <form action="{{ route('user.search.post') }}" method="POST" autocomplete="off">
                @csrf
                <div class="input-group">
                  <input type="text" class="form-control" list="schoolList" id="schoolname" name="schoolname" placeholder="Search school by name" autofocus>
                  <div class="input-group-btn">
                    <button class="btn btn-primary" type="submit">
                      Search
                    </button>
                  </div>
                </div>
              </form>

              <datalist id="schoolList"></datalist>

            </div>

            <br>

            <div class="user">

              <a href="button" class="btn mw-md btn-success btn-block" data-toggle="modal" data-target="#invoiceModal">I Have Unpaid Invoice</a>

            </div>

          </div>
        </div>
      </div>
      <!-- end user -->
      <!-- start user -->
      <div class="col-lg-6">
        <div class="users">
          <div class="card">
            <h1 class="head">Latest Transactions</h1>
            <div class="user">
              <!-- <div class="uImg"><img src="img/act/5.jpg" alt=""></div> -->
              <div class="info">
                <h1>Josephine Walker</h1>
                <p>Apple Iwork 08 Review</p>
              </div>
              <div class="type">
                <div class="btn btn-primary">read</div>
              </div>
            </div>
            <div class="user">
              <!-- <div class="uImg"><img src="img/act/6.jpg" alt=""></div> -->
              <div class="info">
                <h1>Josephine Walker</h1>
                <p>Apple Iwork 08 Review</p>
              </div>
              <div class="type">
                <div class="btn btn-primary">read</div>
              </div>
            </div>
            <div class="user">
              <!-- <div class="uImg"><img src="img/act/7.jpg" alt=""></div> -->
              <div class="info">
                <h1>Josephine Walker</h1>
                <p>Apple Iwork 08 Review</p>
              </div>
              <div class="type">
                <div class="btn btn-primary">read</div>
              </div>
            </div>
            <div class="user">
              <!-- <div class="uImg"><img src="img/act/8.jpg" alt=""></div> -->
              <div class="info">
                <h1>Josephine Walker</h1>
                <p>Apple Iwork 08 Review</p>
              </div>
              <div class="type">
                <div class="btn btn-primary">read</div>
              </div>
            </div>
            <div class="user">
              <!-- <div class="uImg"><img src="img/act/8.jpg" alt=""></div> -->
              <div class="info">
                <h1>Josephine Walker</h1>
                <p>Apple Iwork 08 Review</p>
              </div>
              <div class="type">
                <div class="btn btn-primary">read</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end user -->

    </div>
  </div>
  <!-- end the real content -->

  <!-- Invoice Modal -->
  <div class="modal fade" id="invoiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Enter Invoice No.</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form action="/school/index-invoice" method="POST">
                  @csrf
                  <div class="input-group">
                      <div class="input-group-btn">
                        <button class="btn btn-primary">
                          #
                        </button>
                      </div>
                      <input type="text" name="invoiceno" class="form-control" placeholder="123456">
                  </div>

                  <br>

                  <div class="form-group">
                      <input type="submit" class="btn btn-success btn-block" value="Get Invoice">
                  </div>
              </form>
          </div>
          <!-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
          </div> -->
      </div>
    </div>
  </div>

@endsection
