
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
            <form action="{{url('AddQuestion')}}" method="POST">
                @csrf
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add Question</h6>
                            <div class="form-floating mb-3">
                                <input type="text" name="question" class="form-control" id="floatingInput"
                                   required >
                                <label for="floatingInput">Question:</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="a" class="form-control" id="floatingInput"
                                    required>
                                <label for="floatingInput">A:</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="b" class="form-control" id="floatingInput"
                                  required  >
                                <label for="floatingInput">B:</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="c" class="form-control" id="floatingInput"
                                    required>
                                <label for="floatingInput">C:</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="d" class="form-control" id="floatingInput"
                                  required  >
                                <label for="floatingInput">D:</label>
                            </div>
                            
                           
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="answer" >
                                    <option selected disabled>Answer</option >
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                                <label for="floatingSelect">Answer</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="bank" >
                                    <option selected disabled>Select Bank</option >
                                        @foreach ($bank as $bk)
                                        <option value="{{$bk->id}}">{{$bk->name}}</option>
                                        @endforeach
                                </select>
                                <label for="floatingSelect">bank</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="marks" class="form-control" id="floatingInput"
                                  required  >
                                <label for="floatingInput">Marks:</label>
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
