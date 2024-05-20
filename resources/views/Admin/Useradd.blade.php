@include('Admin.header')


<!-- Sidebar Start -->
@include('Admin.sidebar')
<!-- Sidebar End -->


<!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    @include('Admin.navbar')
    <!-- Navbar End -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Form Start -->
    <form action="{{ url('AddUser') }}" method="POST">
        @csrf
        <div class="container-fluid pt-4 px-4">
            <div class="row ">
                <div class="col">
                    <div class="bg-light rounded h-100 p-5">
                        <h6 class="mb-4">Add User</h6>
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="floatingInput" required>
                            <label for="floatingInput">Name:</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="email" class="form-control" id="floatingInput" required>
                            <label for="floatingInput">Email:</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="password" class="form-control" id="floatingInput">
                            <label for="floatingInput">Password:</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="role">
                                <option value="user" selected>User</option>
                                <option value="admin">Admin</option>
                            </select>
                            <label for="floatingSelect">Answer</label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </form>
    <!-- Form End -->


    <!-- Footer Start -->
    @include('Admin.footer')
    <!-- Footer End -->
</div>
<!-- Content End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
