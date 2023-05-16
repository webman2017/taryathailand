

$(document).ready(function () {
    $('.north-label').click(function(){
           //alert("ภาคเหนือค่ะ");
        $('.dealer-north').fadeToggle('fast','linear');
    });
    $('.east-north-label').click(function(){
        $('.dealer-east-north').fadeToggle('fast','linear');
        //alert("ภาคตะวันออกเฉียงเหนือค่ะ");
    });
    $('.central-label').click(function(){
        //alert("ภาคกลาง");
        $('.dealer-central').fadeToggle('fast','linear');
    });
    $('.east-label').click(function(){

        $('.dealer-east').fadeToggle('fast','linear');
        //alert("ภาคตะวันออก");
    });
    $('.sourth-label').click(function(){
        $('.dealer-sourth').fadeToggle('fast','linear');
        //alert("ภาคใต้");
    });
//    console.log( "ready!" );





    //$("#map").hover(function () {
    //   alert("xxxx");
        //$(".dealer-pop").fadeIn()
    //}, (function () {
    //    $(".dealer-pop").fadeOut();
    //}));

//$(".blur").hover(function(){
//    alert("xxx");
    //$(this).removeClass("blur-bg")
    //}, (function () {
    //    $(this).addClass("blur-bg");
    //}));




    //$(window).scroll(function () {
    //    var scroll = $(window).scrollTop();
    //
    //    if (scroll >= 60) {
    //        $(".navbar").addClass("fixed");
    //    } else {
    //        $(".navbar").removeClass("fixed");
    //    }
    //
    //
    //});




    $('#login').click(function () {
        alert("login");
    });

    $('.carousel[data-type="multi"] .item').each(function(){
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i=0;i<2;i++) {
            next=next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }

            next.children(':first-child').clone().appendTo($(this));
        }
    });




});
$(document).ready(function() {
    $('#example').DataTable();
} );


