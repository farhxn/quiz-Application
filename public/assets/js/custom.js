var totalcount = 0;
var totalQues = 0;
var userName = "";
var userId = "";
var bankName = "";
let questionsArray = [];
let userAnswersArray = [];
let correctAnswersArray = [];
var selectedValue = "";
var question = "";

$(document).ready(function() {

    totalQues = parseInt($('input[name="mark"]').val(),10);
    console.log("question mark "+totalQues);
    var divs = $('.show-section section');
    var now = 0; // currently shown div
    divs.hide().first().show(); // hide all divs except first   


        $(".next").on('click', function(event) {
            event.preventDefault();
            var currentStep = now + 1;
            var checkedRadio = radiovalidate(currentStep);
            userName = $('input[name="name"]').val();
            userId = $('input[name="id"]').val();
            bankName = $('input[name="bank"]').val();  


            if (!checkedRadio) {
                $('#error').empty().append('<div class="reveal alert alert-danger">Choose one option!</div>');
                setTimeout(function() {
                    $('#error .reveal').remove();
                }, 3000);
            } else {
                var Answer = $('input[name="ans"]').val();
                var question = $('input[name="quest"]:eq(' + now + ')').val(); // Capture the question for the current step

                
                $('input[type="checkbox"]').each(function() {
                    if ($(this).is(":checked")) {
                        selectedValue = $(this).val();
                    }

                    if ($(this).val() == Answer) {
                        {
                            $(this).addClass('correct-answer');
                        }
                } 
                });
        
            
                 console.log('Selected value:', selectedValue);
                 if (selectedValue === Answer) {
                    totalcount+=parseInt($('input[name="obmark"]').val(),10);
                }


                questionsArray.push(question);
                userAnswersArray.push(selectedValue);
                correctAnswersArray.push(Answer);

            console.log(questionsArray );
             console.log('Total count of correct answers:', totalcount);

            setTimeout(function() {
                $('#step' + currentStep + ' .radio-field').removeClass('bounce-left').addClass('bounce-right');
            }, 200);

            setTimeout(function() {
                next();
            }, 900);
        }
    });


    
    $('form').on('submit', function(e) {
        e.preventDefault();
    });
    
    function next() {
        $('.show-section section').eq(now).hide();
        now++;
        if (now < divs.length) {
            $('.show-section section').eq(now).show();
        } else {
            console.log(totalQues)
            showresult();
        }
    }

    function showResultPage() {
        $('.main-container main').hide();
        $('.thankyou-page').show();
    }

    $('.thankyou-page').hide();

    var count = 60;
    var interval = setInterval(function() {
        if (count === 0) {
            clearInterval(interval);
            showresult();
        } else {
            count--;
        }
        document.getElementById("countdown-timer").innerHTML = count;
    }, 1000);

    function radiovalidate(stepnumber) {
        var checkedCheckboxes = $("#step" + stepnumber + " input[type='checkbox']:checked").length;
        return checkedCheckboxes === 1;
    }
    
 
    
});

var percent;

function showresult() {
    console.log(totalQues )
    percent = (totalcount / totalQues) * 100;
    console.log(percent + "%"); // Display the percentage
    
    $(".u_prcnt").text(percent.toFixed(2) + "%");
    if (percent >= 90) {
        message = "Wow! You are Brilliant!";
    } else if (percent >= 70) {
        message = "Great job!";
    } else if (percent >= 50) {
        message = "Good effort!";
    } else {
        message = "Keep practicing!";
    }
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
        url: '/saveAttemptQuiz', // Replace with your server endpoint
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
        },
        data: {
            questions: questionsArray,
            userAnswers: userAnswersArray,
            correctAnswers: correctAnswersArray,
            bank : bankName,
        },
        success: function(response) {
            if (response.pdf_url) {
                // Open the PDF in a new tab
                var pdfWindow = window.open(response.pdf_url, '_blank');
                // pdfWindow.focus();
            } else {
                console.error('PDF URL not found in response');
            }
    
            console.log('Data saved successfully:', response);
        },
        error: function(xhr, status, error) {
            console.error('Error saving data:', error);
        }
    });


    
    $.ajax({
        url: '/storepercentage',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
        },
        data: {
            user_id: userId,
            user_name: userName,
            percentage: percent,
            bank: bankName
        },
        success: function(response) {
            console.log('Percentage data stored successfully');
        },
        error: function(xhr, status, error) {
            console.error('Error storing percentage data:', error);
        }
    });

    // Display the message in the div with class "result_msg"
    $(".result_msg").text(message);
    
    $(".loadingresult").css("display", "grid");
    
    setTimeout(function () {
      $(".result_page").addClass("result_page_show");
    }, 1000);
  }