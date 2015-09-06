<!--footer-->
<hr/>
<div id="footer" class="text-center">
    CopyLeft 2015 Bootstrap@HTML5群(152842347) 版权部分所有，遵循 <a target="_blank" href="http://opensource.org/licenses/gpl-2.0.php">GNU GENERAL PUBLIC LICENSE v2</a> 授权使用 <a href="#">土豪请慷慨捐赠</a> Generated in {{ round((microtime(1) - LARAVEL_START), 4) }} sec.
</div>
<script type="text/javascript" src="/public/md/js/bootstrap.min.js"></script>
<script type="text/javascript" src='/public/md/js/material.min.js'></script>
<script type="text/javascript" src='/public/md/js/ripples.min.js'></script>
<script type="text/javascript">
    $.material.init();
    $(document).ready(function() {
        menuToggle();
        $(window).resize(function() {
            menuToggle();
        });
    });

    function menuToggle() {
        $('.dropdown').off('mouseover mouseleave');
        if ($('.navbar-toggle').css('display') == 'none') {
            $('nav .dropdown').on('mouseover', function() {
                $(this).find('>a>i').removeClass('fa-caret-down').addClass('fa-caret-up')
                $(this).find('>a').css({
                    'padding-bottom': '10px',
                    'border-bottom': '4px solid #7cb342',
                    'margin-bottom': '1px'
                });
                $(this).find('.dropdown-menu').stop().slideDown("fast");
            });
            $('nav .dropdown').on('mouseleave', function() {
                $(this).find('>a>i').removeClass('fa-caret-up').addClass('fa-caret-down')
                $(this).find('>a').css({
                    'padding-bottom': '15px',
                    'border-bottom': 'none',
                    'margin-bottom': '0px'
                });
                $(this).find('.dropdown-menu').stop().slideUp("fast");
            });
            $('.loginPanel .dropdown').on('mouseover', function() {
                $(this).find('.dropdown-menu').stop().slideDown("fast");
            });
            $('.loginPanel .dropdown').on('mouseleave', function() {
                $(this).find('.dropdown-menu').stop().slideUp("fast");
            });
        }
    }
</script>
</body>
</html>