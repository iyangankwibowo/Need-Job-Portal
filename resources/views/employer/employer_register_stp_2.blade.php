@extends('layout.employer_main')

@section('title', 'Create new company')

@section('content')

    <section class="top" style="margin-top: 50px;">
        <div class="container-fluid">
            <h3 style="text-align:center;"><strong>Create a New Company</strong></h3>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <img src="" alt="Company Brand Image" class="img-thumbnail img-responsive" style="height: 180px; width: 500px;">
                    <br>
                    <form action="{{route('employer.company_image')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <input type="file" name="image">
                        <br>
                        <input type="submit" class="btn btn-primary" id="upload" value="UPLOAD">
                    </form>
                </div>
                <div class="col-lg-10">
                    <!-- -----------------First section------------------ -->
                    <div class="form-horizontal" id="company_form">
                        <div class="form-group{{$errors->has('name')?' has-error':''}}">
                            <label for="name" class="col-sm-2 control-label">Nama: </label>
                            <div class="col-sm-10">
                                <input type="text" name="name" value="name" class="form-control" id="name" placeholder="Nama Lengkap" required>
                                @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('name')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="country" class="col-sm-2 control-label">Fakultas: </label>
                            <div class="col-sm-10">
                                <select name="country" id="country" class="form-control">
                                        <option value="Faperta">Fakultas Pertanian</option>
                                        <option value="Fkh">Fakultas Kedokteran Hewan</option>
                                        <option value="Fpik">Fakultas Perikanan dan Ilmu Kelautan</option>
                                        <option value="Fapet">Fakultas Peternakan</option>
                                        <option value="Fahutan">Fakultas Kehutanan</option>
                                        <option value="Fateta">Fakultas Teknik Pertanian</option>
                                        <option value="Fmipa">Fakultas Ilmu Pengetahuan Alam</option>
                                        <option value="Fem">Fakultas Ekonomi dan Menejemen</option>
                                        <option value="Fema">Fakultas Ekologi Manusia</option>
                                        <option value="SB">Sekolah Bisnis</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-sm-2 control-label">Alamat Tinggal: </label>
                            <div class="col-sm-10">
                                <select name="city" id="city" class="form-control">
                                        <option value="Babakan Raya">Babakan Raya</option>
                                        <option value="Babakan Tengah">Babakan Tengah</option>
                                        <option value="Cibanteng">Cibanteng</option>
                                        <option value="Dramaga Cantik">Dramaga Cantik</option>
                                        <option value="Puri D'kost">Puri D'kost</option>
                                        <option value="IPB Dramaga">IPB Dramaga</option>
                                        <option value="IPB Baranangsiang">IPB Baranangsiang</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="industry" class="col-sm-2 control-label">Category : </label>
                            <div class="col-sm-10">
                                <select name="industry" id="industry" class="form-control">
                                        <option value="Design">Design</option>
                                        <option value="IT/Software">Website IT/Software</option>
                                        <option value="Writing">Writing</option>
                                        <option value="Data Entry">Data Entry</option>
                                        <option value="Business/Accounting/Legal">Business/Accounting/Legal</option>
                                        <!-- sisanya ambil dari seeker find jobs-->
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="website" class="col-sm-2 control-label">Contacs: </label>
                            <div class="col-sm-10">
                                <input type="text" name="website" value="" class="form-control" id="website" placeholder="Id Line/WhatsApp/LinkedIn">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="about" class="col-sm-2 control-label">Deskripsi diri: </label>
                            <div class="col-sm-10">
                            <textarea class="form-control" rows="4" cols="20" id="about" name="about" placeholder="Deskripsi keahlian, pengalaman, atau prestasi"></textarea>
                            </div>
                        </div>
                        <!-- <div class="col-sm-10 col-sm-offset-2">
                            <textarea class="form-control" rows="4" cols="20" id="about" name="about" placeholder="Deskripsi pengalaman atau prestasi"></textarea>
                            <br>
                        </div> -->

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" id="save" class="btn btn-warning">Save</button>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row ends here -->
        </div>
        <!-- First container-fluid ends here -->
        {{csrf_field()}}
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // $('#save').click(function(event) {//when clicking on the Save btn second time this code doesn't work.So i need to use the code given below.
            //     var name = $('#name').val();
            //     var country = $('#country').val();
            //     var city = $('#city').val();
            //     var industry = $('#industry').val();
            //     var website = $('#website').val();
            //     var about = $('#about').val();

            //     $.post('{{route('employer.company')}}',{'_token':$('input[name=_token]').val(),'name':name,'country':country,'city':city,'industry':industry,'website':website,'about':about}, function(data) {
            //         $('#company_form').load(location.href + ' #company_form');
            //         console.log(data);
            //     });
            // });

            $(document).on('click','#save', function(event) {
                event.preventDefault();
                var name = $('#name').val();
                var country = $('#country').val();
                var city = $('#city').val();
                var industry = $('#industry').val();
                var website = $('#website').val();
                var about = $('#about').val();

                $.post('{{route('employer.company')}}',{'_token':$('input[name=_token]').val(),'name':name,'country':country,'city':city,'industry':industry,'website':website,'about':about}, function(data) {
                    $('#company_form').load(location.href + ' #company_form');
                    console.log(data);
                });
            });
        });
    </script>
@endsection