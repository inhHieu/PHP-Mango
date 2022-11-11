$('#mbCarousel').on('slide.bs.carousel', function (e) {
    console.log('slide');
    var slideFrom = $(this).find('.active').index();
    var slideTo = $(e.relatedTarget).index();
    console.log(slideFrom+' => '+slideTo);

    if(slideTo == 0){
        // $('#i4cHieu').css("opacity", "1");
        $('#i4cHieu').css("z-index", "1");

        // $('#i4cTai').css("opacity", "0");
        $('#i4cTai').css("z-index", "-1");

        // $('#i4cDan').css("opacity", "0");
        $('#i4cDan').css("z-index", "-2");
    }else if(slideTo == 1){
        // $('#i4cHieu').css("opacity", "0");
        $('#i4cHieu').css("z-index", "-1");

        // $('#i4cTai').css("opacity", "1");
        $('#i4cTai').css("z-index", "1");

        // $('#i4cDan').css("opacity", "0");
        $('#i4cDan').css("z-index", "-2");
    }else if(slideTo == 2){
        // $('#i4cHieu').css("opacity", "0");
        $('#i4cHieu').css("z-index", "-2")

        // $('#i4cTai').css("opacity", "0");
        $('#i4cTai').css("z-index", "-1");

        // $('#i4cDan').css("opacity", "1");
        $('#i4cDan').css("z-index", "1");
    } 

  })