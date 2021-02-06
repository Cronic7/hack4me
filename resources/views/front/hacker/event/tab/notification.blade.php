 <div class="p-4">
              	
              </div>
          <div class="row">
             <div class="col-2x-8 mx-auto">

               
            
              <table class="table">
                <h2>Feedback store <h2>
                <tbody>
                  @foreach($feedback as $feedback)
                  <tr>
                    <th scope="row"><input type="checkbox" name=""></th>
                    <td>{{$feedback->userbusiness->username}} says ["{{$feedback->message}}"]</td>
                    
                    
                    <td>
                    	<a href="" ><i class="fa fa-times" aria-hidden="true"></i></a></td>
                  </tr>
                  @endforeach

                    
                </tbody>
              </table>
              <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
              

          </div>
      </div>
      <div class="p-8">
              	
              </div>