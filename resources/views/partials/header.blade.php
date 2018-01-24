<div class="header-wrapper">
    <div class="container" style="margin-bottom: 5px;">
        <div class="row">
            <div class="col-lg-3 col-xl-3 col-md-6 col-xs-6 col-sm-6">
                <div class="subscribe">
                    <p>SUBSCRIBE</p>
                    <input type="email" placeholder="Your Email" /><br>
                    <input type="button" value="Yes, I'm in" /><br>
                    <form action="">
                        <input type="radio" name="lang" value="english">
                        <img src="{{ asset("images/uk.png") }}">
                        English
                        <input type="radio" name="lang" value="thailand">
                        <img src="{{ asset("images/thailand.png") }}">
                        Thailand<br>
                    </form>
                    <br>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6 col-md-6 col-xs-6 col-sm-6">
                <div id="logo">
                    <img src="{{ asset("images/logo.png") }}">
                </div>
            </div>
            <div class="col-lg-3 col-xl-3 hidden-md hidden-sm hidden-xs">
                <div class="social">
                    <form action="mailto:">
                        <button>
                            <span class="icon icon-envelope"> Email me</span>
                        </button>
                    </form>
                    <br>
                    <a href="#">
                        <span id="span-social" class="icon icon-instagram"></span>
                    </a>
                    <a href="#">
                        <span id="span-social" class="icon icon-facebook"></span>
                    </a>
                    <a href="#">
                        <span id="span-social" class="icon icon-youtube-sign"></span>
                    </a>
                    <br>

                    <form action="" role="search" class="search-form">
                        <input type="submit" value="" class="search-submit">
                        <input type="search" name="q" class="search-text" placeholder="Search..." autocomplete="off">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>