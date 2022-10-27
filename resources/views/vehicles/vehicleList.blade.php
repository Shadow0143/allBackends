@extends('layouts.backend.app')

@section('title')
<title>All Backend | Home List</title>
@endsection

@section('css')

@endsection

@section('content')



<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Vehicles List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Vehicles List</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="tasksList">
                    <div class="card-header border-0">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">All Vehicles</h5>
                            <div class="flex-shrink-0">
                                <a class="btn btn-danger add-btn" href="{{route('addVehicle')}}"><i
                                        class="ri-add-line align-bottom me-1"></i> Add
                                    Vehicles</a>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-12 ">
                        <div class="row pl-5<">
                            <div class="col-3">
                                <label for="type">Search Type</label>
                                <select name="searchtype" id="searchtype" class="form-control">
                                    <option value="">Please select </option>
                                    <option value="title">Title</option>
                                    <option value="city">City</option>
                                    <option value="pin">Pin</option>
                                    <option value="created_at">Date</option>
                                </select>
                            </div>

                            <div class="col-3">
                                <label for="Searchkeyword">Search Keyword</label>
                                <input type="text" name="searchkeyword" id="searchkeyword" class="form-control"
                                    placeholder="Please type search keywords">
                            </div>

                            <div class="col-3">
                                <a href="javaScript:void(0);" class="searchbtn" title="Search"> <i
                                        class="las la-search"></i> Search
                                </a>
                            </div>
                            <div class="col-3">
                                <a href="javaScript:void(0);" title="Short By" class="ascprice" data-order="ASC"
                                    id="asc"> <i class=" las la-filter"></i>
                                    Short By Price(Low to High)
                                </a>
                                <a href="javaScript:void(0);" title="Short By" class="ascprice" data-order="DESC"
                                    id="desc" style="display:none"> <i class=" las la-filter"></i>

                                    Short By Price(High to Low)
                                </a>
                            </div>
                        </div>
                    </div> --}}

                    <!--end card-body-->
                    <div class="card-body" id="resultdata">

                        <div class="container">
                            {{-- @foreach ($allhouse as $key => $val)

                            <div class="card-new ">
                                @if ($val->appartment_for=='new')
                                <img src="{{asset('assets/blink.gif')}}" alt="blink-new" class="blinkimg">
                                @else

                                @endif
                                <div class="card-header">
                                    <div id="carouselExampleIndicators{{$val->id}}" class="carousel slide"
                                        data-ride="carousel">

                                        <div class="carousel-inner">
                                            @foreach ($val->posts as $key2=>$val2)
                                            <div class="carousel-item @if($key2==0)active @endif">
                                                <img src="{{asset('houseImage')}}/{{$val2->image}}"
                                                    alt="{{$val2->image}}" />
                                            </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators{{$val->id}}"
                                            role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators{{$val->id}}"
                                            role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col ">
                                            <h4>
                                                {{$val->title}}
                                            </h4>
                                        </div>
                                        <div class="col">
                                            <span class="tag tag-teal"> {{$val->availabel}} </span>
                                        </div>
                                        <div class="col ">
                                            <h4>
                                                <a href="{{route('editHome',['id'=>$val->id])}}" title="Edit" class="">
                                                    <i class="las la-ellipsis-v"> </i>
                                                </a>
                                            </h4>

                                        </div>
                                    </div>

                                    <p>Price :
                                        <i class="las la-rupee-sign"></i> {{$val->price}} /-
                                        @if($val->appartment_for=='new')

                                        @else
                                        <span> for {{$val->duration}} </span>
                                        @endif


                                    </p>
                                    <p>
                                        @if ($val->bedrooms)
                                        <i class=" las la-bed" title="Bedrooms"></i> {{$val->bedrooms}} &nbsp;
                                        @endif
                                        @if ($val->bathrooms)
                                        <i class=" las la-bath" title="Bathrooms"></i> {{$val->bathrooms}} &nbsp;
                                        @endif
                                        @if ($val->size)
                                        <i class=" las la-hotel" title="Size"></i>{{$val->size}}
                                        @endif
                                    </p>
                                    <p>
                                        Address : {{$val->city}},{{$val->state}},{{$val->address}},{{$val->pin}}
                                    </p>
                                    <p>

                                    <div class="form-check form-switch form-switch-secondary">
                                        <input class="form-check-input checkable" type="checkbox" role="switch"
                                            id="SwitchCheck2" @if ($val->status == 'active') checked value="inactive"
                                        @else value="active" @endif data-id="{{$val->id}}">
                                        <label class="form-check-label" for="SwitchCheck2" id="status{{$val->id}}">
                                            {{ucfirst($val->status)}}</label>
                                    </div>
                                    </p>
                                    <p>
                                        {{date('d M ,Y',strtotime($val->created_at))}}
                                        <br>
                                        <a href="javaScript:void(0);" data-id="{{$val->id}}" class="knowmore">
                                            Know more <i class=" las la-arrow-righ"></i>
                                        </a><br>
                                        @if ($val->latitude && $val->longitude)

                                        <iframe
                                            src="https://www.google.com/maps?q={{$val->latitude}},{{$val->longitude}}&hl=en&z=14&amp;output=embed"
                                            width="250" height="150" referrerpolicy="no-referrer-when-downgrade"
                                            allowfullscreen="yes" loading="lazy">
                                        </iframe>
                                        @endif


                                    </p>

                                </div>

                            </div>
                            @endforeach
                            <span style="">
                                {{ $allhouse->links() }}

                            </span> --}}
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->




    <!-- Modal -->
    <div class="modal fade" id="knowmoremodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Property Detail</h5>
                    <button type="button" class="close btn btn-outline-primary" data-dismiss="modal" aria-label="Close"
                        onclick="hidemodal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="slider">

                    </div>


                    <div class="col-12">
                        <div class="card-body">
                            <div class="row">
                                <div class="col ">
                                    <h4 id="detailtitle">

                                    </h4>
                                </div>
                                <div class="col">
                                    <span class="tag tag-teal" id="detailavailabel"> </span>
                                </div>
                                <div class="col">

                                    <span class="tag tag-teal" id="detailsstatus"> </span>
                                </div>
                            </div>

                            <p>Price :
                                <i class="las la-rupee-sign"></i><span id="detailsprice"> </span> /-



                            </p>

                            <p>

                                <i class=" las la-bed" title="Bedrooms"></i> <span id="bedrooms"></span> &nbsp;

                                <i class=" las la-bath" title="Bathrooms"></i> <span id="bathrooms"></span> &nbsp;

                                <i class=" las la-hotel" title="Size"></i> <span id="size"></span>
                            </p>
                            <p>
                                <span id="detaildescription"></span>
                            </p>
                            <p>
                                Address : <span id="detailscity"></span>,
                                <span id="detailsstate"></span>,
                                <span id="detailsaddress"></span>,
                                <span id="detailspin"></span>
                            </p>

                            <p>

                                <span id="detailsdate"></span>
                            </p>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>




    @endsection

    @section('js')
    <script>
        function hidemodal(){

            $('#knowmoremodal').modal('hide');
        }
        $('.knowmore').on('click',function(){
            var id = $(this).data('id');
            var options = { year: 'numeric', month: 'long',  day: 'numeric'};

            $.ajax({
                url: "{{route('knowMore')}}",
                type:'GET',
                data:{id:id},
                success:function(data){
                    $('#detailtitle').html(data.title);
                    $('#detailavailabel').html(data.availabel);
                    $('#detailsprice').html(data.price);
                    $('#detailscity').html(data.city);
                    $('#detailsstate').html(data.state);
                    $('#detaildescription').html(data.description);
                    $('#detailsaddress').html(data.address);
                    $('#detailspin').html(data.pin);
                    $('#detailsstatus').html(data.status);
                    $('.slider').html(data.slider);
                    $('#bedrooms').html(data.bedrooms);
                    $('#bathrooms').html(data.bathrooms);
                    $('#size').html(data.size);
                    $('#detailsdate').html(new Date(data.created_at).toLocaleDateString("en-US",options));
                    $('#knowmoremodal').modal('show');
                }
            });
        });


        $('.checkable').live('change', function() {
            var val = $(this).val();
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('editHomeStatus')}}",
                type:'GET',
                data:{id:id,value:val},
                success:function(data){
                    $('#status'+id).html(data);
                    window.location.reload();
                }
            });
        });


        $('.searchbtn').on('click',function(){

            var keyword = $('#searchkeyword').val();
            var type = $('#searchtype').val();
            $.ajax({
                url:"{{route('filterproperty')}}",
                type:"GET",
                data:{keyword:keyword,type:type},
                success:function(data){
                    $('#resultdata').html(data);
                }
            });

        });


        $('.ascprice').on('click',function(){
            var keyword = $('#searchkeyword').val();
            var type = $('#searchtype').val();
            var order = $(this).data('order');

            $.ajax({
                url:"{{route('filterorder')}}",
                type:"GET",
                data:{keyword:keyword,type:type,order:order},
                success:function(data){
                    if(order =='ASC'){
                        $('#asc').css('display','none');
                        $('#desc').css('display','block');
                    }else{
                        $('#asc').css('display','block');
                        $('#desc').css('display','none');
                    }
                    $('#resultdata').html(data);
                }
            });

        });

    </script>


    @endsection