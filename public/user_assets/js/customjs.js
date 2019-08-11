/*-------------------------------
    AJAX INDEX SEARCH
-------------------------------- */
$('#schoolname').keyup(function() {
    var query = $(this).val();
    if (query != '') {
        var _token = $('input[name= "_token"]').val();

        $.ajax ({
            url: "home/search",
            method: "POST",
            data: {query:query, _token:_token},
            success:function(data) {
                // console.log(data);
                $('#schoolList').fadeIn();
                $('#schoolList').html(data);
            }
        })
    }
});

$(document).on('click', '#list li', function() {
    $('#schoolname').val($(this).text());
    $('#schoolList').fadeOut();
});
// end of Ajax

/*-------------------------------
AJAX PAID STATUS FUNCTION
-------------------------------- */
function ajaxPaid(invoiceid, trxref) {
    //ajax
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '/invoice/pay',
        data: { invoiceid:invoiceid, trxref:trxref },
        success: function (data) {
        // console.log(data);
        if (data == 400) {
            window.location = '/invoice/failed'
        } else {
            window.location = '/invoice/success/' + data
        }
        }
    });
}
// end of Ajax paid status
// end container function for user dashboard

/*----------------------------------
SCHOOL DASHBOARD SECTION
----------------------------------- */
//add or remove textbox dynamically
$("#setupModal").on('shown.bs.modal', function () {

    var counter = 2;

    $("#addButton").click(function () {

        var newTextBoxDiv = $(document.createElement('div'))
            .attr("id", 'TextBoxDiv' + counter);

        newTextBoxDiv.after().html(
            '<div class="row" id="TextBoxDiv' + counter + '"><div class="col-md-8"><input type="text" class="form-control" name="description[]" placeholder="Eg: Tuition Payment, PTA Levy etc"></div><div class="col-md-4"><div class="form-group"><input type="text" class="form-control" name="amount[]" placeholder="3000"></div></div>'
        );

        newTextBoxDiv.appendTo("#TextBoxesGroup");

        counter++;
    });

    $("#removeButton").click(function () {
        if (counter > 2) {
            counter--;
            $("#TextBoxDiv" + counter).remove();
        }
    });
});

//add dynamic textboxes for setup fees
$("#addModal").on('shown.bs.modal', function () {

    var counter = 2;

    $("#addButton").click(function () {

        var newTextBoxDiv = $(document.createElement('div'))
            .attr("id", 'TextBoxDiv' + counter);

        newTextBoxDiv.after().html(
            '<div id="TextBoxDiv' + counter + '"><div class="col-md-8"><div class= "form-group"><input type="text" class="form-control" name="description[]" placeholder="Eg: Tuition Payment, PTA Levy etc"></div></div><div class="col-md-4"><div class="form-group"><input type="text" class="form-control" name="amount[]" placeholder="3000"></div></div></div>'
        );

        newTextBoxDiv.appendTo("#TextBoxesGroup");

        counter++;
    });

    $("#removeButton").click(function () {
        if (counter > 2) {
            counter--;
            $("#TextBoxDiv" + counter).remove();
        }
    });
});

//add dynamic textboxes for fees collected by school
$("#feetypeModal").on('shown.bs.modal', function () {

    var counter = 2;

    $("#addButtonx").click(function () {

        var newTextBoxDiv = $(document.createElement('div'))
            .attr("id", 'TextBoxDivx' + counter);

        newTextBoxDiv.after().html(
            '<div id="TextBoxDivx' + counter + '"><div class= "form-group"><input type="text" class="form-control" name="feetype[]" placeholder="Eg: School Fees"></div></div>'
        );

        newTextBoxDiv.appendTo("#TextBoxesGroupx");

        counter++;
    });

    $("#removeButtonx").click(function () {
        if (counter > 2) {
            counter--;
            $("#TextBoxDivx" + counter).remove();
        }
    });
});

//flipping a div like a page
$("#flipdiv").flip({
    trigger: 'manual'
});

function flipFunction() {
    $("#flipdiv").flip('toggle');
}

/** ajax function to fill the account name from the provided
bank details using Paystack API
*/
$('#loader').hide();//hide the loader
$('#acctno').keyup(function () {
    var acctno = $(this).val();
    var bankcode = $('#bank').val();

    // var data = {'Account Number' : acctno, 'Bank Code' : bankcode};

    if (acctno != '' && bankcode != '') {
        if ((acctno.toString().length) == 10) {
        var _token = $('input[name= "_token"]').val();

        $.ajax({
            url: "/paystack/get_acctname",
            method: "POST",
            data: { acctno: acctno, bankcode: bankcode, _token: _token },
            beforeSend: function () {
                // $('#loader').html('');
                // var gif = "<img width='auto' height='50' src=\"{{asset('dashboard/assets/images/loader1.gif')}}\" >";
                // $('#loader').html(gif);
                $('#loader').show();
            },
            success: function (data) {
                // console.log(data);
                $('#acctname').val('');
                $('#acctname').val(data.account_name);
                $('#loader').hide();
            }
        })
        }
    }
});

/**
 * Settings Page
 * hide all section and show section when it is clicked
 */
$('#edit-profile').show();
$('#edit-profile-button').addClass('settings-button');
$('#change-password, #fees-collected, #how-it-works').hide();

function showSettings(section) {

    if (section == 'edit-profile') {
        // hide to show
        $('#edit-profile').show();
        $('#change-password, #fees-collected, #how-it-works').hide();

        // add or remove class
        $('#edit-profile-button').addClass('settings-button');
        $('#change-password-button, #fees-collected-button, #how-it-works-button').removeClass('settings-button');

    } else if (section == 'change-password') {
        // hide to show
        $('#change-password').show();
        $('#edit-profile, #fees-collected, #how-it-works').hide();

        // add or remove class
        $('#change-password-button').addClass('settings-button');
        $('#edit-profile-button, #fees-collected-button, #how-it-works-button').removeClass('settings-button');

    } else if (section == 'fees-collected') {
        // hide to show
        $('#fees-collected').show();
        $('#change-password, #edit-profile, #how-it-works').hide();

        // add or remove class
        $('#fees-collected-button').addClass('settings-button');
        $('#change-password-button, #edit-profile-button, #how-it-works-button').removeClass('settings-button');

    } else if (section == 'how-it-works') {
        // hide to show
        $('#how-it-works').show();
        $('#change-password, #fees-collected, #edit-profile').hide();

        // add or remove class
        $('#how-it-works-button').addClass('settings-button');
        $('#change-password-button, #fees-collected-button, #edit-profile-button').removeClass('settings-button');

    }
}
