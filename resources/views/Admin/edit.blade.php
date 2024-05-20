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
    <form action="{{ url('QuestionUpdate', $question->id) }}" method="POST">
        @csrf

        <div class="container-fluid pt-4 px-1">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light rounded h-100 p-4">
                        <h3>Edit Question</h3>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="form-floating mb-3">
                            <input type="hidden" name="id" value="{{ $question->id }}">
                            <input type="text" name="question" value="{{ $question->question }}" class="form-control" id="floatingInput">
                            <label for="floatingInput">Question</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="a" value="{{ $question->a }}" class="form-control" id="floatingA" placeholder="Option A">
                            <label for="floatingA">A:</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="b" value="{{ $question->b }}" class="form-control" id="floatingB" placeholder="Option B">
                            <label for="floatingB">B:</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="c" value="{{ $question->c }}" class="form-control" id="floatingC" placeholder="Option C">
                            <label for="floatingC">C:</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="d" value="{{ $question->d }}" class="form-control" id="floatingD" placeholder="Option D">
                            <label for="floatingD">D:</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select name="answer" class="form-select" id="floatingSelect" aria-label="Select correct answer">
                                <option value="A" {{ $question->answer == $question->a ? 'selected' : '' }}>A</option>
                                <option value="B" {{ $question->answer == $question->b ? 'selected' : '' }}>B</option>
                                <option value="c"  {{ $question->answer == $question->c ? 'selected' : '' }}>C</option>
                                <option value="D" {{ $question->answer == $question->d ? 'selected' : '' }}>D</option>
                            </select>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect"
                                aria-label="Floating label select example" name="bank" >
                                <option selected disabled>Select Bank</option >
                                    @foreach ($bank as $bk)
                                    <option {{ $bk->id == $question?->bank ? 'selected' : '' }} value="{{$bk->id}}">{{$bk->name}}</option>
                                    @endforeach
                            </select>
                            <label for="floatingSelect">bank</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="marks" value="{{ $question->marks }}" class="form-control" id="floatingD" placeholder="Option D">
                            <label for="floatingD">Marks:</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('admin.footer')
</div>
