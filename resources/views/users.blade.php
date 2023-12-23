<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>maged</h2>
    <table >
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Block</th>
            <th>Unblock</th>

          </tr>
        </thead>

        <tbody>
          @foreach ($customerUsers as $customer)
          <tr>
            <td>{{$customer->id}}</td>
            <td>{{$customer->name}}</td>
            <td>{{$customer->email}}</td>

            <td>
                <form method="post" action="{{ route('user.block', ['id' => $customer->id]) }}">
                    @csrf
                    <button type="submit">Block</button>
                </form>
            </td>
            <td>
                <form method="post" action="{{ route('user.unblock', ['id' => $customer->id]) }}">
                    @csrf
                    <button type="submit">Unblock</button>
                </form>
            </td>
              </form>
          </td>
          </tr>
              
          @endforeach
        </tbody>
      </table>

</body>
</html>