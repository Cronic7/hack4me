<center>
    <h2>Post bounty </h2>
</center>
<hr>
<div class="container ">
    <div class="row mt-2">
        <div class="col-md-2 " style="border-right: solid 1px;">
            <h6 class="sidebar-title ">Our hacker</h6>
            @foreach($hackers as $hacker)
            <a class="media text-default align-items-center mb-5 mr-5" href="{{route('business.show.hacker.profile',$hacker->id)}}">
                @if($hacker->userhacker->image)
                <img class="rounded w-65px mr-4" src="{{ asset('profile/hacker/img/'.$hacker->userhacker->image) }}">
                <p class="media-body small-2 lh-4 mb-0 mr-5">{{$hacker->userhacker->username}}</p>
            </a>
            @else
            <img src="{{ asset('assets\img\hacker\profile.png') }}" class="rounded w-65px mr-4" alt="profil pic" height="60" width="40">
            <p class="media-body small-2 lh-4 mb-0 mr-6">{{$hacker->userhacker->username}}</p>
            </a>
            @endif
            @endforeach
        </div>
        <div class="col-md-8" style="border-right: solid 1px;">
            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success')}}
            </div>
            @endif
            <form method="post" action="{{route('business.bounty.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="title" value="{{old('title')}}">
                    @foreach($errors->get('title') as $message)
                    <small style="color: red; font-style: italic;">**{{$message}}</small>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <!-- <textarea class="form-control" rows="5" cols="5" style="width: 80%">
                                   
                                 </textarea> -->
                    <input id="description" type="hidden" name="description" class="form-control" placeholder="Description" value="{{old('description')}}">
                    <trix-editor input="description"></trix-editor>
                </div>
                @foreach($errors->get('description') as $message)
                <small style="color: red; font-style: italic;">**{{$message}}</small>
                @endforeach
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="dropdown" class="form-control" id="dropdown">
                        <option>-----------Choose category---------</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @foreach($errors->get('dropdown') as $message)
                    <small style="color: red; font-style: italic;">**{{$message}}</small>
                    @endforeach
                </div>
                <div id="div1" class="box form-group">
                    <label for="website">Website</label>
                    <input type="text" name="website" value="{{old('website')}}" class="form-control">
                    @foreach($errors->get('website') as $message)
                    <small style="color: red; font-style: italic;">**{{$message}}</small>
                    @endforeach
                </div>
                <div id="div2" class="box">
                    <label for="exe">exe file</label>
                    <input type="file" name="exe" class="form-control">
                    @foreach($errors->get('exe') as $message)
                    <small style="color: red; font-style: italic;">**{{$message}}</small>
                    @endforeach
                </div>
                <div id="div3" class="box">
                    <label for="apk">apk file</label>
                    <input type="file" name="apk" class="form-control">
                    @foreach($errors->get('apk') as $message)
                    <small style="color: red; font-style: italic;">**{{$message}}</small>
                    @endforeach
                </div>
                <div id="div4" class="box">
                    <label for="drive">drive link</label>
                    <input type="text" name="drive" class="form-control" value="{{old('drive')}}">
                    @foreach($errors->get('drive') as $message)
                    <small style="color: red; font-style: italic;">**{{$message}}</small>
                    @endforeach
                </div>
                <input type='hidden' value='testing' id='HiddenInput' enableviewstate="true" />
                <div class="form-group">
                    <LABEL for='reward'>Reward in $$</LABEL>
                    <input type="text" name="reward" class="form-control" style="width: 30%" placeholder="$$$$" value="{{old('reward')}}">
                    @foreach($errors->get('reward') as $message)
                    <small style="color: red; font-style: italic;">**{{$message}}</small>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="deadline">Deadline</label>
                    <input type="text" name="deadline" id="deadline" placeholder="deadline" class="form-control" value="{{old('deadline')}}">
                    @foreach($errors->get('deadline') as $message)
                    <small style="color: red; font-style: italic;">**{{$message}}</small>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" value="{{old('image')}}">
                    @foreach($errors->get('image') as $message)
                    <small style="color: red; font-style: italic;">**{{$message}}</small>
                    @endforeach
                </div>
                <input type="submit" name="submit" class="myButton ml-7" value="Post bounty">
            </form>
        </div>
        <div class="col-md-2">
            <h6>About</h6>
            <p class="media-body small-2 lh-4 mb-0">you can post bounty here left side shows the hacker list </p>
        </div>
    </div>
</div>
