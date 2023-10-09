<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

  <h2 class="header">User Details</h2>
<table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
    <thead>
    <tr style="background-color: #f2f2f2;">
        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Name</th>
        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Email</th>
        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Phone</th>
        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Code</th>
        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Status</th>
    </tr>
    </thead>
    <tbody>
    @if($users->isNotEmpty())
        @foreach($users as $user)
            <tr style="border: 1px solid #ddd;">
                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{$user->name}}</td>
                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $user->email }}</td>
                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $user->phone }}</td>
                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $user->code }}</td>
                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $user->status }}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
</body>
<style>
    .header {
        text-align: center;
        padding-bottom: 3px;
    }
</style>
</html>
