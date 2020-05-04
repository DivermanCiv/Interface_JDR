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
    dataServeur.class.forEach((item, i) => {
        if (classe == dataServeur.class[i].class_name){
          desc_to_read = i;
        };
    });
    dataServeur.skill.forEach((item, i) => {
        if (classe == dataServeur.skill[i].skill_type){
          comp_to_read = i;
        };
    });
    $("#class_desc").html(dataServeur.class[desc_to_read].class_description);
    var bonus;
    if ((dataServeur.skill[comp_to_read].skill_bonus)){
      bonus="("+dataServeur.skill[comp_to_read].skill_bonus+" au jet de dé)";
    } else {bonus = "";}
    $('#class_comp').html("<strong>"+dataServeur.skill[comp_to_read].skill_name+ "</strong> : "+dataServeur.skill[comp_to_read].skill_description+" "+bonus);
  });
}

  //Fonction sensée afficher le total de points dépensés sur les statistiques
  function total_stat_points(){
    var is_values_valid = true;
    total = 55 - (parseInt($("#stat1").val())+parseInt($("#stat2").val())+parseInt($("#stat3").val())+parseInt($("#stat4").val())+parseInt($("#stat5").val()));
    $('#total_points').html(total);
    $('.stat_value').each(function(){
      if ($(this).val() < 3 || $(this).val()> 17){
        is_values_valid = false;
      }
    });
    if (total<0){
      $('#too_much_points_error').show();
      $('#save_button').hide();
      $('#valid_message').hide();

    }
    else if (is_values_valid == false){
      $('#non_valid_stat_value').show();
      $('#save_button').hide();
      $('#valid_message').hide();
    }
    else {
      $('#too_much_points_error').hide();
      $('#non_valid_stat_value').hide();
      $('#save_button').show();
      $('#valid_message').show();
    }
  };

  //fonction pour compter le nombre de compétences sélectionnées et s'assurer qu'il n'y en ai pas plus de 2 :
  function verify_and_count_skills(){
    $('#number_of_skills_picked').html($("input.skills_to_select:checked").length);
    if ($("input.skills_to_select:checked").length > 2){
      $('#save_button').hide();
      $('#valid_message').hide();
    }
    else {
      $('#save_button').show();
      $('#valid_message').show();
    }
  }


  $('input.skills_to_select').click(function(){
    verify_and_count_skills();
  });

  total_stat_points();

  display_class_specs();

  verify_and_count_skills();

  $(".stat_value").change(function(){
    total_stat_points();


  });

  $("#char_class").change(function(){
   display_class_specs();
 });





}(jQuery));
