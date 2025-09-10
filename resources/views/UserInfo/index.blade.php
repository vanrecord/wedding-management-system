<!DOCTYPE html>
<html>
<head>
    <title>All User Data</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;  /* center horizontally */
            align-items: center;      /* center vertically */
            background: #f9f9f9;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            margin: 0 auto; /* center the table inside container */
        }
        table th, table td {
            border: 1px solid #333;
            padding: 6px 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>All User Data</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Created</th>
            </tr>
            @foreach($user_infos as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->dob }}</td>
                <td>{{ ucfirst($user->gender) }}</td>
                <td>{{ $user->created_at }}</td>
            </tr>
            @endforeach
        </table>

        <br>
        <a href="javascript:history.back()">Back to Form</a>
    </div>
</body>
</html>
<label style=""></label>
