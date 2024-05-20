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
    <form action="{{ url('UpdateBank', $bank->id) }}" method="POST">
        @csrf

        <div class="container-fluid pt-4 px-1">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light rounded h-100 p-4">
                        <h3>Edit Bank</h3>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="form-floating mb-3">
                            <input type="hidden" name="id" value="{{ $bank->id }}">
                            <input type="text" name="name" value="{{ $bank->name }}" class="form-control" id="floatingInput">
                            <label for="floatingInput">Name:</label>
                        </div>

                          
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect"
                            aria-label="Floating label select example" name="status" >
                                
                                <option {{ $bank->status == 1 ? 'selected' : '' }} value="1" >Open</option >
                                <option {{ $bank->status == 0 ? 'selected' : '' }} value="0">Close</option>
                        
                            </select>
                            <label for="floatingSelect">Status</label>
                        </div>
                        

                    

                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('admin.footer')
</div>
