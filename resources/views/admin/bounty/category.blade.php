@extends('layouts.admin.app')
@section('content')
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
                <div class="col-lg-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Table Head</strong>
                            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Add category</button>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$category->name}}</td>
                                        <td><a class=" btn btn-secondary btn-sm d-lg-inline-block" href="{{route('admin.bounties.edit',$category->id) }}">edit</a>
                                            <form method="post" action="{{ route('admin.bounties.destroy',$category->id)}}" class="d-lg-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class=" btn btn-danger btn-sm d-inline-block " value="Delete">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div>
-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('admin.bounties.store')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Category</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('css')
@endsection
@section('script')
<script type="text/javascript">
$('#myModal').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus')
})

</script>
@endsection
