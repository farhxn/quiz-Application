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
                            <h6 class="mb-4">Show Bank Details</h6>
                            <div class="table-responsive">
                                <table id="bankTable" class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $count = 1;
                                        @endphp
                                        @foreach ($bank as $b)
                                        <tr>
                                            <th>{{ $count++ }}</th>
                                            <td>{{$b->name}}</td>
                                            <td>{{$b->status==1?"Open":"Close"}}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Question Actions">
                                                    <a href="{{ url('editBank', $b->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                                    
                                                    <!-- Add space between the buttons -->
                                                    <span style="margin-left: 5px;"></span>
                                                    
                                                    <form action="{{ url('DeleteBank', $b->id) }}" method="get" onsubmit="return confirm('Are you sure you want to delete this question?')">
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
         <script>
            $(document).ready(function() {
                $('#bankTable').DataTable();
            });
        </script>
            <!-- Footer End -->
        </div>
    </div>

    