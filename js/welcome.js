(function(){

$('#actual_user_id').hide();
$('#no_character').hide();
$('#character_list').hide();
$("#selected_character").hide();


function display_character_name(){
  var newLine;
  $.get("ajax/api.php").then(function(dataServeur){
    dataServeur.character.forEach((item, i) =>{
      if ($("#actual_user_id").html() == dataServeur.character[i].user_id ){
        newLine = $('<li></li>');
        newLine.html(dataServeur.character[i].character_name);
        newLine.click(function(){
          $('#selected_character_name').html("");
          $('#selected_character_class').html("");
          $('#selected_character_stats').html("");
          $('#selected_character_skills').html("");
          $('#selected_character_background').html("");
          $('#selected_character_notes').html("");

          display_character_info(dataServeur.character[i].character_id, dataServeur.character[i].class_id, dataServeur.character[i].character_background);
          $('#selected_character_name').html(dataServeur.character[i].character_name);
        });
        $('#character_list').append(newLine);
      }
    });
    if (!newLine){
      $('#no_character').show();
    }
  });
}

function display_character_info(character_id, char_class_id, char_background_text){
  var current_stat_name;
  var current_stat_value;
  var current_skill;
  char_class = $('<p></p>');
  char_stats = $('<ul></ul>');
  char_skills = $('<ul></ul>');
  char_background = $('<p></p>');
  char_background.html(char_background_text);
  $.get("ajax/api.php").then(function(dataServeur){
    //récupération de la classe :
    dataServeur.class.forEach((item, i)=>{
      if (char_class_id == dataServeur.class[i].class_id){
        char_class.html(dataServeur.class[i].class_name);
      }
    });

    //récupération des stats dans l'API
    dataServeur.character_stat.forEach((item, i)=>{
      if (character_id == dataServeur.character_stat[i].character_id){
          current_stat_id = dataServeur.character_stat[i].stat_id;
          current_stat_value = dataServeur.character_stat[i].character_stat_max_value;
          dataServeur.stat.forEach((item, i)=>{
            if (current_stat_id == dataServeur.stat[i].stat_id){
              current_stat_name = dataServeur.stat[i].stat_name;
              newStat = $("<li></li>");
              newStat.html("<strong>"+current_stat_name+"</strong> : "+current_stat_value);
              char_stats.append(newStat);
            }
          });
      }
    });

    //récupération des skills
    dataServeur.master.forEach((item, i) => {
      if (character_id == dataServeur.master[i].character_id){
        current_skill = dataServeur.master[i].skill_id;
        dataServeur.skill.forEach((item, i) => {
          if (current_skill == dataServeur.skill[i].skill_id){
            skill_name = dataServeur.skill[i].skill_name;
            skill_desc = dataServeur.skill[i].skill_description;
            skill_bonus = dataServeur.skill[i].skill_bonus;
            if (!skill_bonus){skill_bonus = "Aucun.";}
            newSkill = $('<li></li>');
            newSkill.html("<strong>"+skill_name+" : </strong>"+skill_desc+" Bonus : "+skill_bonus);
            char_skills.append(newSkill); 
          }
        });
      }
    });


    $("#selected_character_class").append(char_class);
    $("#selected_character_stats").append(char_stats);
    $("#selected_character_skills").append(char_skills);
    $("#selected_character_background").append(char_background);
    $("#selected_character").show();

  });
}



$('#my_characters').click(function(){
  $('#character_list').html("");
  display_character_name();
  $('#character_list').toggle();
  $('#selected_character').hide();
});




}(jQuery));
