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

    <div class="w3-container" style="margin: 0 auto; text-align: justify;">
        <table>
            <tr>
                <th>Image</th>
                <th>Link</th>
                <th>Time</th>
                <th>Option</th>
            </tr>

            @foreach($data as $item)
                <tr>
                    <td><img src="{{ $item->image }}" style="width: 200px"> </td>
                    <td>{{ $item->link }}</td>
                    <td>{{ $item->day . '/' . $item->month . '/' . $item->year }}</td>
                    <td class="fake-a">
                        <a href="update/{{ $item->id }}" >Edit</a>
                        <a id="idDelete" onclick="deleteAction({{$item->id}})" style="color: #007bff;">Delete</a>
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
    function deleteAction(id) {
        if (confirm('Are you sure you want to delete this post?')) {
            window.location.href = '/deleteInstagramAction/' + id;
        } else {
            // Do nothing!
        }
    }
</script>




