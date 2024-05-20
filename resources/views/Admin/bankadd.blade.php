
@include('Admin.header')


        <!-- Sidebar Start -->
 @include('Admin.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
           @include('Admin.navbar')
            <!-- Navbar End -->


            <!-- Form Start -->
            <form action="{{url('AddBank')}}" method="POST">
                @csrf
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add Bank</h6>
                            <div class="form-floating mb-3">
                                <input type="text" name="name" class="form-control" id="floatingInput"
                                   required >
                                <label for="floatingInput">Name:</label>
                            </div>
                           
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="status" >
                                    <option selected value="1">Open</option >
                                    <option value="0">Close</option>
                            
                                </select>
                                <label for="floatingSelect">Status</label>
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
