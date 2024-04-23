<!DOCTYPE html>
<html>
<head>
    <title>Index ici</title>
</head>
<body>
    <center>
    <section class="container mt-5">
        @if(session('success'))    
        <div class="alert alert-success" style="color:green">{{session('success')}}</div>
        @endif

            <table border="1" style="width:100%">
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                @for($i=0; $i < sizeof($data); $i++)
                <tr>
                    <th scope="row">{{ $i + 1 }}</th>    
                    <td>{{ $data[$i]->name }}</td>
                    <td>{{ $data[$i]->email }}</td>
                    <td><a href="{{ route('user.edit',$data[$i]->id) }}" class="btn btn-secondary" style="color:green">Edit</a>
                    <a href="{{ route('user.show',$data[$i]->id) }}" class="btn btn-danger" style="color:red">Delete</a></td>
                @endfor
                </tr>
            </table>
    </section>

    </center>

</body>
</html>