@extends('layout.admin_main')

@section('title', 'Admin Dashboard')

@section('content')

    <section class="top" style="margin-top: 50px;">
        <div class="container">
        <form action="/admin/keyword-wise-jobs" method="get">
        {{csrf_field()}}
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <input type="text" name="searchQuery" class="form-control" placeholder="Search Keywords" value="{{ old('searchQuery') }}">
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-warning" value="Search">
                        </div>
                    </div>
                </div>
            </div><!-- row ends here=== -->
        </form>
            

            <div class="row top">
                <div class="col-lg-2">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Job Location</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/admin/location-wise-jobs" method="get">
                            {{csrf_field()}}
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="location[]" value="Cibanteng"> Cibanteng
                                    </label>
                                </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="submit" class="btn btn-warning" value="Search" />
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>

                    <div class="panel panel-success top">
                        <div class="panel-heading">
                            <h3 class="panel-title">Category/Industry</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/admin/category-wise-jobs" method="get">
                            {{csrf_field()}}
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="category[]" value="IT/Software"> IT/Software
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="category[]" value="Data Entry/Operator"> Data Entry/Operator
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="category[]" value="Design/Creative"> Design/Creative
                                    </label>
                                </div>
                                
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="submit" class="btn btn-warning" value="Search">
                                        </div>
                                    </div>
                            </form>
                            
                        </div>
                    </div>
              
            </div>
<!-- ---------Section for Jobs--------------------------- -->
                <div class="col-lg-9 ">
                @foreach($jobs as $job)
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$job->title}}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-3"><i class="fa fa-eye-slash"></i> {{$job->user->company->name}}</div> 
                                {{-- here the relationship is job belongs to one user->and user has one company --}}
                                <div class="col-lg-3"><i class="fa fa-location-arrow"></i> {{$job->city}}</div>
                                <div class="col-lg-1"><strong>Deadline:</strong> {{$job->deadline}}</div>
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <div class="col-sm-offset-6 col-sm-10">
                                            <a href="/admin/job/view/{{$job->id}}" target="_blank" class="btn btn-default">VIEW</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="col-sm-offset-6 col-sm-10">
                                            <a href="/admin/job/delete/{{$job->id}}" target="_blank" class="btn btn-warning">DELETE</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
            <!-- row ends here----------- -->

        </div>
        <!-- First container-fluid ends here -->
    </section>
@endsection
