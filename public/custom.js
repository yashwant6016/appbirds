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