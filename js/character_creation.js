(function(){

  // améliorer cette fonction en ajoutant un description de la classe (contenue dans la table class, class_description) avec AJAX (XMLHttpRequest)
  //rien ne semble fonctionner, à retravailler...

  //Fonction affichant la classe choisie
  var total = 55;
  $('#too_much_points_error').hide();
  $('#non_valid_stat_value').hide();

  $('#total_points').html(total);
    function desc_class(){
      let nom_classe = document.getElementById("char_class").value;
      document.getElementById("class_desc").innerHTML = nom_classe;
    }

  //Fonction sensée afficher le total de points dépensés sur les statistiques
    $(".stat_value").change(function(){
      total = 55 - (parseInt($("#stat1").val())+parseInt($("#stat2").val())+parseInt($("#stat3").val())+parseInt($("#stat4").val())+parseInt($("#stat5").val()));
      $('#total_points').html(total);
      if (total<0){
        $('#too_much_points_error').show();
      }
      else {
        $('#too_much_points_error').hide();
      }

      if ($('.stat_value').val()<3){
        $('#non_valid_stat_value').show();
      }
      else{
        $('#non_valid_stat_value').hide();
      }

    });
    function total_stat_points(){
      // var array_of_points = $('.stat_value').val();
      // var tot=0;
      // array_of_points.forEach((item, i) => {
      //   tot += array_of_points[i].val();
      // });
      // alert (tot);


      }








}(jQuery));
