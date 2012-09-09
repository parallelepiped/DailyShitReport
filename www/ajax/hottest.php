<?php
  require_once('appvars.php');
  require_once('connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  $page = 1;
  $limit = 50;
  $offset = 0;
  

  if (isset($_GET['page'])) {
     $page = $_GET['page'];
     $offset = ($page-1)*$limit;

  }  

  
  $query = "SELECT * FROM shweets ORDER BY raw_score DESC LIMIT " . $offset . ',' . $limit . ";";


  $data = mysqli_query($dbc, $query);

  ?>
  <div class = "hottest container" id="shweets">
  <?php
  while ($row = mysqli_fetch_array($data)) { 
    echo '<div style = "position : relative"><blockquote class="oval-thought"><p>' . $row['text'] . '</p></blockquote></div>';
    ?> <div class = "container">
    <span class = "ad-space"></span>
    <div class = "shweet-meta">
<?php    echo '<p style = "align : right; font-size : 7pt">'. $row['date'] . '</p>';
    echo '<div><button class = "me flush" id = "f' . $row['id'] . '">+<div class = "flush_number">'.$row['upvotes'].'</div>Thumbs Up!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></div>' ;
    echo '<div><button class = "me plunge" id = "p' . $row['id'] .  '"> ';
    ?> 
    <?php
    echo '<a style = "text-decoration : none" href="http://twitter.com/?status=via @DailyShitReport: ' . $row['text'] .'"  target="_blank">';
    ?>
    
    <img height = 11px width=14px style="margin:5px 5px" src="https://dev.twitter.com/sites/default/files/images_documentation/bird_blue_16.png"/>
 <!--   <img height = 15px width=15px src="images/f_logo.png" /> -->
    
    Get It Out There!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></button> </div></div>
    </div><br/>
    <?php
  }



  mysqli_close($dbc);

?>
</div>

<?php  if (!isset($_GET['page'])) { ?>
  <button class = "load-more hottest">Load more!</button>


<script type="text/javascript">
    $(function() {
      
        var page_number = 1;
        
        $(".plunge").button();
        
        
  //      $(".plunge").click(function(){
          
        
        
        $(".flush").button();
             
        $(".flush").click(function() {
            // $(this).button( "option", "disabled", true );
             $.post("ajax/flush.php", {"shweet_id" : this.id});
             console.log(this.id);
             $("#"+$(this).attr("id")).children().children().html(function(i, val) {
                              return +val+1})
        });
        
        $(".load-more.hottest").button().click(function () {
          page_number++;
          $.get("ajax/hottest.php?page=" + page_number, function(data) {
            $(".hottest#shweets").append(data);

          });
        });

    });
</script>

<?php } ?>
