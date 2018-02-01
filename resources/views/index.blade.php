@include("partials/head")

<body>
    <div class="container-fluid">
        @include("partials.header")
        @include("partials.navigation")
        @include("partials.about")

        <div class="w3-container" style="margin: 0 auto; text-align: justify;">
            {{--@include("post-details")--}}
            @include("post-lists")
        </div>
    </div>

    <div style="margin-top: 30px">
        @include("partials.footer")
    </div>

    @include("partials.endpage")
</body>
</html>
