<!-- add_admin.php is the file that receives information from user and
sends data to database 'quizzer'
 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href=" styles/add_admin_style.css" rel="stylesheet" type="text/css">
</head>


<body>
    <div class="main_container">
        <div class="inner_container">
            <form method="post" action="add.php">
                <p>Practice test number</p>
                <input type="text" name="input_practice_test_number"></input>
                <p>Text</p>
                <textarea id="text" name="text"></textarea>
                <div id="question-container" class="question-container">
                    <p>Question 1</p>
                    <input type="text" name="question_number_1"></input>
                    <p>Choice 1 </p>
                    <input type="text" name="question_1_choice_1"></input>
                    <input id="correct" type="radio" value="Correct" name="question_1_choice_1_cow"> Correct</input>
                    <input id="wrong" type="radio" value="Wrong" name="question_1_choice_1_cow"> Wrong</input>
                </div>
                <div class="buttons_container">
                    <input class="button" onclick="addQuestion();" type="button" value="QUESTION + ">
                    <input class="button" onclick="addChoice();" type="button" value="CHOICE+">
                    <input class="button" class="submit_button" type="submit" value="ADD+">
                </div>
            </form>
        </div>
    </div>


    <!-- we write a script to dynamically set qystions and choices -->
    <script>
    let q = 2;
    let c = 1;
    let ptr = c;
    qptr = q;

    function addQuestion() {
        ptr = 1;
        let question = document.getElementById("question-container")
        let input = document.createElement("input");
        input.name = "question_number_" + q;
        input.type = "text";
        let input2 = document.createElement("input");
        input2.name = "question_" + q + "_choice_1";
        input2.type = "text";
        let paragraph = document.createElement('p');
        paragraph.textContent = "Question " + q;
        q++;
        let paragraph2 = document.createElement('p');
        paragraph2.textContent = "Choice " + ptr;

        let cow = document.createElement("input");
        cow.id = "correct";
        cow.type = "radio";
        cow.value = "Correct";
        cow.name = "question_" + q + "_choice_1_cow";
        // cow.textContent = "Correct";

        let cow2 = document.createElement("input");
        cow2.id = "wrong";
        cow2.type = "radio";
        cow2.value = "Wrong";
        cow2.name = "question_" + q + "_choice_1_cow";
        // cow2.textContent = "Wrong";



        question.appendChild(paragraph)
        question.appendChild(input)
        question.appendChild(paragraph2)
        question.appendChild(input2)
        question.appendChild(cow)
        question.innerHTML += "Correct";
        question.appendChild(cow2);
        question.innerHTML += "Wrong";
        qptr++;
    }

    function addChoice() {
        ptr++;
        let question = document.getElementById("question-container")
        let paragraph2 = document.createElement('p');
        paragraph2.textContent = "Choice " + ptr;
        let input2 = document.createElement("input");
        input2.name = "question_" + (qptr - 1) + "_choice_" + ptr;
        input2.type = "text";

        let cow = document.createElement("input");
        cow.id = "correct";
        cow.type = "radio";
        cow.value = "Correct";
        cow.name = "question_" + (qptr - 1) + "_choice_" + ptr + "_cow";

        let cow2 = document.createElement("input");
        cow2.id = "wrong";
        cow2.type = "radio";
        cow2.value = "Wrong";
        cow2.name = "question_" + (qptr - 1) + "_choice_" + ptr + "_cow";

        question.appendChild(paragraph2)
        question.appendChild(input2)
        question.appendChild(cow)
        question.innerHTML += "Correct";
        question.appendChild(cow2)
        question.innerHTML += "Wrong";

    }
    </script>

</body>

</html>