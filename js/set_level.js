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