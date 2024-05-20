
    @include('Admin.header')

    @include('Admin.sidebar')

    <div class="content">
        @include('Admin.navbar')

        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Show Questions</h6>
                        <div class="table-responsive">
                            <table id="questionsTable" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">A</th>
                                        <th scope="col">B</th>
                                        <th scope="col">C</th>
                                        <th scope="col">D</th>
                                        <th scope="col">Answer</th>
                                        <th scope="col">Marks</th>
                                        <th scope="col">Bank</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count = 1; @endphp
                                    @foreach ($questions as $ques)
                                        @php $name = \App\Models\bank::find($ques?->bank)?->name; @endphp
                                        <tr>
                                            <th>{{ $count++ }}</th>
                                            <th>{{ $ques->question }}</th>
                                            <td>{{ $ques->a }}</td>
                                            <td>{{ $ques->b }}</td>
                                            <td>{{ $ques->c }}</td>
                                            <td>{{ $ques->d }}</td>
                                            <td>{{ $ques->answer }}</td>
                                            <td>{{ $ques->marks }}</td>
                                            <td>{{ $name }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Question Actions">
                                                    <a href="{{ url('QuestionEdit', $ques->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                                    
                                                    <!-- Add space between the buttons -->
                                                    <span style="margin-left: 5px;"></span>
                                                    
                                                    <form action="{{ url('QuestionDelete', $ques->id) }}" method="get" onsubmit="return confirm('Are you sure you want to delete this question?')">
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

        @include('Admin.footer')
    </div>

    <script>
        $(document).ready(function() {
            $('#questionsTable').DataTable();
        });
    </script>

</body>

</html>
