<div class="modal fade text-dark" id="signupmodal" tabindex="-1" aria-labelledby="signupmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="signupmodalLabel">Sign-Up : iDiscuss</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="partials/signinhandler.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="username" class="form-label">Enter Username</label>
                        <input required name="username" type="username" maxlength="25" class="form-control" id="username"
                            aria-describedby="username">
                    </div>
                    <div class="mb-3">
                        <label for="usermail" class="form-label">Enter Email id</label>
                        <input required name="usermail" type="Email" maxlength="50" class="form-control" id="usermail"
                            aria-describedby="usermail">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Enter Password</label>
                        <input required name="password" type="password" maxlength="23" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Re-Enter Password</label>
                        <input required name="cpassword" type="password" maxlength="23" class="form-control"
                            id="cpassword">
                        <div class="form-text">We'll keep your info secure</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Account</button>
                </div>
            </form>
        </div>
    </div>
</div>