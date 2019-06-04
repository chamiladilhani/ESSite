<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.7.2.min.js"></script>')</script>

<!-- More Scripts-->
<script src="js/responsivegridsystem.js"></script>

<script>
var state = 'none';
  
  function showhide(layer_ref) {
  
  if (state == 'block') {
  state = 'none';
  $(".menuToggle").html("Show Menu / Navigation <img src='img/icon-navigation.png' width='23' height='13'>");
  }
  else {
  state = 'block';
  // Make the content div fade in
  $("#show_menu").hide();
  $('#show_menu').fadeIn(200);
  $('#show_menu').slideDown(200);
  
  $(".menuToggle").html("Close Menu / Navigation <img src='img/icon-closenav.png' width='13' height='13'>");
  }
  if (document.all) { //IS IE 4 or 5 (or 6 beta)
  eval( "document.all." + layer_ref + ".style.display = state");
  }
  if (document.layers) { //IS NETSCAPE 4 or below
  document.layers[layer_ref].display = state;
  }
  if (document.getElementById &&!document.all) {
  hza = document.getElementById(layer_ref);
  hza.style.display = state;
  }
  }

</script>

<script src="js/jquery.bootstrap.newsbox.min.js"></script>
<script type="text/javascript">
    $(function () {
        $(".demo1").bootstrapNews({
            newsPerPage: 3,
            autoplay: true,
			      pauseOnHover:true,
            direction: 'up',
            newsTickerInterval: 10000,
            onToDo: function () {
                //console.log(this);
            }
        });
    });
</script>

<script src="js/ion.tabs.min.js"></script>

<script>
  jQuery(document).ready(function() {
  $(".alert .toggle-alert").click(function(){
    $(this).closest(".alert").slideUp(500);
    //setTimeout(function(){$("#report-form").slideDown(500)}, 600);
    //$('input#fullname,input#department,input#telephone,input#rproblem,textarea#moredetails').each(function(){ $(this).val(''); });
    //$("input#priority").removeAttr("checked");
    //setTimeout(function(){location.href="index.php"} , 2000);
    return false;
  });
  });
</script>

<script language="javascript">
  function checkMe() {
      if (confirm("Are you sure you want to delete ?")) {
          return true;
      } else {
          return false;
      }
  }
</script>

<script language="javascript">
  function checkMeok() {
      if (confirm("Are you sure?")) {
          return true;
      } else {
          return false;
      }
  }
</script>

<script src="src/jquery.rateit.min.js" type="text/javascript" charset="UTF-8"></script>
