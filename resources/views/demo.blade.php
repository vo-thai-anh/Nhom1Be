<!DOCTYPE html>
<html>
<head>
    <title>CRUD Users</title>
</head>

<body>

<h2>CRUD Users</h2>

<form method="POST" action="/users">
    @csrf
    <input type="text" name="name" placeholder="Nhập tên">
    <button type="submit">Thêm</button>
</form>

<br>

<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Action</th>
</tr>

@foreach($users as $user)

<tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>

    <td>
        <form method="POST" action="/users/{{ $user->id }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </td>
</tr>

@endforeach

</table>

</body>
</html>