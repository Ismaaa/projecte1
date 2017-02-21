<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<style>
    table, td, th {
        border: 1px solid #ddd;
        text-align: left;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        font-size: 10px;
    }

    th, td {
        padding: 15px;
    }
</style>

</head>
<body>
<div class="jumbotron">
    <h3>Exportació dels usuaris a format PDF</h3>
</div>
<table class="table table-responsive">

    <tr>
        <th>Nom</th>
        <th>Cognoms</th>
        <th>DNI</th>
        <th>E-mail</th>
        <th>Població</th>
        <th>Adreça</th>
        <th>Telèfon</th>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->surnames }}</td>
            <td>{{ $user->dni }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->city }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->phone }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>