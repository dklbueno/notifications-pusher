@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Notification</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{route('notification')}}">
                        @csrf
                        <div class="form-group">
                        <label for="from_app">From App</label>
                        <input type="text" id="from_app" name="from_app" class="form-control" required="">
                        </div>
                        <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" class="form-control" required=""></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
