@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Add Video |  {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Video</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.video.store')}}" enctype="multipart/form-data" >
                   @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Video Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter User Name" required>
                        </div>
                        <div class="form-group col-6">
                            <label>Video</label>
                            <input type="file" name="video"  class="form-control" required>
                        </div>
                    </div>     
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Accounts Detail</h5>
        </div>
        <table class="table" id="datatables-reponsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Video Name</th>
                    <th>Video </th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Video::all() as $key => $video)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$video->name}}</td>
                    <td>{{$video->video}}</td>
                    <td>
                        <button data-toggle="modal" data-target="#edit_modal" name="{{$video->name}}" video="{{$video->video}}" 
                                id="{{$video->id}}" class="edit-btn btn btn-primary">Edit</button>
                        </td>
                    <td>
                        <form action="{{route('admin.video.destroy',$video->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                        <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div id="edit_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Enter Video Name</label>
                        <input type="text" name="name" id="name"  class="form-control" required>
                    </div>   
                    <div class="form-group ">
                        <label>Video</label>
                        <input type="file" name="video" id="video" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('.edit-btn').click(function(){
            let name = this.name;
            let video = this.video;
            let id = $(this).attr('id');
            $('#name').val(name);
            $('#video').val(video);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.video.update','')}}' +'/'+id);
        });
    });
</script>
<script>
    $(function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    });
</script>
@endsection