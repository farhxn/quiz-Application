<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .question {
            margin-bottom: 15px;
        }
        .correct-answer {
            color: green;
        }
        .user-answer {
            color: blue;
        }
    </style>
</head>
<body>
    <h1>Quiz Results</h1>
    @foreach ($data as $index => $item)
        <div class="question">
            <p><strong>Question {{ $index + 1 }}:</strong> {{ $item['question'] }}</p>
            @php
            $question = \App\Models\QuizQuestions::where('question', $item['question'])->first();
            $correctAnswerValue = '';
            $userAnswerValue = '';

            if ($question) {
                switch ($item['correctAnswer']) {
                    case 'A':
                        $correctAnswerValue = $question->a;
                        break;
                    case 'B':
                        $correctAnswerValue = $question->b;
                        break;
                    case 'C':
                        $correctAnswerValue = $question->c;
                        break;
                    case 'D':
                        $correctAnswerValue = $question->d;
                        break;
                }

                switch ($item['userAnswer']) {
                    case 'A':
                        $userAnswerValue = $question->a;
                        break;
                    case 'B':
                        $userAnswerValue = $question->b;
                        break;
                    case 'C':
                        $userAnswerValue = $question->c;
                        break;
                    case 'D':
                        $userAnswerValue = $question->d;
                        break;
                }
            }
        @endphp
            <p><strong>Correct Answer:</strong> <span class="correct-answer">{{ $correctAnswerValue }}</span></p>
            <p><strong>Your Answer:</strong> <span class="user-answer">{{ $userAnswerValue }}</span></p>
        </div>
    @endforeach
</body>
</html>
