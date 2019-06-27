<footer class="main-footer">
  <a href="contact.php">Contact Us</a>
</footer>
<script>
    jQuery('.trigger-dropdown').on('click', function(){
        if($(this).hasClass('unselected')) {
            $(this).find('.dropdown-menu').css('display', 'flex');
            console.log('selected');
            $(this).removeClass('unselected');
            $(this).addClass('selected');
        }else{
            $(this).find('.dropdown-menu').css('display', 'none');
            console.log('deselected');
            $(this).removeClass('selected');
            $(this).addClass('unselected');
        }
    });
    jQuery(':not(html, body, div, header, nav, ul, li, a)').on('click', function(){
      console.log($(this));
      let elem = $(document).find('.trigger-dropdown');
      if(elem.hasClass('selected')) {
          elem.find('.dropdown-menu').css('display', 'none');
          console.log('deselected');
          elem.removeClass('selected');
          elem.addClass('unselected');
      }
    });
    // jQuery('.trigger-dropdown').on('click', function(){
    //     if($(this).hasClass('unselected')) {
    //         $(this).find('.dropdown-menu').css('display', 'flex');
    //         console.log('selected');
    //         $(this).removeClass('unselected');
    //         $(this).addClass('selected');
    //     }else{
    //         $(this).find('.dropdown-menu').css('display', 'none');
    //         console.log('deselected');
    //         $(this).removeClass('selected');
    //         $(this).addClass('unselected');
    //     }
    // });
</script>
</body>
</html>
