$(function() {


  // Tabs
  $('#tabs').tabs({
    collapsible: false,
    ajaxOptions: {
      error: function(xhr, status, index, anchor) {
        $(anchor.hash).html("Sup dawg, I herd u didn't liek forming babby, but I accidentally in your base.");
      }
    }
  });




  // Submit button
  $("#submit-button").button({
    icons: {
      primary: "ui-icon-plusthick"
    },
    label: "Submit"
  }).click(function() {
    $("#dialog-form").dialog("open");
  });

  function updateTips(t) {
    tips.text(t).addClass("ui-state-highlight");
    setTimeout(function() {
      tips.removeClass("ui-state-highlight", 1500);
    }, 500);
  }

  function checkLength(o, n, min, max) {
    if (o.val().length > max || o.val().length < min) {
      o.addClass("ui-state-error");
      updateTips("Length of " + n + " must be between " + min + " and " + max + ".");
      return false;
    } else {
      return true;
    }
  }

  function checkRegexp(o, regexp, n) {
    if (!(regexp.test(o.val()))) {
      o.addClass("ui-state-error");
      updateTips(n);
      return false;
    } else {
      return true;
    }
  }


  $("#acknowledgement").dialog({
      autoOpen: false,
      width: 310,
      modal: true,
      buttons: {
        Okay: function() { 
          $( this ).dialog( "close" );
        }
      }
  }); 
  
  $("#dialog-form").dialog({
    autoOpen: false,
  //  height: 300,
    width: 310,
    modal: true,
    buttons: {
      Cancel: function() {
        $('#shweet').val('');  
				$( this ).dialog( "close" );
			},
      "Deposit.": function() {
          var data = $("#shweet").val();
          $.post("ajax/submit.php", {shweet_text : data}, function(data) {
            $('#shweet').val('');
            $("#dialog-form").dialog("close");
            console.log("kinda closed the submit")
            $("#acknowledgement").dialog("open");
        });
      //  $(this).dialog("close");
      }
    },
    close : function() {
        $('#shweet').val('');  
      
    }
  });
  

});
