<main>
    <div class="form-wrapper">
        <div class="form">
            <h1>Register Account</h1>
            <form action="" class="wrapper-grid" method="post" enctype="multipart/form-data">
                <div class="box-col a">
                    <div class="nice-form-group">
                        <label for="firstname" class="required">Firstname</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" required placeholder="enter firstname">
                    </div>
                    <div class="nice-form-group">
                        <label for="lastname" class="required">Lastname</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" required placeholder="enter lastname">
                    </div>
                    <div class="nice-form-group">
                        <label for="category" class="required">Role</label>
                        <select name="role" id="roles" required class="form-control">
                            <option selected value="authenticated">Authenticated</option>
                        </select>
                    </div>
                    <div class="nice-form-group">
                        <label for="email" class="">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="enter email">
                    </div>
                </div>
                <div class="box-col b">
                    <div class="nice-form-group">
                        <label for="image" class="required">Profile Image</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                        <span>profile image</span>
                    </div>
                    <div class="nice-form-group">
                        <label for="password" class="required">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="enter password">
                    </div>
                    <div class="nice-form-group">
                        <label for="confirm-password" class="required">Confirm password</label>
                        <input type="password" name="confirm" id="confirm-password" class="form-control" placeholder="enter confirm password">
                    </div>
                    <div class="nice-form-group">
                        <input type="submit" name="user" class="submit" value="Register Account">
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>