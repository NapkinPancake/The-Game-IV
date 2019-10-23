function getTheNumber(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}
////////////////////////////////////////////////////////////////////

let answer = getTheNumber(1, 10);
let levelPoints = 10;



$('#dropEasy').click( function () {
    $('#try1').attr('placeholder','Number from 1 to 10');
    answer = getTheNumber(1, 10);
    levelPoints = 10;
    console.log(answer);
});
$('#dropMedium').click( function () {
    $('#try1').attr('placeholder','Number from 1 to 30');
    answer = getTheNumber(1, 30);
    levelPoints = 30;
    console.log(answer);
    
});
$('#dropHard').click( function () {
    $('#try1').attr('placeholder','Number from 1 to 50');
    answer = getTheNumber(1, 50);
    levelPoints = 50;
    console.log(answer);
}) 

////////////////////////////////////////////////////////////////////

let result
let usersNumber
let tryNumber = 0
let games = 0
var victories = 0
var button1 = document.getElementById("pushOne")
var textField = document.getElementById("try1")
var readonlyField = document.getElementById("answer1")
var answerField = document.getElementById("try1")
var attempt = document.getElementById("try1")

function getValue() {
    usersNumber = attempt.value;
    if (usersNumber == 0) {
        readonlyField.value = "Ні, ну хоч щось введи";
        answerField.value = "";
        result = "0";
    } else if (usersNumber == answer) {
        readonlyField.value = "Вітаннячка!";
        answerField.value = "";
        result = "=";
        victories += 1;
        document.getElementById("WinForm").style.display = "block";
    } else if ((3 * usersNumber) < answer) {
        readonlyField.value = "То зовсім мало!";
        answerField.value = "";
        result = ">";
    } else if ((2 * usersNumber) < answer) {
        readonlyField.value = "Бери більше";
        answerField.value = "";
        result = ">";
    } else if (usersNumber < answer) {
        readonlyField.value = "Ще більше";
        answerField.value = "";
        result = ">";
    } else if ((3 * usersNumber) > answer) {
        readonlyField.value = "Ти диви - розігнавсь!";
        answerField.value = "";
        result = "<";
    } else if ((2 * usersNumber) > answer) {
        readonlyField.value = "Ну що ви - менше!";
        answerField.value = "";
        result = "<";
    } else if (usersNumber > answer) {
        readonlyField.value = "Ще трішки менше!";
        answerField.value = "";
        result = "<";
    } else if (usersNumber !== answer) {
        readonlyField.value = "Пане, я Вас прошу!";
        answerField.value = "";
        result = "Розумник знайшовся";
    } else {
        readonlyField.value = "My hata is in the border, i dont't  know nothing";
        answerField.value = "";
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////

function UserTry() {
    this["Number of try"] = tryNumber,
        this["Users Variant"] = usersNumber,
        this.Result = result
}



function savingResulsts() {
    if (usersNumber != "" && usersNumber != 0) {  
        let userTries = new UserTry()
        BigBase.push(userTries)
        console.log(BigBase)
    }
 
}

let BigBase = []



function raunds() {
    if (BigBase.length >= 10) {
        document.getElementById("answer1").value = "Шкода, але відповідь " + answer; //   <------------------------- JQuery
        button1.disabled = true;                                                     //
        textField.disabled = true;                                                   //
        NameAndRait();
        saveRait();

    } else if (usersNumber == answer) {
        button1.disabled = true;
        textField.disabled = true;
    } else {

    }
}



function theNewBeginning() {
    button1.disabled = false;
    textField.disabled = false;
    getTheNumber(1, 10);
    answer = getTheNumber(1, 10);
    BigBase.length = 0;
    //document.getElementById("WinForm").style.display = "none";
    $('#WinForm').hide(250);
}



//=====================================================================================================================


//=====================================================================================================================


let username = document.getElementById("Username");
let button2 = document.getElementById("resetButt");


let score = $('#LiederShipTable');
let currentPoints = $('#currentPoints');
let answerCheck = $('#try1');


$(document).ready(function () {
    console.log(answer);
    score.hide();
    $("#pushOne").click(function () {
        getValue();
        raunds();
        if (usersNumber != "" && usersNumber != 0) {  
            tryNumber += 1 ;
            savingResulsts();
        };
        console.log(answerCheck);
        $("#lvl").prop({ disabled: true });

        if (usersNumber == answer) {
            creatingRait();
            NameAndRait();
            POST_score();
            console.log("Your rate : "+FinalRait.toFixed(2));  //   <----------------------------  CHANGE AFTER INCLUDING LOG FORM
            score.empty();  
            score.prepend("Your score : "+ FinalRait.toFixed(2));
            score.fadeIn(750);

            currentPoints.empty();  
            currentPoints.prepend("+"+rating);
            currentPoints.fadeIn(750);
        }

    })

    $("#resetButt").click(function () {
        $("#lvl").prop({ disabled: false });
        theNewBeginning();
        tryNumber = 0;
        console.log(answer);
        score.hide(750);
        currentPoints.hide(750)
    })

    let liedershipTable = []

    $(window).on('unload', function () {
        function saveRait() {
            addRait = new NameAndRait();
            liedershipTable.push(addRait);
            CodedRait = JSON.stringify(liedershipTable);
            localStorage.setItem("rating", CodedRait);
        }
        saveRait();

    })


})

let raitSum = []
let sum;
let FinalRait;
let rating;



function creatingRait() {
    games += 1;
    rating = levelPoints / tryNumber
    raitSum.push(rating);
    function summingUp(array) {
        sum = 0;
        for (var i = 0; i < array.length; i++) {
            sum += array[i];
        }
    }
    summingUp(raitSum);
    FinalRait = sum / games;
    tryNumber = 0;
}

function NameAndRait() {
    //Score = FinalRait;
}

///////////////////////////////////////////////////

function POST_score() {
    let data = rating;
    let hello = "hello"
    $.post( 'includes/save_results.php', 
         { result: data }, 
         () => {  console.log("Data was sent"); 
        }
    )

    $.post ( 'includes/global_score.php' ,
    { globalScore : hello} , 
    () => console.log("Global score have to change") 
    )
 }
    

function getScoreFromServer() {
    $.ajax({
        url: './api.php?action=get&type=score',
        success: function (data) {
            console.log('Score from server:', JSON.stringify(data))
        },
        error: function (err) {
            console.error('Score from server: error', err)
        }
      })
}