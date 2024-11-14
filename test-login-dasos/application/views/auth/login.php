<div class="card shadow" style="width: 100%; max-width: 400px;">
    <div class="card-body">
        <div id="general-error" class="alert alert-danger alert-dismissible fade d-none show" role="alert">
        </div>
        <h3 class="text-center mb-4">Log In</h3>
        <form id="login-form" action="/login" method="POST">
            <div class=" mt-3">
                <label class="form-label" for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
                <div id="email-error" class="invalid-feedback"> </div>
            </div>
            <div class=" mt-3">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                <div id="password-error" class="invalid-feedback"> </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-4">Log In</button>
            <p class="text-center mt-3">
                <small>Don't have an account? <a href="/register">Register here</a></small>
            </p>
        </form>
    </div>
</div>