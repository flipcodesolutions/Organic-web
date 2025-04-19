@extends('visitor.layouts.app')
@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center"
        style="background-color: blueviolet; height:638px">
        <div class="card h-70 w-50 p-5" style="background-color: white">
            <div class="loginwithmobile">
                <form>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Mobile number</label>
                        <input type="text" class="form-control" id="phone" name="phone" id="exampleInputEmail1"
                            aria-describedby="emailHelp" maxlength="10">
                        <span class="text-danger" id="phoneError"></span>
                    </div>

                    <div class="sendotp">
                        <button type="button" name="btnLogin" id="btnLogin" class="btn btn-primary w-100">Send
                            Otp</button>
                        <button class="btn btn-primary w-100" type="button" id="btnLogin2" disabled style="display: none">
                            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                            <span role="status">Sending Otp...</span>
                        </button>
                    </div>

                    <div class="verifyotp mt-2" style="display: none">
                        <label for="exampleInputEmail1" class="form-label">Enter Otp</label>
                        <input type="text" class="form-control" id="otp" name="otp" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <span class="text-danger" id="otpError"></span>

                        <button class="btn btn-success mt-3 w-100" id="verifyotp">Verify Otp</button>
                    </div>
                </form>
            </div>
            <div class="loginwithgmail">
                <hr class="sidebar-divider">
                <button class="btn btn-primary w-100" id="loginwithgoogle"><img
                        src="{{ asset('visitor/images/google-icon.jpg') }}" class="me-2" style="height: 30px">Login With
                    Google</button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $('form').submit(function(e) {
                e.preventDefault(); // Stops form from submitting normally
            });

            $("#btnLogin").click(function() {
                $("#phoneError").text("");

                var phone = $("#phone").val();

                const regex = /^[1-9]\d{9}$/;
                if (!phone) {
                    $("#phoneError").text("Phone number is required.");
                } else if (!regex.test(phone)) {
                    $("#phoneError").text("Phone number must be 10 digits.");
                } else {
                    $("#btnLogin").hide();
                    $("#btnLogin2").show();

                    $.post("{{ route('visitor.sendotp') }}", {
                        "_token": "{{ csrf_token() }}",
                        "phone": phone
                    }, function(response) {
                        if (response.status == true) {
                            console.log("OTP:", response.otp);
                            $('#btnLogin').text('Send OTP Again');
                            $("#btnLogin2").hide();
                            $("#btnLogin").show();
                            $('.verifyotp').show();
                        } else {
                            console.log("Unexpected response format.");
                        }
                    });
                }
            });

            $("#verifyotp").click(function() {
                $("#phoneError").text("");
                $("#otpError").text("");

                var phone = $("#phone").val();
                var otp = $("#otp").val();

                const regex = /^[1-9]\d{9}$/;
                const regex1 = /^[1-9]\d*$/;
                if (!phone) {
                    $("#phoneError").text("Phone number is required.");
                } else if (!regex.test(phone)) {
                    $("#phoneError").text("Phone number must be 10 digits.");
                } else if (!otp) {
                    $("#otpError").text("Otp is required.");
                } else if (!regex1.test(otp)) {
                    $("#otpError").text("Please enter a valid otp");
                } else {
                    $.post("{{ route('visitor.verifyotp') }}", {
                        "_token": "{{ csrf_token() }}",
                        "phone": phone,
                        "otp": otp
                    }, function(response) {
                        if (response.success == true) {
                            window.location.href = '/';
                        } else {
                            $("#otpError").text(response.message);
                        }
                    });
                }
            });

            // $("#loginwithgoogle").click(function(){
            //     $.get("{{ route('auth.google') }}");
            // });
            $("#loginwithgoogle").click(function() {
                window.location.href = "{{ route('auth.google') }}"; // Redirect to the Google OAuth route
            });
        })
    </script>
@endsection
