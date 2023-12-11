

<div class="image_aboutUs">
    <a href="{{ $aboutUs->image_path }}">
        <img src="{{ $aboutUs->image_path }}" class="img-fluid image" style="width: 100px;" alt="">
    </a>

</div>
<script>
    $(function () {

        $('.image_aboutUs').magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            }
        });

    });//end of document ready
</script>
