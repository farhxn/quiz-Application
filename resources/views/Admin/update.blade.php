{{-- @include('Admin.header')
@include('Admin.sidebar')
<div class="content">
    @include('Admin.navbar')
    <form action="/update" method="post">
        @csrf
        <div class="container-fluid pt-4 px-1" id="{{$q->id}}">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Floating Label</h6>
                        <div class="form-floating mb-3">
                            <input type="hidden" name="id" value="{{$q->id}}">
                            <input type="text" name="question" value="{{$q->question}}" class="form-control" id="floatingInput">
                            <label for="floatingInput">Question</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="a" value="{{q->a}}" class="form-control" id="floatingPassword"
                                placeholder="Text">
                           <label for="floatingInput">A:</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="b" value="{{q->b}}" class="form-control" id="floatingPassword"
                                placeholder="Text">
                           <label for="floatingInput">B:</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="c" value="{{q->c}}" class="form-control" id="floatingPassword"
                                placeholder="Text">
                           <label for="floatingInput">C:</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="d" value="{{q->d}}" class="form-control" id="floatingPassword"
                                placeholder="Text">
                           <label for="floatingInput">D:</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select name="answer" value="{{q->answer}}" class="form-select" id="floatingSelect"
                                aria-label="Floating label select example">
                                <option selected>Answer</option>
                                <option  value="{{q->a}}">{{q->answer}}>A</option>
                                <option value="{{q->b}}">B</option>
                                <option value="{{q->c}}">C</option>
                                <option value="{{q->d}}">D</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @include('Admin.footer')
</div> --}}
