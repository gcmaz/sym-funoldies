<?php

namespace FunOldies\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PhotosController extends Controller
{
    public function showPhotos(){
        $display_block = '';
        $pageUrl = $this->generateUrl('fo_photos');
        
        if(isset($_GET['a'])){
            $a = $_GET['a'];
            $display_block = "
                    <a href=\"$pageUrl\" style=\"font-size:16px;margin:0 auto 5px;\">&laquo; Back To Albums</a><br/>
                    <div id=\"galleria\"></div>
                    <script type=\"text/javascript\" charset=\"UTF-8\" >
                    Galleria.loadTheme('/scripts/galleria/themes/classic/galleria.classic.js');
                    Galleria.run('#galleria', {
                     facebook: 'album:$a',
                     width: 660,
                     height: 550,
                     lightbox: true,
                     debug: false
                    });
                    </script>
                ";
        } else {
            $display_block = "
                <p style=\"color:#63b4be;font-weight:600;\">Select A Gallery:</p>
                <br/>
                <p><a href=\"$pageUrl?a=556401554429388\">
                        TEACHERS APPRECIATION NIGHT 2013
                </a></p>
                <p><a href=\"$pageUrl?a=458635670872644\">
                        The Queen of Caffeine
                </a></p>
               ";
        }
        
        return $display_block;
    }
}
?>