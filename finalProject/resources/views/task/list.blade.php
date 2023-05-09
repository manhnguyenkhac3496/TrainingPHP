@section('listTask')
    <table id="task-list">
        <tr>
            <th>User Name</th>
            <th>Title</th>
            <th>Status</th>
            <th>Description</th>
            <th></th>
        </tr>
        @foreach ($taskList as $task)
            <tr>
                <td>{{ $task['user_name'] }}</td>
                <td>{{ $task['title'] }}</td>
                <@php
                    switch ($task['status']) {
                        case 1: {
                            echo "<td>Open</td>";
                            break;
                        }
                        case 2: {
                            echo "<td>In progress</td>";
                            break;
                        }
                        case 3: {
                            echo "<td>Complete</td>";
                            break;
                        }
                        default: {
                            echo "<td></td>";
                        }
                    }
                @endphp>
                <td>{{ $task['description'] }}</td>
                <td>
                    <button type="button" onclick="detailTask({{ $task['id'] }})">Detail</button>
                    <button type="button" onclick="updateTask({{ $task['id'] }})">Edit</button>
                    <button type="button" onclick="deleteTask({{ $task['id'] }})">Delete</button>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
