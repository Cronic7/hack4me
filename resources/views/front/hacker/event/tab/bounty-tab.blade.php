<h1>
    <center>Bounty here
        <span class="text-primary" data-typing="besutiguk,wonderful" data-back-speed="100"></span></center>
</h1>
<hr>
<section class="section ">
    <div class="row">
        <div class="col-md-3">
            <div class="container">
                <h6 class="sidebar-title">Category</h6>
                <div class="gap-multiline-items-1">
                    <a class="badge badge-secondary" href="{{ route('hacker.event.show') }}">All</a>
                    @foreach($categories as $category)
                    <a class="badge badge-secondary" href="{{ route('hacker.event.show.category.detail',$category->id) }}">{{$category->name}}</a>
                    @endforeach
                </div>
                <hr>
                <p class="closed-event"><a href="{{ route('hacker.closed.bounty')}}">Closed Bounty</a></p>
                <hr>
                <h6 class="title">Description</h6>
                <p> The event posted by admin is displayed here . you can join any one of the event by just cliking </p>
            </div>
        </div>
        <div class="col-md-9">
            <div class="container border">
                @section('main')
                @forelse($bounties as $bounty)
                <div class="row bg">
                    <div class="col-md-12">
                        <div class="row">
                            <DIV class="col-md-3">
                                <p class="my-5"></p>
                                <H3>{{($bounties->currentPage() - 1) * $bounties->perPage() + $loop->iteration}}</H3>
                            </DIV>
                            <div class="col-md-9 mt-5">
                                <p>{{$bounty->title}}</p>
                                <div class="inline">
                                    <p><a class="small-3 fw-600" href="{{route('hacker.event.show.detail',$bounty->id)}}">Read more <i class="fa fa-angle-right small-5 pl-1"></i></a></p>
                                    <p><a class="small-3 fw-600" href="#">i will take <i class="fa fa-check"></i></a></p>
                                    @if(isset($flag))
                                    <p class="float-right"><strong>Was expired </strong> {{date_diff(new\DateTime($bounty->deadline),new\DateTime())->format("%m month ,%d days")}} ago</p>
                                    @else
                                    <p class="float-right"><strong>This will end in</strong> {{date_diff(new\DateTime($bounty->deadline),new\DateTime())->format("%m month ,%d days")}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row bounty">
                            <div class="col-md-12">
                                <p class="float-left"><strong>Category:</strong>{{$bounty->category->name}}</p>
                                <p class="float-right" style="color: red;"><strong>${{$bounty->reward}}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                @empty
                    <center> No <strong>bounty</strong> avilable now </center>
                @endforelse
                {{ $bounties->links() }}
                @endsection
                <!----------- detail of bounty in click of readmore starts from here ----------->
                @section('detail')
                @if(isset($data))
                <!-- -----------------------frst row----------- -->
                <div class="row ">
                    <div class="col-10 col-lg-6 mx-auto text-center text-lg-left">
                        <center>
                            <h2>{{$data->title}}</h2>
                        </center>
                        <p>Read the description and select if it was not selected by any other and make sure you read the category as well as deadline. you must be punctual with time...</p>
                        <br>
                        <div class="row gap-y">
                            <div class="col-md-6">
                                <i class="fa fa-list-alt text-primary lead-4 mb-5"></i>
                                <h6 class="text-uppercase mb-3">Related to</h6>
                                <p class="fs-14">{{$data->category->name}}</p>
                            </div>
                            <!--  <i class="fab fa-bitcoin"></i> -->
                            <div class="col-md-6">
                                <i class="fab fa-bitcoin text-primary lead-4 mb-5"></i>
                                <h6 class="text-uppercase mb-3">Reward</h6>
                                <p class="fs-14" style="color: red;"><strong>${{$data->reward}}</strong></p>
                            </div>
                        </div>
                        <br>
                    </div>

                    @if(file_exists(public_path().'/bounty/img/'.$data->image)) 
                    <div class="col-lg-5 align-self-center">
                        <img class="shadow-3" src="{{asset('bounty/img/'.$data->image)}}" alt="..." data-aos="slide-left" data-aos-duration="1500">
                    </div>
                    @else 
                       <div class="col-lg-5 align-self-center">
                        <img class="shadow-3" src="{{asset('assets/img/preview/header-gradient.jpg')}}" alt="..." data-aos="slide-left" data-aos-duration="1500">
                    </div>

                    @endif
                </div>
                <!-- --------------second row--------------- -->
                <div class="row">
                    <div class="col-md-11 mx-auto text-center text-lg-left">
                        <i class="fas fa-book text-primary lead-4 mb-5"></i>
                        <h6 class="text-uppercase mb-3">Description</h6>
                        <p class="fs-14">{!!$data->description!!}</p>
                    </div>
                </div>
                <!-- ----------------------third row------------------- -->
                <div class="row">
                    <div class="col-md-11 mx-auto text-center text-lg-left deadline">
                        <P class="float-left">
                            <i class="fas fa-calendar-alt"></i><strong> Deadline<br><span>{{date('j F, Y', strtotime($data->deadline))}}</span></strong><br>
                            <br>
                        </P>
                        <p class="float-right">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <strong>Posted by: <span>{{$data->user->name}}</span></strong><br>
                            <i class="fa fa-building-o" aria-hidden="true"></i>
                            <strong>Company: <span>{{$data->user->userbusiness->company_name}}</span></strong>
                        </p>
                    </div>
                </div>
                @if($data->url)
                @if($data->bounty_category_id==1)
                <div class="row">
                    <div class="col-md-11 mx-auto text-center text-lg-left link">
                        <P class="float-left">
                        <i class="fas fa-link"></i><strong> Website: </strong><a href="{{$data->url}}">{{$data->url}}</a>
                        </P>
                    </div>
                </div>
                @endif
                @if($data->bounty_category_id==4)
                <div class="row">
                    <div class="col-md-11 mx-auto text-center text-lg-left link">
                        <P class="float-left">
                            <i class="fa fa-link" aria-hidden="true"></i><strong> drive link: </strong><a href="">www.facebok.comhttps://drive.google.com/file/d/17YgZ7AnqFCV8rBpENJyccPuTVfCr7Zee/view?usp=sharingsdfhffffffffffffffffffffffffffff
                                sddddddddddddddddddddds</a>
                        </P>
                    </div>
                </div>
                @endif
                @endif
                <br>
                @if($data->file)
                <div class="row">
                    <div class="col-md-11 mx-auto text-center text-lg-left ">
                        <P class="float-center">
                            <center> <a href="{{route('hacker.file.download',$data->file)}}" class="Download"> <i class="fa fa-download mr-1" aria-hidden="true"></i><strong>Download file</strong></a></center>
                        </P>
                    </div>
                </div>
                @endif
                <!-- ----------------------------------fourth row------------------------- -->
                <hr style="color: black">
                <section class="section">
                    <div class="container">
                        <h2 class="text-center">Submit your documentation here </h2>
                        <div class="row">
                            <form class="col-11 col-lg-12 mx-auto p-6 bg-gray rounded" action="{{route('hacker.report.send')}}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                @if(session()->has('success'))
                                <div class="alert alert-success d-on-success">{{session()->get('success')}}</div>
                                @endif
                                <small><strong>Note:</strong>your report must be pdf or doc and payment gateway is esewa make sure you insert gineun</small><br>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="hidden" name="receiver_business_user_id" value="{{$data->user->id}}">
                                        <input type="file" class="form-control" id="customFile" name="file" accept=".pdf ,.docx">
                                        <small style="color: red" class="ml-4">{{$errors->first('file')}}</small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input class="form-control " type="text" name="account" placeholder="Esewa id" value="{{old('account')}}">
                                        <small style="color: red" class="ml-4">{{$errors->first('account')}}</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control form-control-lg" rows="4" placeholder="Your Message" name="message" value="">{{old('message')}}</textarea>
                                    <small style="color: red" class="ml-4">{{$errors->first('message')}}</small>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-lg btn-primary btn-sm" type="submit">Submit </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                @endif
                @endsection
                <!-- --------------detail of bounty in click of readmore end here--------------------->
                @if(isset($data))
                @yield('detail')
                @else
                @yield('main')
                @endif
            </div>
</section>
