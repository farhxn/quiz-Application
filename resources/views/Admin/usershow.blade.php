@include('Admin.header')
<!-- Spinner End -->

<!-- Sidebar Start -->
@include('Admin.sidebar')
<!-- Sidebar End -->

<!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    @include('Admin.navbar')
    <!-- Navbar End -->


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Show User Detail</h6>
                            <div class="table-responsive">
                                <table id="userTable" class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Password</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $count = 1;
                                        @endphp
                                        @foreach ($users as $us)
                                        <tr>
                                            <th>{{ $count++ }}</th>
                                            <td>{{$us->name}}</td>
                                            <td>{{$us->email}}</td>
                                            <td>{{$us->password}}</td>
                                            <td>{{$us->role}}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Question Actions">
                                                    <a href="{{ url('EditUser', $us->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                                    
                                                    <!-- Add space between the buttons -->
                                                    <span style="margin-left: 5px;"></span>
                                                    
                                                    <form action="{{ url('DeleteUser', $us->id) }}" method="get" onsubmit="return confirm('Are you sure you want to delete this question?')">
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Table End -->


            <!-- Footer Start -->
         @include('Admin.footer')
            <!-- Footer End -->
        </div>
        <script>
            $(document).ready(function() {
                $('#userTable').DataTable();
            });
        </script>
    </div>

    