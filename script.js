
//    blackKing = 'http://www.clipartbest.com/cliparts/dTr/aRg/dTraRgkjc.png';
//    whiteKing = 'http://www.wpclipart.com/recreation/games/chess/chess_set_1/chess_piece_black_king_T.png';


document.addEventListener('click', function(e) {

    e = e || window.event;
    var target = e.target || e.srcElement;
    var id = target.parentNode.id; //wherever i click

        //image = $("#" + id).attr("src"); //get image source of what i click on
    sprite = target.parentNode.innerHTML; // get entire image text html Ex. <img src="..." >
    if (sprite.length < 4000) {

        sprite2 = target.parentNode.innerHTML; // get entire image text html Ex. <img src="..." >
        image = target.src;
        id2 = id;

        k1 = (id - 1) -7;
        k2 = (id - 1) + 2;
        k3 = (id - 1) + 9;
        k4 = (id - 1);

        $('#' + k1).css("background-color", "rgb(240,230,140)");
        $('#' + k2).css("background-color", "rgb(240,230,140)");
        $('#' + k3).css("background-color", "rgb(240,230,140)");
        $('#' + k4).css("background-color", "rgb(240,230,140)");
    }
    else {

        $('input[name=' + target.id + ']').val(image); // change the hidden form value to match the image src
        $('input[name=' + id2 + ']').val("null");
        $('#' + target.id).html(sprite2);
        $('#' + id2).html("");

         $('.tileBlack').attr('style',''); $('.tileWhite').attr('style',''); // reset the board to black and white
    }

}, false);

$( document ).ready(function() {
    var i = 1;
    while (i != 49 ) {
        var tile = $('#' + i).children();
        var src = tile.attr('src');
        if (src == undefined) {}
        else {
            $('input[name=' + i + ']').val(src);
        }

        i++;


    }






});



















