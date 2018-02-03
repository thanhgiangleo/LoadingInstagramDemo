{{         trans('lang.failed') }}

@include("partials/head")

<body>
<div class="container-fluid">
    @include("partials.header")
    @include("partials.navigation")
    @include("partials.about")
    @include("admin.navigation")

    <style>
        .fake-a a:hover{
            cursor: pointer;
        }
    </style>
    <div class="w3-container" style="text-align: justify;">
        <table>
            <tr>
                <th>Url</th>
                <th>Category</th>
                <th>Create Date</th>
                <th>Option</th>
            </tr>

            @foreach($data as $item)
                <tr>
                    <?php $url = $_SERVER['HTTP_HOST'].'/'.config('app.locale').'/'. $item->slug;?>
                    <td><a href="<?php echo $url; ?>"><?php echo $url ?></a></td>
                    <td>{{ $item->cat_slug }}</td>
                    <td>{{ $item->create_date }}</td>
                    <td class="fake-a">
                        <a href="update/{{ $item->slug }}" >Edit</a>
                        <a id="slugDelete" onclick="deleteAction({{$item->slug}})" style="color: #007bff;">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

<div style="margin-top: 30px">
    {{--@include("partials.footer")--}}
</div>

@include("partials.endpage")
</body>
</html>

<script>
    function deleteAction(slug) {
        if (confirm('Are you sure you want to delete this post?')) {
            window.location.href = '/deletePostAction/' + slug;
        } else {
            // Do nothing!
        }
    }
</script>


