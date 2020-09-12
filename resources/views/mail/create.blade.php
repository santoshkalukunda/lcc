@extends('dashboard')
@include('sidemenu')
@section('title')
    Custom Mail
@endsection
@section('content')
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Custom Mail</div>
            <div class="card-body">
                <form action="{{ route('custommail.store') }}" method="post">
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-1"><label for="to">To</label></div>
                        <div class="col-md-10"><input type="email" name="to" class="form-control"
                                placeholder="email@example.com" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1"><label for="subject">Subject</label></div>
                        <div class="col-md-10"><input type="text" name="subject" class="form-control"
                                placeholder="Email Subject"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1"><label for="message">Message</label></div>
                        <div class="col-md-10">
                            <textarea name="message" id="editor">
                    </textarea>
                            <script>
                                ClassicEditor
                                    .create(document.querySelector('#editor'))
                                    .catch(error => {
                                        console.error(error);
                                    });

                            </script>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <input type="submit" class="form-control btn-info" value="Send">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
