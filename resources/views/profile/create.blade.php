@extends('dashboard')
@include('sidemenu')
@section('title')
    Company Profile
@endsection
@section('content')
    <div class="col-md-12">
        @if (Session::has('success'))
            <div class="bg-success text-white p-2">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">Company Profile</div>
            <div class="card-body">
                <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row form-group">
                        <div class="col-md-1"><label for="name">Name</label></div>
                        <div class="col-md-8"><input type="text" class="form-control" name="name" id="name"
                                placeholder="Comapny Name" required autofocus></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1"><label for="address">Address</label></div>
                        <div class="col-md-8"><input type="text" class="form-control" name="address" id="address"
                                placeholder="Address" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1"><label for="Email">Email</label></div>
                        <div class="col-md-8"><input type="email" class="form-control" name="email" id="email"
                                placeholder="email@example.com"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1"><label for="Contact">Contact</label></div>
                        <div class="col-md-8"><input type="tel" class="form-control" name="contact" id="contact"
                                placeholder="Contact" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1"><label for="facebook">Facebook</label></div>
                        <div class="col-md-8"><input type="url" class="form-control" name="facebook" id="facebook"
                                placeholder="https://facebook.com/username"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1"><label for="twitter">Twitter</label></div>
                        <div class="col-md-8"><input type="url" class="form-control" name="twitter" id="twitter"
                                placeholder="https://twitter.com/username"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1"><label for="linkedin">Linkedin</label></div>
                        <div class="col-md-8"><input type="url" class="form-control" name="linkedin" id="linkedin"
                                placeholder="https://www.linkedin.com/username"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1"><label for="youtube">YouTube</label></div>
                        <div class="col-md-8"><input type="url" class="form-control" name="youtube" id="youtube"
                                placeholder="https://www.youtube.com/channel"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1">
                            <label for="logo">Logo</label>
                        </div>
                        <div class="col-md-4 ">
                            <input type="file" name="logo" onchange="readURL(this);" class=" form-control-file " id="logo"
                                accept="image/*" required>
                        </div>
                        <div class="col-md-3">
                            <img src="" id="image" class="img-thumbnail rounded float-right mx-auto d-block img-fluid"
                                style="width:30%">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <input type="submit" class="form-control btn btn-success" value="Submit">
                        </div>
                       
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endsection
