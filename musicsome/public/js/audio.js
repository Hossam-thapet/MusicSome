

$(".play").click(function(){
    $(this).parent().find('.pause').show();
    $(this).parent().find('.play').hide();

  });
  
  $(".pause").click(function(){
    $(this).parent().find('.pause').hide();
    $(this).parent().find('.play').show();
  });


  var player=document.getElementById("player");

  function playmusic(e)
  {
    var songId = e.dataset.songId,
    
     player = document.getElementById("player-" + songId);
  
     player.play();
  }
  function pausemusic(e)
  {
    var songId = e.dataset.songId,
     player = document.getElementById("player-" + songId);
     
    player.pause();
  }



  $(document).ready(function(){
    $('.btn').click(function(){
      $('.btn').removeClass('active').addClass('inactive');
       $(this).removeClass('inactive').addClass('active');
      });
  })


  




  var i = 0;

  function runnext() {
    console.log(i)
  while ( !player ) {
    i++ ;
    var player = document.getElementById("player-" + i); 
    console.log(i)
    console.log(player)
  
    if(i > 50)
    {
      i=0 ;
      break;

    }
  }
  
  player.play();
  player.addEventListener('ended', runnext);
  i;
}
function sikpsong()
{

  
  console.log(i);
  var player = document.getElementById("player-" + i); 
  player.pause();

 runnext();
}
   
 

function pauseit()
{
  
    var player = document.getElementById("player-" + i); 
    console.log(i+"vlaue");
    i-- ;
player.pause();
}



  $(document).ready(function(){
    $("#vote").click(function(){
    
      $(this).fadeOut();
   
});
});




$(window).on("load",function () {
  $(".container-fluid.load").fadeOut('40');
});



