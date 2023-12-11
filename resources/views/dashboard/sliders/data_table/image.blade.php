

@if($slider->type == "image")
    <div class="image_slider">
        <a href="{{ $slider->image_path }}">
            <img src="{{ $slider->image_path }}" class="img-fluid image" style="width: 100px;" alt="">
        </a>

    </div>

@else
    <div class="video_view">

        <video controls preload="auto" src="{{ $slider->video_path }}" width="70%"></video>'





    </div>
@endif








<script>
    $(function () {

        $('.image_slider').magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            }
        });

    });//end of document ready
</script>
