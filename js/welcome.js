(function(){

function get_user_id(){
  var user_id;
  $.get("ajax/api.php").then(function(dataServeur){
    dataServeur.user.forEach((item, i)=>{
      if ($('#actual_user').html() == dataServeur.user[i].user_username){
        user_id = dataServeur.user[i].user_id;
      }
    });
    alert(user_id);
  });
};

get_user_id(); 
// function display_character_name(){
//   $.get("ajax/api.php").then(function(dataServeur){
//     dataServeur.user.forEach((item, i))
//   }
// }
//
//
//
// $('#my_characters').click(function(){
//   //display_character_name()
// })
//



}(jQuery));
