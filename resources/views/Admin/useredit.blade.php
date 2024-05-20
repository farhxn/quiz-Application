@include('admin.header')
@include('admin.sidebar')

<div class="content">
    @include('admin.navbar')


    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form action="{{ url('UpdateUser', $users->id) }}" method="POST">
        @csrf

        <div class="container-fluid pt-4 px-1">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light rounded h-100 p-4">
                        <h3>Edit User</h3>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="form-floating mb-3">
                            <input type="hidden" name="id" value="{{ $users->id }}">
                            <input type="text" name="name" value="{{ $users->name }}" class="form-control" id="floatingInput">
                            <label for="floatingInput">Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" name="email" value="{{ $users->email }}" class="form-control" id="floatingA" placeholder="Option A">
                            <label for="floatingA">Email:</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" name="password" value="{{ $users->password }}" class="form-control" id="floatingB" placeholder="Option B">
                            <label for="floatingB">Password:</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="role" value="{{ $users->role }}" class="form-control" id="floatingB" placeholder="Option B">
                            <label for="floatingB">Role:</label>
                        </div>

                    

                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('admin.footer')
</div>
