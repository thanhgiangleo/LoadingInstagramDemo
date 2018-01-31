{{         trans('lang.failed') }}

<table>
    <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Link</th>
        <th>Day</th>
        <th>Month</th>
        <th>Year</th>
        <th>Option</th>
    </tr>

    @foreach($data as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->image }}</td>
            <td>{{ $item->link }}</td>
            <td>{{ $item->day }}</td>
            <td>{{ $item->month }}</td>
            <td>{{ $item->year }}</td>
            <td>
                <a href="instagram/update/{{ $item->id }}" >Edit</a>
                <a href="deleteInstagramAction/{{ $item->id }}" target="_blank">Delete</a>
            </td>
        </tr>
    @endforeach
</table>