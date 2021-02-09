

$(".play").click(function(){
    $(this).parent().find('.pause').show();
    $(this).parent().find('.play').hide();

  });
  
  $(".pause").click(function(){
    $(this).parent().find('.pause').hide();
    $(this).parent().find('.play').show();
  });


  var player=document.getElementById("player");
  // function playmusic()
  // {
    
  //   this.player.play();

  // }
  // function pausemusic()
  // {
  //   this.player.pause();
    
  // }
  // $(".play").click(function(){
  //   $(this).parent().find('.player').trigger('play');
  // })
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


  




var i = 1;

  function runnext() {
    playingnow = true;
  while ( !player ) {
    var player = document.getElementById("player-" + i); 
    i++ ;
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
  i++;
}
function sikpsong()
{

  i=i-2;
  var player = document.getElementById("player-" + i); 
  player.pause();
  i++;
 runnext();
}
   
 

function pauseit()
{
  i=i-2;
    var player = document.getElementById("player-" + i); 
    console.log(i+"vlaue");
player.pause();
}



// function pauseit()
// { 

//  var player = document.getElementById("player-" + i); 
//  console.log(i);
// player.pause();
// }






  $(".btn.category").click(function(){
   
    var thevaleu= $(this).val();
    console.log(thevaleu);
    $.ajax({url: "/"+thevaleu, success: function(result){
      $("#container").html(result);
    }});
  });


  // $("#vote").click(function(){
  //   $(this).addClass("cliked");
  // })


  $(document).ready(function(){
    $("#vote").click(function(){
    
      $(this).fadeOut();
   
});
});