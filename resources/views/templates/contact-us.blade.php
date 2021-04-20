@extends('layouts.html_layout')

@section('body')

<div class="container mt-5 contact-section">
    <div class="row justify-content-center">
        <div class="col-lg-6 contact-col">
            <form action="#">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-blue">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
