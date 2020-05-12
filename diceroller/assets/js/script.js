$(document).ready(function(){
    $("button[name='die']").click(function(){
        let die = $(this).val();
        $.ajax({
            url: baseURL + '/index.php/DiceRollerController/addDice',
            method: 'post',
            data: {value: die},
            dataType: 'json',
            success: function(response){
                console.log(response);
                $("#current-roll").text(response.current_roll);
            },
            error: function(response) {
                $("#current-roll").text(response.message);
            }
        });
    });
    $("button[name='roll']").click(function(){
        $.ajax({
            url: baseURL + '/index.php/DiceRollerController/rollDice',
            method: 'post',
            dataType: 'json',
            success: function(response){
                $("#roll-result").text(response.message);
                alert("The result of that roll was " + response.value);
            },
            error: function(response) {
                $("#roll-result").text(response.message);
            }
        });
    });
    $("button[name='reset']").click(function(){
        $.ajax({
            url: baseURL + '/index.php/DiceRollerController/resetDice',
            method: 'post',
            dataType: 'json',
            success: function(response){
                $("#current-roll").text("");
                $("#roll-result").text("");
                alert("The roll was reset");
            },
            error: function(response) {
                $("#roll-result").text("Something bad happened, please try again");
            }
        });
    });
});