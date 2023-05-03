<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    .button-3 {
        margin-top: 30px;
        appearance: none;
        background-color: #2ea44f;
        border: 1px solid rgba(27, 31, 35, .15);
        border-radius: 6px;
        box-shadow: rgba(27, 31, 35, .1) 0 1px 0;
        box-sizing: border-box;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        font-family: -apple-system,system-ui,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji";
        font-size: 14px;
        font-weight: 600;
        line-height: 20px;
        padding: 6px 16px;
        position: relative;
        text-align: center;
        text-decoration: none;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        vertical-align: middle;
        white-space: nowrap;
    }

    .button-3:focus:not(:focus-visible):not(.focus-visible) {
        box-shadow: none;
        outline: none;
    }

    .button-3:hover {
        background-color: #2c974b;
    }

    .button-3:focus {
        box-shadow: rgba(46, 164, 79, .4) 0 0 0 3px;
        outline: none;
    }

    .button-3:disabled {
        background-color: #94d3a2;
        border-color: rgba(27, 31, 35, .1);
        color: rgba(255, 255, 255, .8);
        cursor: default;
    }

    .button-3:active {
        background-color: #298e46;
        box-shadow: rgba(20, 70, 32, .2) 0 1px 0 inset;
    }

    .paging {
        text-align: right;
        margin-right: 30px;
        margin-top: 15px;
    }

    ul li {
        display: inline;
    }
</style>
</head>

<title>
    List Task
</title>
<body>
    <form action="{{route('exportCsv')}}" method="post">
        @csrf
        <table>
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

        <div id="pagination" class="paging">
            <nav aria-label="Page navigation example">
                <ul style="list-style-type: none; color: #0a53be;">
                    <span id="pageCurrent" style="color: #2c974b"><b>Page: 3, Total: {{$total}}</b></span>
                    <li><a class="page-link" href="#" onclick="paging(1, 4)">Previous</a></li>
                    @for($i = 0; $i < $pageCount; $i++)
                        @if($i <= 2)
                            <li><a class="page-link" href="#">{{$i+1}}</a></li>
                        @endif
                        @if($i > 2)
                            <span style="color: #0a53be">...</span>
                            @break;
                        @endif
                    @endfor
                    <li><a class="page-link" href="#">Last</a></li>
                    <li><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>

            <select id="recordsPerPage">
                <option value="3">3 record/page</option>
                <option value="5">5 record/page</option>
                <option value="10" selected>10 record/page</option>
            </select>
        </div>

        <button class="button-3" type="submit">Export CSV</button>
        <input class="button-3" type="button" onclick="addTask()" value="New Task"></input>
    </form>
<script type="text/javascript">
    function addTask() {
        window.location.href = '{{ route('addTaskForm') }}';
    }

    function deleteTask(id) {
        if(confirm("Are you sure, id: "  + id))
        {
            $.ajax({
                url: "{{ route('deleteTask', ['id' => ':id']) }}".replace(':id', id),
                type: "DELETE",
                data: {},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function() {
                    alert("Task has been deleted.");
                    location.reload();
                },
                error: function() {
                    alert("Delete error!");
                }
            });
        }
    }

    function updateTask(id) {
        window.location.href = '{{ route('updateTaskForm', ['id' => ':id']) }}'.replace(':id', id);
    }

    function detailTask(id) {
        window.location.href = '{{ route('detail', ['id' => ':id']) }}'.replace(':id', id);
    }

    function paging(page, limit) {
        $.ajax({
            url: "{{ route('listpage') }}",
            type: "POST",
            data: {
                'page': page,
                'limit': limit
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            error: function() {
                alert("error!");
            }
        });
    }
</script>
</body>
</html>
