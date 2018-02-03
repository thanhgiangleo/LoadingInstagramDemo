@include("partials/head")

<body>
<div class="container-fluid">
    @include("partials.header")
    @include("partials.navigation")
    @include("partials.about")

    <div class="w3-container" style="margin: 0 auto; text-align: justify;">
        <div id="container">
            <div id="content">
                <div id="main">
                    <div class="post">
                        <h2><a href="<?php echo config('app.locale') ?>/<?php echo $post->slug ?> ">{{ $post->title }}</a></h2>
                        <p class="date">18 <span>Jul</span></p>
                    </div>

                    <ul class="meta">
                        <li>Category : <a href="#">FOODIE</a></li>
                    </ul>

                    <div class="post-content">
                        <!--                --><?php //$post->des = substr($post->description,0,500) . "..."; ?>
                        <?php echo html_entity_decode($post->description) ?>
                    </div>

                    <hr style="display: block;margin-top: 0;margin-bottom: 0.1em;margin-left: auto;margin-right: auto;border-style: inset;border: 1px solid #000;">
                </div>
            </div>
        </div>

        <div class="w3-cell-row">
            <div class="w3-container w3-cell">
                <p class="prev">
                    <?php $url = $_SERVER['HTTP_HOST'] . '/' . config('app.locale') . '/' . $preUrl;?>
                    <a href="<?php echo $preUrl ?>">&#10094; OLDER POST</a>
                </p>
            </div>

            <div class="w3-container w3-cell">
                <p class="next">
                    <?php $url = $_SERVER['HTTP_HOST'] . '/' . config('app.locale') . '/' . $nextUrl;?>
                    <a href="<?php echo $nextUrl;?>">&#10095; NEXT POST</a>
                </p>
            </div>
        </div>
        @include("post-lists")
    </div>
</div>

<div style="margin-top: 30px">
    @include("partials.footer")
</div>

@include("partials.endpage")
</body>
</html>


