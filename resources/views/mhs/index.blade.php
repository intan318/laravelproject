<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8">
        <title> Index Blade </title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
            <div class="container">
        <br />
        @if (\Session::has('success'))
            <div class="alert alert-success">
            <p>{{ \Session::get('success')}}</p>
            </div><br />
        @endif

        <table class="table table-striped">
        <a href="{{asset('mhs/create')}}" class="btn btn-warning">Create</a>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                
            </tr>
        </thead>
        <tbody>
          @foreach($mhs as $mhs)
          <tr>
            <td>{{$mhs['id']}}</td>
            <td>{{$mhs['nim']}}</td>
            <td>{{$mhs['nama']}}</td>
            <td><a href="{{action('ProductController@edit', $mhs['id'])}}" class="btn btn-warning">Edit</a></td>
            <td>
                <form action="{{action('ProductController@destroy', $mhs['id'])}}" method="post">
                    {{csrf_field()}}
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>
 
    </div>
    </body>
</html>