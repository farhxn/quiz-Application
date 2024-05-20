<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="assets/fonts/font.css">
    <link rel="stylesheet" href="../../../../cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/Bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/thankyou.css') }}">
    <link href="{{asset('admin/assets/img/logo1.jpg')}}" rel="icon">
</head>

<body>

    <main class="overflow-hidden">
        <div class="top_row sm-none">
            <div class="timer">
                <div class="timer-inner">
                    <div class="timer-count">
                        <span id="countdown-timer">60</span>
                        sec 
                    </div>
                </div>
            </div>

      
            <input type="hidden" value="{{ $totalMarks }}" name="mark"/>
        </div>
        <div class="bottom_row">
            <div class="container">
                <div class="wrapper">
                    <!-- form section -->
                    <form method="post" class="show-section">

                        <!-- step1 -->
                        <form method="post" action="{{ url('AdminNextQuestion') }}" class="show-section">
                            @csrf
                            @foreach ($questions as $question)
                      
                            <input type="hidden" value="{{ $question->marks }}" name="obmark"/>
                                <section class="steps" id="step{{ $loop->index + 1 }}">
                                    <!-- Question -->
                                    <div class="quiz-question" data-question="{{ $question->question }}">
                                        {{ $question->question }}
                                    </div>
                                    <input type="hidden" value="{{ $question->answer }}" name="ans"/>
                                    <input type="hidden" value="{{ session()->get('name') }}" name="name"/>
                                    <input type="hidden" value="{{ session()->get('id') }}" name="id"/>
                                    <input type="hidden" value="{{ $question->bank }}" name="bank"/>

                                    <!-- form -->
                                    <fieldset id="step{{ $loop->index + 1 }}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-field">
                                                    <div class="radio-field me-auto bounce-left delay-200">
                                                        <input type="checkbox" name="a"
                                                            value="A">
                                                        <label>{{ $question->a }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-field">
                                                    <div class="radio-field me-auto bounce-left delay-200">
                                                        <input type="checkbox" name="b"
                                                            value="B">
                                                        <label>{{ $question->b }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-field">
                                                    <div class="radio-field me-auto bounce-left delay-200">
                                                        <input type="checkbox" name="c"
                                                            value="C">
                                                        <label>{{ $question->c }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-field">
                                                    <div class="radio-field me-auto bounce-left delay-200">
                                                        <input type="checkbox" name="d"
                                                            value="D">
                                                        <label>{{ $question->d }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <!-- next previous -->
                                    <div class="next-prev">
                                        <button class="next" id="step{{ $loop->index + 1 }}btn"  type="button">next
                                            question<i class="fa-solid fa-arrow-right"></i></button>
                                    </div>
                                </section>
                                <input type="hidden" value="{{ $question->question }}" name="quest"/>
                                @endforeach

                        </form>
                </div>
            </div>
        </div>
        <!-- result -->
        <div class="loadingresult">
            <img src="assets/images/loading.gif" alt="loading" />
        </div>
        <div class="result_page">
            <div class="container">
                <div class="result_inner">
                    <!-- header -->
                    <header class="resultheader">
                        Your Result is there
                        <div class="h-border"></div>
                    </header>

                    <div class="result_content">
                        <div class="result_msg">
                            Wow! You are Brilliant!
                        </div>
                        <span>your overall score</span>
                        <div class="u_prcnt">70%</div>
                        <div class="prcnt_bar">
                            <div class="fill"></div>
                        </div>
                    </div>
                </div>

                <footer class="resultfooter"></footer>
            </div>
        </div>
        </div>

    </main>
    <div id="error"></div>

    <div id="error"></div>

    <!-- bootstrap 5 -->
    <script src="{{ asset('assets/js/Bootstrap/bootstrap.min.js') }}"></script>

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jQuery/jquery-3.6.3.min.js') }}"></script>

    <!-- Thankyou JS -->
    <script src="assets/js/thankyou.js"></script>

    <!-- Custom js -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

</html>
