<div class="p-5">
</div>
<div class="row">
    <div class="col-md-8 mx-auto">
      @section('notification')
      @if(session()->has('success'))
        <div class="alert alert-success">
          {{session()->get('success')}}
        </div>
     @endif
        <table class="table">
            <tbody>
              <form method="post" action="{{ route('business.delete.mass-report') }}" >
                @csrf
                @forelse($reports as $report)
                <tr class="{{($report->is_read==0)?'bg-ash':''}} ">
                    <th scope="row"><input type="checkbox" name="report_id[]" value="{{$report->id}}"></th>
                    <td> you have a new notification from hacker <STRONG>{{$report->user->name}}</STRONG> at,{{date('j F, Y', strtotime($report->created_at))}}
                    </td>
                    <td><a href="{{ route('business.reports.detail',$report->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    </td>
                    <td>
                        <a href="{{ route('business.delete.report',$report->id) }}"><i class="fa fa-times" aria-hidden="true"></i></a></td>

                </tr>
                @empty
                <tr>
                  <td><center>No <strong>notification</strong></center></td>
                </tr>
                @endforelse
              
            </tbody>
        </table>
        @if($reports->count()>0)
        <button  class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></button>
        </form>
        @endif
        @if($reports->count()<4)
        <div class="p-9">
        </div>
        @endif
        
        @endsection

         @if(isset($flag))
        @section('notification_details')

         <div class="container">
           <div class="row">
             <div class="col-md-6">
              
              <h5 class="text-uppercase mb-3" style="font-weight: bold">  Description</h5>
              <p>{{$reports_detail->message}}
             </p>
             <p>
              <h5 class="text-uppercase " style="font-weight: bold">From</h5>{{$reports_detail->user->userhacker->username}}</strong></p>
              <p>
              <h5 class="text-uppercase " style="font-weight: bold">Esewa id</h5>{{$reports_detail->account}}</strong></p>

                

            {{-- 
                @if($checK_if_feedback_and_rating_already==0) --}}

             <div class="" id="feedback">   

                  <h5 class="text-uppercase mb-3" style="font-weight: bold">  Feed back</h5>
              <div class="form-group">
                <textarea class="form-control" placeholder="Your message" rows="5" id="message"></textarea>
              </div>
                


         

 <h5 class="text-uppercase  " style="font-weight: bold">Star Rating</h5>


  
  <!-- Rating Stars Box -->
  <div class='rating-stars '>
    <ul id='stars' class="stars">
      <li class='star' title='Poor' data-value='1'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Fair' data-value='2'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Good' data-value='3'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Excellent' data-value='4'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='WOW!!!' data-value='5'>
        <i class='fa fa-star fa-fw'></i>
      </li>
    </ul>
  </div>
   <input type="hidden" id="business_id" value="{{Auth::user()->userbusiness->id}}">
   <input type="hidden" id="report_id" value="{{$reports_detail->id}}">
   <input type="hidden" id="hacker_id" value="{{$reports_detail->user->userhacker->id}}">


  <button onclick="feedback()" class="btn btn-sm btn-success" type="button">Submit</button>
</div>
  
  
  
  
  





                {{-- @endif --}}

             </div>

             <div class="col-md-6">
            <h5 class="text-uppercase mb-3" style="font-weight: bold">Documentation</h5>

              <embed src="{{asset('report/pdf/'.$reports_detail->file)}}"  width="600" height="475" 
                  type="application/pdf">
             </div>

             
             
           </div>
         </div>
         

         <div class="p-4">
          </div>

        @endsection
        @endif

        @if(isset($flag))
        @yield('notification_details')
        @else
        @yield('notification')
        @endif
    </div>
    @include('sweetalert::alert')

</div>
