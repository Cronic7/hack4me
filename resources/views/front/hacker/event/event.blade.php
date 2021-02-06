@extends('layouts.front.nav2')
@section('title')
Event and bounty


@endsection
@section('content')
<main class="main-content">
    <div class="row bg-gray">
        <div class="col-md-12 ">
            <ul class="nav nav-tabs" role="tablist" id="myTab">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tab-home-1"><strong>Event <i class="fa fa-calendar"></i></strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab-profile-1"><strong>Bounty <i class="fa fa-usd"></i></strong></a>
                </li>
                <li class="nav-item">
                       <input type="hidden" id="user_id"  value="{{Auth::user()->userhacker->id}}">
                    <a class="nav-link" data-toggle="tab" href="#tab-contact-1" onclick="call()">
                          <span id="count"> @if($my_notification>0) <span class="circle">{{$my_notification}}</span> @endif</span> Notification <i class="fa fa-bell"></i></strong></a>
                    </a>
                </li>
            </ul>
            <div class="tab-content p-4">
                <div class="tab-pane fade show active" id="tab-home-1">
                    @include('front.hacker.event.tab.event-tab')
                </div>
                <!-- ----------------------------second tab  bounty tab start here------------------------------------       -->
                <div class="tab-pane fade" id="tab-profile-1">
                    @include('front.hacker.event.tab.bounty-tab')
                </div>
                <!-- --------------------------------------------second tab bounty tab ends here-------------------------->
                <!---------------------------------- third tab ----------------------------------------->
                <div class="tab-pane fade" id="tab-contact-1">
                    @include('front.hacker.event.tab.notification')
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('header')
<header class="header text-white  pb-0  " style="top:0">
</header>
@endsection
@section('css')
<style type="text/css">
.bg {
    background-color: white;
    box-shadow: 0 0 5px;
}

.header {
    padding-top: 67px;
}

.section-header u {
    color: red;
}

.profile {
    border-top: 1px solid;
    border-color: green;
    border-radius: 1px;
}

.border {}

.nav-tabs .nav-item:hover {
    background-color: #000000;
}

.nav-link {
    color: #000000;
    font-weight: 500;
}

.section {
    padding-top: 0rem;
}

.inline p {
    display: inline;
    padding-left: 20px;
    padding-right: 20px;

}

.bounty {
    background-color: #ffe18d;
}

.btn {
    border-radius: none;
}


.navbar {
    top: 0;
    background-color: black;
}

.deadline p {
    display: inline-block;
}

.deadline span {
    color: red;
    font-style: bold;
}

.link {
    border: 0.5px solid green;
    border-radius: 5px;
    border-left: 10px solid green;
    border-right: 10px solid green;
}

.Download {
    border: 0.5px solid green;
    border-radius: 5px;
    padding: 8px;
    background-color: green;
    color: white;
}

.closed-event a {
    box-sizing: 0 0 2px;
    border: 0.5px solid black;
    padding: 3px;
    background-color: gray;
    border-radius: 5px;
}

.closed-event a:link,
.closed-event a:visited {
    color: white;
}

.table-notification
{
  border-top: 1px solid green;
  border-bottom: 5px solid green;
}
.circle {
 
  border-radius: 80%;
  font-size: 15px;
  color: #fff;
  line-height: 8px;
  padding-left: 4px;
  padding-right: 4px;
  
  background:red;
}

</style>
@endsection
@section('script')
<script>
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
   var user_id=$('#user_id').val();
       $.ajax({
            type:'get',
             url: '{!! URL::to('hacker/mark/notification/') !!}',
            data:{'id':user_id},
            success:function(){
                
           
                   $("#count").html("");  
            },
            error:function(){
           },
        });

}

</script>
@endsection
