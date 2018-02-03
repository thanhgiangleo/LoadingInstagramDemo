<?php
    if(substr($_SERVER['REQUEST_URI'], 0, 4) == '/en/') {
        $lang = 'en/';
    }
    else if(substr($_SERVER['REQUEST_URI'], 0, 4) == '/tha') {
        $lang = 'tha/';
    }
    else {
        $lang = '';
    }
?>
<div class="row">
    <nav class="clearfix">
        <ul class="clearfix">
            <li><a href="/<?php echo config('app.locale') ?>">Home</a></li>
            <li><a href="/<?php echo config('app.locale') ?>/travel">Travel</a></li>
            <li><a href="/<?php echo config('app.locale') ?>/foodie">Foodie</a></li>
            <li><a href="/<?php echo config('app.locale') ?>/cooking">Cooking</a></li>
            <li><a href="/<?php echo config('app.locale') ?>/lifestyle">Lifestyle</a></li>
            <li><a href="/<?php echo config('app.locale') ?>/gallery">Gallery</a></li>
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