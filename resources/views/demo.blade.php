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
<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Action</th>
</tr>

@foreach($users as $user)

<tr>
    <td>{{ $user->id }}</td>

    <td>
        <form method="POST" action="/users/{{ $user->id }}">
            @csrf
            @method('DELETE')
            <input type="text" name="name" value="{{ $user->name }}">
            <button type="submit">Delete</button>
        </form>
    </td>
</tr>

@endforeach

</table>

</body>
</html>