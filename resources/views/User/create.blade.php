@extends('layout.master')
@section('title', 'Appbirds Task View')
@section('body')

<div class="container mt-5 d-flex justify-content-center">
    <div class="list-view w-75">
        <div class="row headerAdd">
            @include('layout.message')
            <div class="col-xl-10 m-auto">
                <div class="row">
                    <div class="col-6  d-flex align-items-center">
                        <h4 class="mb-0">Add Data</h4>
                    </div>
                    <div class="col-6">
                        <a href="{{Route('data-view')}}" class="view">View Data</a>
                    </div>
                </div>
            </div>
        </div>
          <form action="{{Route('register-user')}}" method="POST" autocomplete="off" id="insertForm">
            @csrf
            <div class="row mt-4">
                <div class="col-xl-10 m-auto">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span> </label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="country">Country<span class="text-danger">*</span> </label>
                                <input type="text" name="country" id="country" class="form-control" placeholder="Country">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="email"> Email <span class="text-danger">*</span> </label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="mobile"> Mobile Number <span class="text-danger">*</span> </label>
                                <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="dateOfBirth"> Date of Birth <span class="text-danger">*</span> </label>
                                <input type="date" name="dateOfBirth" id="dateOfBirth" class="form-control" value="1977-01-01">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="about_you"> About you <span class="text-danger">*</span></label>
                                <textarea name="about_you" id="about_you" class="form-control" rows="5" placeholder="Enter Text Here"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6 offset-lg-6 text-right">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
          </form>
      </div>
</div>
<script>       
      $(document).ready(function() {
        $("#insertForm").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 30,
                }, 
                country: {
                    required: true,
                    maxlength: 20,
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 50
                },
                mobile: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
                },
                dateOfBirth: {
                    required: true,
                    date: true
                },
                about_you: {
                    required: true,
                    maxlength: 250
                }
            },
            messages: {
                name: {
                    required: "Name is required",
                    maxlength: "Name cannot be more than 30 characters"
                },
                country: {
                    required: "Country is required",
                    maxlength: "Country cannot be more than 20 characters"
                },
                email: {
                    required: "Email is required",
                    email: "Email must be a valid email address",
                    maxlength: "Email cannot be more than 50 characters",
                },
                mobile: {
                    required: "Mobile number is required",
                    minlength: "Mobile number must be of 10 digits"
                },
                dateOfBirth: {
                    required: "Date of birth is required",
                    date: "Date of birth should be a valid date"
                },
                about_you: {
                    required: "About You is required",
                    maxlength: "About You not be more than 250 characters"
                }
            }
        });
    });
</script>
@endsection