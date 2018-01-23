<div class="row">
    <nav class="clearfix">
        <ul class="clearfix">
            <li><a href="#">Home</a></li>
            <li><a href="#">travel</a></li>
            <li><a href="#">foodie</a></li>
            <li><a href="#">cooking</a></li>
            <li><a href="#">lifestyle</a></li>
            <li><a href="#">gallery</a></li>
        </ul>
        <a href="#" id="pull">Menu</a>
    </nav>
</div>

<script>
    $(function() {
        var pull        = $('#pull');
        var menu        = $('nav ul');
        var menuHeight  = menu.height();

        $(pull).on('click', function(e) {
            e.preventDefault();
            menu.slideToggle();
        });
        $(window).resize(function(){
            var w = $(window).width();
            if(menu.is(':hidden')) {
                menu.removeAttr('style');
            }
        });
    });
</script>