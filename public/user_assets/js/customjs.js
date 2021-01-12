/*-------------------------------
    AJAX INDEX SEARCH
-------------------------------- */
$('#schoolname').keyup(function() {
    var query = $(this).val();
    if (query != '') {
        var _token = $('input[name= "_token"]').val();

        $.ajax ({
            url: "home/ajax-search",
            method: "POST",
            data: {query:query, _token:_token},
            success:function(data) {
                console.log(data);
                $('#schoolList').fadeIn();
                $('#schoolList').html(data);
            }
        })
    }
});

//select2 ajax select
$(".search-for-school").select2({
    theme: "bootstrap",
    placeholder: 'Search for school',
    minimumInputLength: 3,
    ajax: {
        dataType: 'json',
        url: '/home/list-schools',
        delay: 250,
        data: function(params) {
            return {
                school: params.term
            }
        },
        processResults: function (data) {
            // console.log(data);
            return {
                results: data
            };
        },
    }
});


/*----------------------------------
SCHOOL DASHBOARD SECTION
----------------------------------- */
$(document).ready(function () {
    $('[data-toggle="popover"]').popover();
});

//withdrawal button
$("#withdraw-btn").on("click", function () {

    var amount = $("#withdraw-amount").val();

    if (amount != "") {
        $("#withdraw-btn").hide();
        $(".withdraw-loader").addClass('withdraw-loader-display');
    }

});

//pay-now button
$("#pay-now").on("click", function () {

    $("#pay-now").hide();
    $(".withdraw-loader").addClass('withdraw-loader-display');

});

//add or remove textbox dynamically
$("#setupModal").on('shown.bs.modal', function () {

    var counter = 2;

    $("#addButton").on("click", function () {

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

    $("#addButton").on("click", function () {

        var newTextBoxDiv = $(document.createElement('div'))
            .attr("id", 'TextBoxDiv' + counter);

        newTextBoxDiv.after().html(
            '<div id="TextBoxDiv' + counter + '"><div class="col-md-8"><div class="form-group"><input type="text" class="form-control" name="description[]" placeholder="Eg: Tuition Payment, PTA Levy etc"></div></div><div class="col-md-4"><div class="form-group"><input type="text" class="form-control" name="amount[]" placeholder="3000"></div></div></div>'
        );

        newTextBoxDiv.appendTo("#TextBoxesGroup");

        counter++;
    });

    $("#removeButton").on("click", function () {
        if (counter > 2) {
            counter--;
            $("#TextBoxDiv" + counter).remove();
        }
    });
});

//add dynamic textboxes for fees collected by school
$("#feetypeModal").on('shown.bs.modal', function () {

    var counter = 2;

    $("#addButtonx").on("click", function () {

        var newTextBoxDiv = $(document.createElement('div'))
            .attr("id", 'TextBoxDivx' + counter);

        newTextBoxDiv.after().html(
            '<div id="TextBoxDivx' + counter + '"><div class="form-group"><input type="text" class="form-control" name="feetype[]" placeholder="Eg: School Fees"></div></div>'
        );

        newTextBoxDiv.appendTo("#TextBoxesGroupx");

        counter++;
    });

    $("#removeButtonx").on("click", function () {
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

/**
 * ajax function to fill the account name from the providedbank details using Paystack API
*/
$('#loader').hide();//hide the loader
$('#acctno').on("keyup", function () {
    var acctno = $(this).val();
    var bankcode = $('#bank').val();

    $('#bankname').val($('#bank').find('option:selected').text());

    var data = {'Account Number' : acctno, 'Bank Code' : bankcode};

    if (acctno != '' && bankcode != '') {
        if ((acctno.toString().length) == 10) {
            var _token = $('input[name= "_token"]').val();

            // console.log(data)

            $.ajax({
                url: "/gateway/resolve-account",
                method: "POST",
                data: { acctno: acctno, bankcode: bankcode, _token: _token },
                beforeSend: function () {
                    $('#loader').show();
                }
            }).done(function (data) {
                // console.log(data);
                if (data.data != null) $('#acctname').val('').val(data.data.account_name);
                $('#account-fetched').text('').text(data.message);
                $('#loader').hide();
            }).fail(function (res) {
                console.log(res);
            });
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

    } else if (section == 'settlement-account') {
        // hide to show
        $('#settlement-account').show();
        $('#change-password, #edit-profile, #how-it-works').hide();

        // add or remove class
        $('#settlement-account-button').addClass('settings-button');
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

//dataTable script
$('#transactions').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'csv', 'excel'
    ],
    autoWidth: true,
    columnDefs: [
        {
            targets: ['_all'],
            className: 'mdc-data-table__cell'
        },
    ],
    "order": false,
    "pageLength": 50
});
