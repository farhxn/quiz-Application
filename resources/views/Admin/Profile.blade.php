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
                <div class="card-header">
                    <h3 class="mb-0">Profile Details</h3>
                    <p class="mb-0">
                        You have full control to manage your own account setting.
                    </p>
                </div>
                <div class="card-body">
                    <div>
                        <!-- Form -->
                        <form class="row gx-3" method="post" action="{{url('ProfileUpdate', $prof->id)}}">
                            @csrf
                            <!-- First name -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="fname"  >UserName</label>
                                <input type="text" id="fname" name="name" class="form-control" value="{{ $prof->name }}">
                            </div>
                          
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="email">Email</label>
                                <input type="text" id="email" name="email" value="{{ $prof->email }}" class="form-control">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="password">Change Password</label>
                                <input type="text" id="password" name="password" value="{{ $prof->password }}" class="form-control">
                            </div>
                            
                            <div class="col-12">
                                <!-- Button -->
                                <button class="btn btn-primary" type="submit">
                                    Update Profile
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


       



            <!-- Widgets Start -->
            
@include('Admin.footer')