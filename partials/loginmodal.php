<!-- Modal -->
<div class="modal fade text-dark" id="loginmodal" tabindex="-1" aria-labelledby="loginmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="loginmodalLabel">Login - iDiscuss</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="partials/loginhandler.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="usermail" class="form-label">Username</label>
                        <input required name="username" type="text" class="form-control" id="username"
                            aria-describedby="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input required name="userpassword" type="password" class="form-control" id="userpassword">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>