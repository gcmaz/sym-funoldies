$(document).ready(function(){
    
    /* --- dropdown menu */
    $(function(){
        $("ul.dropdown li").hover(function(){
            $(this).addClass("hover");
            $('ul:first',this).css('visibility', 'visible');
        }, function(){
            $(this).removeClass("hover");
            $('ul:first',this).css('visibility', 'hidden');
        });
        $("ul.dropdown li ul li:has(ul)").find("a:first").append(" &raquo; ");
    }); 

    /* -----  random gutter image ----- */
    var classes = ['bodybg1', 'bodybg2', 'bodybg3', 'bodybg4', 'bodybg5', 'bodybg6', 'bodybg7'];
    var numRand = Math.floor(Math.random()*7);
    $('body').addClass(classes[numRand]);
    
    /* ------exp leaderboard 660x150 banner   */
    var $popban = $(document).find('#expleaderboard');
    $(function(){
        $popban.delay(10000).animate({ height:18, bottom:0}, function(){
            //show hide funx
            $popban.mouseover(function(){
                $popban.stop().animate({ height:150, bottom:150});
            });
            $popban.mouseout(function(){
                $popban.stop().animate({ height:18, bottom:0});
            });
        });
    });
    
    /* ------page takeover header shrink from 250 to 100   */
    var $tkohdr = $(document).find('.takeover-hdr');
    $(function(){
        $tkohdr.delay(10000).animate({ height:100, bottom:0, marginTop:0}, function(){
            //show hide funx
            $tkohdr.mouseover(function(){
                $tkohdr.stop().animate({ height:250, bottom:250, marginTop:0});
            });
            $tkohdr.mouseout(function(){
                $tkohdr.stop().animate({ height:100, bottom:0, marginTop:0});
            });
        });
    });
    
    /* ----- track page tko clicks ------*/
    var $tkobtn = $(document).find('#tkobtn');
    $tkobtn.on('click', function(){
        // ( (send command), (event hit type), category, action, label, (value) )  --- (label and value not req)
        ga('send', 'event', 'button', 'click', 'takeover_old');
        
    });
    
});
