

<div class="image_settings">
    <a href="{{ $settings->image_path }}">
        <img src="{{ $settings->image_path }}" class="img-fluid image" style="width: 100px;" alt="">
    </a>

</div>
<script>
    $(function () {

        $('.image_settings').magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            }
        });

    });//end of document ready
</script>
