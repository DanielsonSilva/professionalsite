$(document).ready(function(){
    $("button[name='direction']").click(function(){
        let direction = $(this).val();
        $.ajax({
            url: baseURL + '/index.php/PokemonCaptureController/addDirection',
            method: 'post',
            data: {value: direction},
            dataType: 'json',
            success: function(response){
                $("#current-direction").text(response.current_direction);
            },
            error: function(response) {
                $("#current-direction").text(response.message);
            }
        });
    });
    $("button[name='goDirection']").click(function(){
        $.ajax({
            url: baseURL + '/index.php/PokemonCaptureController/catchPokemon',
            method: 'post',
            dataType: 'json',
            success: function(response){
                $("#movement-result").text(response.message);
            },
            error: function(response) {
                $("#movement-result").text(response.message);
            }
        });
    });
    $("button[name='reset']").click(function(){
        $.ajax({
            url: baseURL + '/index.php/PokemonCaptureController/resetDirection',
            method: 'post',
            dataType: 'json',
            success: function(response){
                $("#current-direction").text("");
                $("#movement-result").text("");
                alert("The movement was reset");
            },
            error: function(response) {
                $("#movement-result").text("Something bad happened, please try again");
            }
        });
    });
});
