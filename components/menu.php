<section class="menuBoxContenedor" id="menuBoxContenedor">
    <div class="menuBox" id="menuBox">
        <button onclick="closeMenu()">cerrar</button>
    </div>
</section>

<script>
    function openMenu() {

        $('#menuBoxContenedor').fadeIn("fast");
        $('#menuBox').animate({
            left: '0px'
        }, 100);
        $('body').css('overflow', 'hidden');
    }

    function closeMenu() {

        
        $('#menuBox').animate({
            left: '-250px'
        }, 100);
        $('#menuBoxContenedor').fadeOut("fast");
        $('body').css('overflow', 'auto');
    }
</script>