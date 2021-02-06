@extends('layouts.admin.app')
@section('content')
@section('title')
  Closed Bounty
@endsection
<div class="clearfix"></div>
<div id="right-panel" class="right-panel">
    <div class="content">
        <div class="animated fadeIn">
            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success')}}
            </div>
            @endif
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Active bounty</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-blue">
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Posted At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($activebounties as $active)
                                    <tr>
                                        <form method="post" action="{{ route('admin.mass.bounty.delete')}}">
                                            @csrf
                                            <th> <input type="checkbox" name="del[]" value="{{ $active->id}}"></th>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $active->title }}</td>
                                            <td>{{ $active->category->name }}</td>
                                            <td> {{date('j F, Y', strtotime($active->created_at))}}</td>
                                            <td> <a class="btn btn-primary btn-sm " data-toggle="modal" data-target="#exampleModal-{{$active->id}} " data-id="{!! $active->id !!}" href="">view</a>
                                                <a class=" btn btn-danger btn-sm d-inline-block " href="{{route('admin.single.bounty.delete',$active->id) }}" value="Delete">delete</a>
                                            </td>
                                    </tr>
                                    <!-------------------------------------- Modal --------------------->
                                    <div class="modal fade" id="exampleModal-{{$active->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel                           " aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title color-white" id="exampleModalLabel">
                                                        <center><strong>{{$active->title}}</strong></center>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-3 ">
                                                                <strong class="color-white">Category</strong>
                                                            </div>
                                                            <div class="col-md-1 color-white">
                                                                =>
                                                            </div>
                                                            <div class="col-md-8 color-white">
                                                                {{ $active->category->name }}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-3 ">
                                                                <strong class="color-white">Description</strong>
                                                            </div>
                                                            <div class="col-md-1 color-white">
                                                                =>
                                                            </div>
                                                            <div class="col-md-8 color-white borderbg">
                                                                {!! $active->description !!}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <strong class="color-white">Image</strong>
                                                            </div>
                                                            <div class="col-md-1 color-white">
                                                                =>
                                                            </div>
                                                            <div class="col-md-8 color-white">
                                                                <img src="{{ asset('bounty/img/'.$active->image) }}" width="150" height="150">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <strong class="color-white">Deadline</strong>
                                                            </div>
                                                            <div class="col-md-1 color-white">
                                                                =>
                                                            </div>
                                                            <div class="col-md-8 color-white">
                                                                {{date('j F, Y', strtotime($active->deadline))}}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <strong class="color-white">rewrd</strong>
                                                            </div>
                                                            <div class="col-md-1 color-white">
                                                                =>
                                                            </div>
                                                            <div class="col-md-8 color-white">
                                                                ${{ $active->reward }}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <strong class="color-white">status</strong>
                                                            </div>
                                                            <div class="col-md-1 color-white">
                                                                =>
                                                            </div>
                                                            <div class="col-md-8 color-white">
                                                                <a class="status"> {{ $active->status}}</a>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        @if($active->url)
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <strong class="color-white">Url</strong>
                                                            </div>
                                                            <div class="col-md-1 color-white">
                                                                =>
                                                            </div>
                                                            <div class="col-md-8 color-white">
                                                                <p class="borderurl"> <a href="{{ $active->url }}"> {{ $active->url }} </a></p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        @endif
                                                        @if($active->file)
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <strong class="color-white">File</strong>
                                                            </div>
                                                            <div class="col-md-1 color-white">
                                                                =>
                                                            </div>
                                                            <div class="col-md-8 color-white">
                                                                {{ $active->file }}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        @endif
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <strong class="color-white">Posted by</strong>
                                                            </div>
                                                            <div class="col-md-1 color-white">
                                                                =>
                                                            </div>
                                                            <div class="col-md-8 color-white borderbg">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        name:
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        {{$active->user->name}}
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        company:
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        {{$active->user->userbusiness->address}}
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        email:
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        {{$active->user->email}}
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        photo:
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <img src="{{asset('profile/business/img/'.$active->user->userbusiness->image)}}" width="100" height="100" class="rounded">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                      <tr>
                                         <td colspan="10"><center>NO record</center></td>
                                      </tr>

                                    @endforelse
                                </tbody>
                            </table>
                            <hr>
                            @if($activebounties->count()>0)
                            <button type="submit" class="ml-3 btn btn-danger">Multiple Delete</button>
                            @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div>
@endsection
@section('css')
<style type="text/css">
.color-white {
    color: white;
}

.modal-content {
    background-color: black;
}

.modal-dialog {
    width: 100%;
    height: 100%
}

.status {
    border: 0.5px solid green;
    border-radius: 5px;
    padding: 8px;
    background-color: green;
    color: white;
}

.borderurl {
    border-right: 1px solid green;
    border-left: 5px solid green;
}

.borderurl a:visited {
    color: white;
}

.borderbg {

    border: 1px solid green;
}

</style>
@endsection
@section('script')
<script type="text/javascript">
$('#myModal').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus')
})

</script>
@endsection
