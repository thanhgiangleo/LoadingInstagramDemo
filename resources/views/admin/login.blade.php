<div class="container">
    <div class="card card-container">
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" method="POST" action="/login">
            {{ csrf_field() }}
            <span id="reauth-email" class="reauth-email"></span>
            <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->