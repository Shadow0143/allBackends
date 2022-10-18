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
                        <div class="row">
                            <div class="col-12">
                                <label for="type">Type <span class="text-danger">*</span> </label>
                                <br>
                                <input type="radio" name="type" id="type " value="new" checked class="typefield"> New
                                <input type="radio" name="type" id="type " value="existing" class="typefield"> Existing
                            </div>
                            <div class="col-6">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" placeholder="Title" class="form-control"
                                    required>
                            </div>
                            <div class="col-6">
                                <label for="price">price <span class="text-danger">*</span></label>
                                <input type="number" name="price" id="price" placeholder="Price" class="form-control"
                                    required>
                            </div>
                            <div class="col-12 durationfield" style="display: none">
                                <label for="duration">Duration</label>
                                <input type="text" name="duration" id="duration" class="form-control"
                                    placeholder="Duration">
                            </div>
                            <div class="col-12">
                                <label for="description">Description (Facilities)<span class="text-danger">*</span>
                                </label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control "
                                    placeholder="Address"></textarea>
                            </div>
                            <div class="col-3">
                                <label for="city">City</label>
                                <input type="text" name="city" id="city" placeholder="City" class="form-control">
                            </div>
                            <div class="col-3">
                                <label for="state">State</label>
                                <input type="text" name="state" id="state" placeholder="State" class="form-control">
                            </div>
                            <div class="col-3">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" cols="30" rows="1"
                                    class="form-control"></textarea>
                            </div>
                            <div class="col-3">
                                <label for="pin">Pin</label>
                                <input type="number" name="pin" id="pin" placeholder="Pin" class="form-control"
                                    maxlength="5">
                            </div>
                            <div class="co-12">
                                <label for="image">Image <span class="text-danger">*</span></label>
                                <input type="file" name="image[]" id="image" class="form-control" multiple
                                    placeholder="Images" required>
                            </div>
                            <div class="col-6">
                                <label for="availabel"> Availabel</label>
                                <select name="availabel" id="availabel" class="form-control">
                                    <option value="availabel"> Available</option>
                                    <option value="occupied"> Occupied</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="status"> Status</label>
                                <select name="status" id="statuss" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">inactive</option>
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