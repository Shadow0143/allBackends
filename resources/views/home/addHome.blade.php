@extends('layouts.backend.app')

@section('title')
<title>All Backend | Homne List</title>
@endsection

@section('content')



<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Home List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Home List</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Add New / Existing House</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form action="{{route('submitHome')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        @if($data)
                        <input type="hidden" name="id" id="id" value="{{$data->id}}">

                        @endif
                        <div class="row">
                            <div class="col-12">
                                <label for="type">Type <span class="text-danger">*</span> </label>
                                <br>
                                <input type="radio" name="type" id="type " value="new" @if($data)
                                    @if($data->type=='new')checked @endif @endif class="typefield">
                                New
                                <input type="radio" name="type" id="type " value="existing" class="typefield" @if($data)
                                    @if($data->type=='existing')checked @endif @endif> Existing
                            </div>
                            <div class="col-6">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" placeholder="Title" class="form-control"
                                    required @if($data) value="{{$data->title}}" @endif>
                            </div>
                            <div class="col-6">
                                <label for="price">price <span class="text-danger">*</span></label>
                                <input type="number" name="price" id="price" placeholder="Price" class="form-control"
                                    required @if($data) value="{{$data->price}}" @endif>
                            </div>
                            <div class="col-12 durationfield" @if($data) @if($data->duration) style="display: block"
                                @else
                                style="display: none" @endif @else style="display: none" @endif>
                                <label for="duration">Duration</label>
                                <input type="text" name="duration" id="duration" class="form-control"
                                    placeholder="Duration" @if($data) value="{{$data->duration}}" @endif>
                            </div>
                            <div class="col-12">
                                <label for="description">Description (Facilities)<span class="text-danger">*</span>
                                </label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control "
                                    placeholder="Address">@if($data) {{$data->description}} @endif</textarea>
                            </div>
                            <div class="col-3">
                                <label for="city">City</label>
                                <input type="text" name="city" id="city" placeholder="City" class="form-control"
                                    @if($data) value="{{$data->city}}" @endif>
                            </div>
                            <div class="col-3">
                                <label for="state">State</label>
                                <input type="text" name="state" id="state" placeholder="State" class="form-control"
                                    @if($data) value="{{$data->state}}" @endif>
                            </div>
                            <div class="col-3">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" cols="30" rows="1"
                                    class="form-control">@if($data) {{$data->address}} @endif</textarea>
                            </div>
                            <div class="col-3">
                                <label for="pin">Pin</label>
                                <input type="number" name="pin" id="pin" placeholder="Pin" class="form-control"
                                    maxlength="5" @if($data) value="{{$data->pin}}" @endif>
                            </div>
                            <div class="co-12">
                                <label for="image">Image <span class="text-danger">*</span></label>
                                <input type="file" name="image[]" id="image" class="form-control" multiple
                                    placeholder="Images" @if($data) @else required @endif>
                            </div>
                            @if($image)
                            <div class="col-12">
                                <div class="row">

                                    @foreach ($image as $key3=>$val3)
                                    <div class="card col-3 updateimg{{$val3->id}}">
                                        <a href="javaScript:void(0);" title="delete" data-id="{{$val3->id}}"
                                            class="deleteimage">*</a>
                                        <img src="{{asset('houseImage')}}/{{$val3->image}}" alt="images">
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                            @endif
                            <div class="col-6">
                                <label for="availabel"> Availabel</label>
                                <select name="availabel" id="availabel" class="form-control">
                                    <option value="available" @if($data) {{ $data->availabel == 'available' ? 'selected'
                                        : '' }} @endif> Available</option>
                                    <option value="occupied" @if($data) {{ $data->availabel == 'occupied' ? 'selected' :
                                        '' }} @endif> Occupied</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="status"> Status</label>
                                <select name="status" id="statuss" class="form-control">
                                    <option value="active" @if($data) {{ $data->status == 'active' ? 'selected' : '' }}
                                        @endif>Active</option>
                                    <option value="inactive" @if($data) {{ $data->status == 'inactive' ? 'selected' : ''
                                        }} @endif>inactive</option>
                                </select>
                            </div>

                            <div class="col-12 text-center mt-5">
                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->







@endsection

@section('js')
<script>
    $('.deleteimage').on('click',function(){
        var id = $(this).data('id');
        $.ajax({
            url:"{{route('deleteimage')}}",
            type:'GET',
            data:{id:id},
            success:function(data){
                $('.updateimg'+id).hide();
            }
        });
    });

    $(document).ready(function() {
    $("input[name$='type']").click(function() {
        var test = $(this).val();
        if(test=='new'){
            $('.durationfield').css('display','none');
        }else{
            $('.durationfield').css('display','block');

        }
    });
});
</script>
@endsection