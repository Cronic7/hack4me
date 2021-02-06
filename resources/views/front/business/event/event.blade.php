@extends('layouts.front.business')
@section('title')
Event and bounty
@endsection
@section('content')
<main class="main-content">
    <div class="row bg-gray">
        <div class="col-md-12 ">
            <ul class="nav nav-tabs" role="tablist" id="myTab">
                <input type="hidden" id="user_id"  value="{{Auth::user()->id}}">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tab-home-1"><strong>Bounty<i class="fa fa-calendar"></i></strong></a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab-contact-1" onclick="call()"><strong>
                         <span id="count"> @if($count_notification>0) <span class="circle">{{$count_notification}}</span> @endif</span> Notification <i class="fa fa-bell"></i></strong></a>
                </li>
            </ul>
            <div class="tab-content p-4">
                <div class="tab-pane fade show active" id="tab-home-1">
                    @include('front.business.event.bar.bounty')
                </div>
                <!-- ----------------------------second tab  bounty tab start here------------------------------------       -->
                
                <!-- --------------------------------------------second tab bounty tab ends here-------------------------->
                <!---------------------------------- third tab ----------------------------------------->
                <div class="tab-pane fade" id="tab-contact-1">
                    @include('front.business.event.bar.notification')
                </div>
            </div>
        </div>
    </div>
</main>
@include('sweetalert::alert')

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

.circle {

    border-radius: 80%;
    font-size: 15px;
    color: #fff;
    line-height: 8px;
    padding-left: 4px;
    padding-right: 4px;

    background: red;
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
.bg-ash
{
    background-color: #d6d4ca;
}
.bg-white
{
    background-color: white;
}

/* css for star rating system */
.rating-stars{

    margin-top: 15px;
}


.hidden{
    display: none;
}


/* Rating Star Widgets Style */
.rating-stars ul {
  list-style-type:none;
  padding:0;
  
  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  display:inline-block;
  
}

/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
  font-size:2.5em; /* Change the size of the stars */
  color:#ccc; /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FFCC36;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  color:#FF912C;
}

/* end here*/


</style>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
   var ratingValue;
   var report_id=$('#report_id').val();
  var check='';



$(document).ready(function() {
    

   checks();
 
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        $('#myTab a[href="' + activeTab + '"]').tab('show');

    }
 

    //star rating part


    $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
  ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);

    
  });



});


function checks()
{
   
    $.ajax({


        type:'get',
        url:'{!!URL::to('business/rate/check')!!}',
        data:{'report_id':report_id},
        dataType: "json",
        success:function(response){
         
        
         if(response==='false')
       {
         $('#feedback').addClass('hidden');
       }


          
        }
     });
    
    
    
}




function feedback()


{    var business_id=$('#business_id').val();
     var message=$('#message').val();
     var report_id=$('#report_id').val();
     var hacker_id=$('#hacker_id').val();
     if(message=='' || ratingValue==null)
     {
        alert('plz fill message and rate star');
        return ;
     }
     $.ajax({


        type:'get',
        url:'{!!URL::to('business/rate/')!!}',
        data:{'user_id':business_id ,'message':message,'report_id':report_id,'hacker_id':hacker_id,'rate':ratingValue},
        success:function(){
            checks();


           
        }
     });

      Swal.fire({
      title: 'success!',
      text: 'Thank you for your feedback',
      icon: 'success',
   confirmButtonText: 'ok'
 })
    
}




function call() {


     var user_id=$('#user_id').val();
      
         $.ajax({
            type:'get',
             url: '{!! URL::to('business/mark/notification/') !!}',
            data:{'id':user_id},
            success:function(){
                
           
                   $("#count").html("");  
            },
            error:function(){
           },
        });

}


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


//--------------------date picker start here-------------------

flatpickr('#deadline', { enableTime: true })

// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.tags-selector').select2();
});
// -----------------------date picker end here-----------------------

</script>
@endsection
