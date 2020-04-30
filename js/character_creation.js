(function(){
  var total = 55;
  $('#too_much_points_error').hide();
  $('#non_valid_stat_value').hide();
  $('#total_points').html(total);


//Fonction affichant la classe choisie
function display_class_specs(){
  $.get("ajax/api.php").then(function(dataServeur){
    var classe = $("#char_class").val();
    var desc_to_read;
    var comp_to_read;
    dataServeur.data.forEach((item, i) => {
        if (classe == dataServeur.data[i].class_name){
          desc_to_read = i;
        };
        if (classe == dataServeur.data[i].skill_type){
          comp_to_read = i;
        };
    });
    $("#class_desc").html(dataServeur.data[desc_to_read].class_description);
    var bonus;
    if ((dataServeur.data[comp_to_read].skill_bonus)){
      bonus="("+dataServeur.data[comp_to_read].skill_bonus+" au jet de dé)";
    } else {bonus = "";}
    $('#class_comp').html("<strong>"+dataServeur.data[comp_to_read].skill_name+ "</strong> : "+dataServeur.data[comp_to_read].skill_description+" "+bonus);
  });
}

  //Fonction sensée afficher le total de points dépensés sur les statistiques
  function total_stat_points(){

    total = 55 - (parseInt($("#stat1").val())+parseInt($("#stat2").val())+parseInt($("#stat3").val())+parseInt($("#stat4").val())+parseInt($("#stat5").val()));
    $('#total_points').html(total);
    if (total<0){
      $('#too_much_points_error').show();
    }
    else {
      $('#too_much_points_error').hide();
    }

    if ($('.stat_value').val() < 3){
      $('#non_valid_stat_value').show();
    }
    else{
      $('#non_valid_stat_value').hide();
    }
  }

  total_stat_points();

  display_class_specs(); 

  $(".stat_value").change(function(){
    total_stat_points();

  });

  $("#char_class").change(function(){
   display_class_specs();
 });







}(jQuery));
