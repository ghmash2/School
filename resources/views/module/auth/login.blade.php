<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            <h1><i class="fas fa-graduation-cap"></i> Prestige University</h1>
            <p>Sign in to your account</p>
        </div>

        <div class="login-body">
            <!-- Error/Success Messages -->
            <div id="errorAlert" class="alert alert-error"></div>
            <div id="successAlert" class="alert alert-success"></div>

            <form id="loginForm" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            autofocus placeholder="Enter your email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" required
                            placeholder="Enter your password">
                    </div>
                </div>

                {{-- <div class="remember-forgot">
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="forgot-password">Forgot password?</a>
                </div> --}}

                <div class="form-buttons">

                    <button type="button" class="cancel-button" id="cancelButton"> <a href="{{ route('home') }}" style="color: rgb(0, 0, 0); text-decoration: none;">
                        <i class="fas fa-times"></i> Cancel
                    </a></button>

                    <button type="submit" class="login-button">
                        <i class="fas fa-sign-in-alt"></i> Sign In
                    </button>
                </div>
            </form>

            {{-- <div class="login-footer">
                <p>Don't have an account? <a href="{{ route('register') }}">Contact administration</a></p>
            </div> --}}
        </div>
    </div>

    <script>
        // Form submission handling
        document.getElementById('loginForm').addEventListener('submit', function(e) {
           // e.preventDefault(); 

            // Get form data
            const formData = new FormData(this);
            const submitButton = this.querySelector('button[type="submit"]');
            const cancelButton = document.getElementById('cancelButton');
            const originalButtonText = submitButton.innerHTML;

            // Show loading state
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Signing In...';
            submitButton.disabled = true;
            cancelButton.disabled = true;

            // Hide any previous alerts
            document.getElementById('errorAlert').style.display = 'none';
            document.getElementById('successAlert').style.display = 'none';

            // In a real application, this would be an AJAX call to your backend


        });

        // Cancel button functionality
        document.getElementById('cancelButton').addEventListener('click', function() {
            // Clear form fields
            document.getElementById('email').value = '';
            document.getElementById('password').value = '';

            // Hide any alerts
            document.getElementById('errorAlert').style.display = 'none';
            document.getElementById('successAlert').style.display = 'none';

            // Redirect to home page or previous page
            window.location.href = '/';
        });

        // Display validation errors if any (from server)
        @if ($errors->any())
            document.getElementById('errorAlert').textContent = '{{ $errors->first() }}';
            document.getElementById('errorAlert').style.display = 'block';
        @endif

        // Display success message if redirected after registration
        @if (session('status'))
            document.getElementById('successAlert').textContent = '{{ session('status') }}';
            document.getElementById('successAlert').style.display = 'block';
        @endif
    </script>
</body>

</html>
