{{-- <!-- Login/Register Modal -->
<div class="modal fade" id="authModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content p-4">
            <div class="modal-body">

                <!-- Step 1: Login Form -->
                <div id="step1">
                    <h5 class="mb-3">Login</h5>
                    <label class="mb-2" for="">Login with Mobile Number </label>
                    <input type="text" class="form-control mb-3" id="loginIdentifier" placeholder="Email or Mobile">
                    <button class="btn btn-primary w-100" onclick="checkUser()">Send OTP</button>
                    <hr class="sidebar-divider">
                    <a href="">
                        <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
                    </a>
                </div>

                <!-- Step 2: Register - User Details -->
                <div id="step2" class="d-none">
                    <h5 class="mb-3">Tell us about you</h5>
                    <input type="text" class="form-control mb-2" id="regName" placeholder="Full Name">
                    <input type="email" class="form-control mb-2" id="regEmail" placeholder="Email">
                    <input type="text" class="form-control mb-2" id="regMobile" placeholder="Mobile">
                    <button class="btn btn-primary w-100" onclick="showStep(3)">Continue</button>
                </div>

                <!-- Step 3: Address Details -->
                <div id="step3" class="d-none">
                    <h5 class="mb-3">Your Address</h5>
                    <input type="text" class="form-control mb-2" id="addressLine1" placeholder="Address Line 1">
                    <input type="text" class="form-control mb-2" id="addressLine2" placeholder="Address Line 2">
                    <input type="text" class="form-control mb-2" id="city" placeholder="City">
                    <input type="text" class="form-control mb-2" id="landmark" placeholder="Landmark">
                    <input type="text" class="form-control mb-2" id="pincode" placeholder="Pincode">
                    <button class="btn btn-success w-100" onclick="registerUser()">Submit</button>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    function showStep(step) {
        $('#step1, #step2, #step3').addClass('d-none');
        $(`#step${step}`).removeClass('d-none');
    }

    // Step 1 - Check if user exists
    function checkUser() {
        const identifier = $('#loginIdentifier').val();
        if (!identifier) {
            alert('Please enter your email or mobile number.');
            return;
        }

        $.post("{{ route('visitor.login') }}", {
            _token: '{{ csrf_token() }}',
            identifier: identifier
        }, function(response) {
            if (response.exists) {
                window.location.href = "{{ route('home') }}";
            } else {
                // Pre-fill based on input
                $('#regEmail').val(identifier.includes('@') ? identifier : '');
                $('#regMobile').val(!identifier.includes('@') ? identifier : '');
                showStep(2);
            }
        });
    }

    // Final Step - Register user
    function registerUser() {
        const data = {
            _token: '{{ csrf_token() }}',
            name: $('#regName').val(),
            email: $('#regEmail').val(),
            mobile: $('#regMobile').val(),
            addressLine1: $('#addressLine1').val(),
            addressLine2: $('#addressLine2').val(),
            city: $('#city').val(),
            landmark: $('#landmark').val(),
            pincode: $('#pincode').val(),
        };

        // Simple validation
        if (!data.name || !data.email || !data.mobile || !data.addressLine1 || !data.city || !data.pincode) {
            alert("Please fill all required fields.");
            return;
        }

        $.post("{{ route('visitor.register') }}", data, function(response) {
            if (response.success) {
                window.location.href = "{{ route('home') }}";
            } else {
                alert(response.message || "Something went wrong. Please try again.");
            }
        });
    }

    // Google Sign-In
    $(document).on('click', '#googleLoginBtn', function(e) {
        e.preventDefault();
        window.location.href = "{{ route('google.redirect') }}";
    });
</script>
 --}}
