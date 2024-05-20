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


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-solid fa-user fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Users</p>
                                <h6 class="mb-0">{{$usersCount}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-solid fa-building-columns fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Banks</p>
                                <h6 class="mb-0">{{$bankCount}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-solid fa-clipboard-question fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Questions</p>
                                <h6 class="mb-0">{{$questionCount}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-solid fa-square-poll-horizontal fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Result Average</p>
                                <h6 class="mb-0">{{number_format($averageScore, 2)}}%</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


       

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Result</h6>
                    </div>
                    <div class="table-responsive">
                        <table id="resultTable" class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">ID</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Percentage</th>
                                    <th scope="col">Bank</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach ($results as $res)
                                @php $name = \App\Models\bank::find($res?->bank)?->name; @endphp
                                <tr>
                                    <td>{{ $count++}}</td>
                                    <td>{{$res->user_name}}</td>
                                    <td>{{number_format($res->percentage,2)}}%</td>
                                    <td>{{$name}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Recent Sales End -->


            <!-- Widgets Start -->
            
@include('Admin.footer')
<script>
    $(document).ready(function() {
        $('#resultTable').DataTable();
    });
</script>