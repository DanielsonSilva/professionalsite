$(document).ready(function(){
    $("button[name='die']").click(function(){
        let die = $(this).val();
        alert(die);
        $.ajax({
            url:'professionalsite/diceroller/index.php/DiceRollerController/addDice',
            method: 'post',
            data: {value: die},
            dataType: 'json',
            success: function(response){
                $("#current-roll").text(response[0].current_roll);
            },
            error: function(response) {
                $("#current-roll").html(response.responseJSON.message);
            }
        });
    });
});

/*let dice = {
    4 : 0,
    6 : 0,
    8 : 0,
    10: 0,
    12: 0,
    20: 0
}

function addDice(number) {
    dice[number] = dice[number] + 1;
    printDice();
}

function printDice() {
    let i;
    let text = "Current roll: ";
    for(let key in dice) {
        let value = dice[key];
        if (value > 0) {
            text = text + value + "d" + key + " + ";
        }
    }
    document.getElementById("current-roll").innerText = text.substring(0, text.length - 3);
}*/