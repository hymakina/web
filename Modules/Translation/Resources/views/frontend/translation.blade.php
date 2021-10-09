<div id="translationNav" class="overlay">

  <!-- Button to close the overlay navigation -->
  <a href="javascript:void(0)" class="closebtn" onclick="closeTranslationNav()">&times;</a>

  <!-- Overlay content -->
  <div class="overlay-content">
      <div class="translation-box-wrapper">
        <label id="translation-title-label">{{ __("frontend.active_language") }}: <strong>{!! \Loc::getDefaultLocale() !!}</strong> </label>
        <div class="translation-content">
          <label id="translation-placeholder">{{ __("frontend.enter_translation_for_key") }}: <strong><span id="translation-placeholder-key"></span></strong></label>
          <textarea rows="8" cols="30" placeholder="" type="text" id="translationContent"></textarea>
          <br>
          <button id="saveTranslation" type="button">SAVE</button>
        </div>
      </div>
  </div>

</div>

<style>

  .translation-box-wrapper{
    background: #fff;
    width: fit-content;
    margin: 0 auto;
    border-radius: 5px;
    overflow: hidden;
    position: relative;

  }

  #translation-placeholder{
    color: #333;
    display: block;

  }

  #translation-title-label{
    color: #fffdfd;
    display: block;
    position: absolute;
    top: 0;
    background: #818181;
    width: 100%;
    padding: 8px 0;
    }

  .translation-content{
    padding: 55px 55px 40px 55px;
    margin-top: 20px;
  }

  #translationContent{
    width: 300px;
  }
    .translation-title-container:before {
        font-family: FontAwesome;
        content: "\f1c2";
        display: inline-block;
        padding-right: 3px;
        vertical-align: super;
        font-weight: 100;
        font-size: 12px;
        color: #ff1212;
        position: relative;
        top: 0;
        margin-top: -20px;
        margin-left: -7px;
    }

  div[data-line]:after {
    content: attr(data-line); /* no quotes around attribute name! */
  }

    #translationNav.overlay {
        /* Height & width depends on how you want to reveal the overlay (see JS below) */
        height: 100%;
        width: 100%;
        position: fixed; /* Stay in place */
        z-index: 9999; /* Sit on top */
        left: 0;
        top: 0;
        background-color: rgb(0,0,0); /* Black fallback color */
        background-color: rgba(0,0,0, 0.9) !important; /* Black w/opacity */
        opacity: 0.9 !important;
        overflow-x: hidden; /* Disable horizontal scroll */
        transition: 0.5s; /* 0.5 second transition effect to slide in or slide down the overlay (height or width, depending on reveal) */
        display: none;
    }

    /* Position the content inside the overlay */
    .overlay-content {
        position: relative;
        top: 25%; /* 25% from the top */
        width: 100%; /* 100% width */
        text-align: center; /* Centered text/links */
        margin-top: 30px; /* 30px top margin to avoid conflict with the close button on smaller screens */
    }

    /* The navigation links inside the overlay */
    #translationNav.overlay a {
        padding: 8px;
        text-decoration: none;
        font-size: 36px;
        color: #818181;
        display: block; /* Display block instead of inline */
        transition: 0.3s; /* Transition effects on hover (color) */
    }

    /* When you mouse over the navigation links, change their color */
    #translationNav.overlay a:hover, .overlay a:focus {
        color: #f1f1f1;
    }

    /* Position the close button (top right corner) */
    #translationNav.overlay .closebtn {
        position: absolute;
        top: 20px;
        right: 45px;
        font-size: 60px;
    }

    /* When the height of the screen is less than 450 pixels, change the font-size of the links and position the close button again, so they don't overlap */
    @media screen and (max-height: 450px) {
        #translationNav.overlay a {font-size: 20px}
        #translationNav.overlay .closebtn {
            font-size: 40px;
            top: 15px;
            right: 35px;
        }
    }
</style>

<script>
    var translationElement;
    $("[data-uitranslation]").click(function (e) {

        e.preventDefault();

        window.translationElement = this;

        var title = $(this).data("title");
        var value = $(this).data("value");

        $("#translation-placeholder-key").html(title);
        $("#translationContent").val(value);

        document.getElementById("translationNav").style.display = "block";
    })

    /* Close */
    function closeTranslationNav() {
        document.getElementById("translationNav").style.display = "none";
    }

    $("#saveTranslation").click(function () {

        var value = $("#translationContent").val();
        var key = $(window.translationElement).data("key");
        var placeholder = $(window.translationElement).data("placeholder");

        $("#translationContent").val("");
        $(window.translationElement).data("value", value);

        if(placeholder){
            $(window.translationElement).attr("placeholder", "Click To Translate: " + value);
        }else{
            $(window.translationElement).html(value);
        }

        document.getElementById("translationNav").style.display = "none";

        $.ajax({
            type:'POST',
            url:'{{ route("translation.save")}}',
            data: {
                'key': key,
                'value': value
            },
            success:function(result){

            }
        });


    });
</script>