@extends('layouts.front.business')
@section('title')
Event
@endsection
@section('content')
<div class="row bg-gray  section-custome">
    <div class="col-md-12 mx-auto  ">
        <!-- *********************** tab menu start here *************************************** -->
        <ul class="nav nav-tabs" role="tablist" id="myTab">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tab-home-1"><strong>Bounty <i class="fa fa-calendar"></i></strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab-profile-1"><strong>Bounty <i class="fa fa-usd"></i></strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab-contact-1" onclick="call()"><strong>

                      <span class="circle">1</span> Notification <i class="fa fa-bell"></i></strong></a>
                </li>
            </ul>
        <!-- ********************************tab menu end here*************************************** -->
        <div class="tab-content p-4">
            <!-- **********************tab1 content start here********************************************* -->
            <div class="tab-pane fade show active" id="tab-home-1">
                @include('front.business.event.bar.bounty')
            </div>
            <!-- ************************tab1 content end here ********************************************* -->
            <div class="tab-pane fade" id="tab-profile-1"></div>
            <div class="row">
            </div>
            <div class="tab-pane fade" id="tab-contact-1">
                 @include('front.business.event.bar.notification')
            </div>
        </div>
    </div>
</div>
@endsection
@section('header')
<header class="header mt-0 pt-0">
</header>
@endsection
@section('css')
<style type="text/css">
.navbar {
    top: 0;
    background-color: #fafbfb;
}

.row {
    margin-top: 60px;
}

.nav-tabs .nav-item:hover {
    background-color: #cacaca;
}

.nav-link {
    color: #000000;
    font-weight: 500;
}

input[type=text],
[type=file],
textarea,
select {
    border-radius: 5px;
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #E5E5E5;

    box-shadow: 0 0 10px #E8E8E8 inset;
}

.myButton {
    box-shadow: 0px 1px 0px 0px #f0f7fa;
    background: linear-gradient(to bottom, #33bdef 5%, #019ad2 100%);
    background-color: #33bdef;
    border-radius: 6px;
    border: 1px solid #057fd0;
    display: inline-block;
    cursor: pointer;
    color: #ffffff;
    font-family: Arial;
    font-size: 15px;
    font-weight: bold;
    padding: 6px 24px;
    text-decoration: none;
    text-shadow: 0px -1px 0px #5b6178;
    width: 80%;
}

.myButton:hover {
    background: linear-gradient(to bottom, #019ad2 5%, #33bdef 100%);
    background-color: #019ad2;
}

.myButton:active {
    position: relative;
    top: 1px;
}

.navbar {
    top: 0;
    background-color: black;
}

.section-custome {
    padding-top: 0px;
}

.row {
    margin-top: 0;
}

.header {
    padding-bottom: 67px;
}

.circle {

    border-radius: 80%;
    font-size: 15px;
    color: #fff;
    line-height: 8px;
    padding-left: 4px;
    padding-right: 4px;

    background: red;
}

</style>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>

$(function() {
    if (localStorage.getItem('dropdown')) {
        $("#dropdown option").eq(localStorage.getItem('dropdown')).prop('selected', true);
    }

    $("#dropdown").on('change', function() {
        localStorage.setItem('dropdown', $('option:selected', this).index());
    });
});




$(document).ready(function() {

    $('.box').hide();
    // First Way :

    $('#HiddenInput').empty();
    $('#HiddenInput').val($('#dropdown').val());
    var value = $('#HiddenInput').val();
    $('#dropdown').val(value);
    $('#div' + value).show();


    $('#dropdown').change(function() {
        $('.box').hide();
        $('#HiddenInput').val($(this).val());
        $('#div' + $(this).val()).show();
    });
});


// <!-- ----------tab menu  script start------------------->
$(document).ready(function() {
    
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
});

function call() {
  
}
// ----------------------tab menu ennd here--------------------


// --------------------date picker start here-------------------

flatpickr('#deadline', { enableTime: true })

// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.tags-selector').select2();
});
// -----------------------date picker end here-----------------------

</script>
@endsection
