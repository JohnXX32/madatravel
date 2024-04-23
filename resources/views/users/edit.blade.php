<!DOCTYPE html>
<html>
<head>
    <title>Editer ici</title>
</head>
<body>

    <center>
    <section class="container mt-5">
        @if(session('success'))    
        <div class="alert alert-success" style="color:green">{{session('success')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                User Edit
            </div>
            <div class="card-body">
                <form action="{{ route('user.update',$data->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                            @error('name')<p class="text text-danger" style="color:red">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $data->email }}">
                            @error('email')<p class="text text-danger" style="color:red">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')<p class="text text-danger" style="color:red">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </form>
            </div>
            <div class="card-footer"></div>
        </div>
    </section>

    </center>

</body>
</html>