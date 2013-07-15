<?php

namespace FunOldies\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FunOldies\MainBundle\Entity\Contact;
use FunOldies\MainBundle\Form\ContactType;

class PageController extends Controller
{
    public function indexAction()
    {
        // snapwidget.com hashtags
        // ---- random local 
        $a = array(
                1 => "<p>#prescottcollege</p><iframe src=\"http://snapwidget.com/sl/?h=cHJlc2NvdHRjb2xsZWdlfGlufDEyNXwyfDN8fG5vfDV8bm9uZQ==\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                        2 => "<p>#prescottaz</p><iframe src=\"http://snapwidget.com/sl/?h=cHJlc2NvdHRhenxpbnwxMjV8MnwzfHxub3w1fG5vbmU=\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                        3 => "<p>#campverde</p><iframe src=\"http://snapwidget.com/sl/?h=Y2FtcHZlcmRlfGlufDEyNXwyfDN8fG5vfDV8bm9uZQ==\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                        4 => "<p>#verdevalley</p><iframe src=\"http://snapwidget.com/sl/?h=dmVyZGV2YWxsZXl8aW58MTI1fDJ8M3x8bm98NXxub25l\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                        5 => "<p>#sedona</p><iframe src=\"http://snapwidget.com/sl/?h=c2Vkb25hfGlufDEyNXwyfDN8fG5vfDV8bm9uZQ==\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                        6 => "<p>#jeromeaz</p><iframe src=\"http://snapwidget.com/sl/?h=amVyb21lYXp8aW58MTI1fDJ8M3x8bm98NXxub25l\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
        );
        // -- random pop
        $b = array(
                1 => "<p>#thebeatles</p><iframe src=\"http://snapwidget.com/sl/?h=dGhlYmVhdGxlc3xpbnwxMjV8MnwzfHxub3w1fG5vbmU=\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                        2 => "<p>#sixties</p><iframe src=\"http://snapwidget.com/sl/?h=c2l4dHlzfGlufDEyNXwyfDN8fG5vfDV8bm9uZQ==\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                        3 => "<p>#thesixties</p><iframe src=\"http://snapwidget.com/sl/?h=dGhlc2l4dGllc3xpbnwxMjV8MnwzfHxub3w1fG5vbmU=\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                        4 => "<p>#1960s</p><iframe src=\"http://snapwidget.com/sl/?h=MTk2MHN8aW58MTI1fDJ8M3x8bm98NXxub25l\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
        );
        // generate random
        $randA = mt_rand(1,6);
        $randB = mt_rand(1,4);
        $display_blockA = $a[$randA];
        $display_blockB = $b[$randB];

        return $this->render('FunOldiesMainBundle:Page:index.html.twig', array(
            'display_blockA' => $display_blockA,
            'display_blockB' => $display_blockB
        ));
    }
    
    public function contactAction()
    {
        $contact = new Contact ();
        $form = $this->createForm(new ContactType(), $contact);
        
        $request = $this->getRequest();
        
        if ($request->getMethod() == 'POST'){
             $form->bind($request);
            
            if($form->isValid()){
                $message = \Swift_Message::newInstance()
                    ->setSubject('Fun Oldies | Contact Form')
                    ->setFrom($contact->getEmail())
                    ->setReplyTo($contact->getEmail())
                    ->setTo($this->container->getParameter('fo.emails.contact_email'))
                    ->setBody($this->renderView('FunOldiesMainBundle:Email:contact.txt.twig', array('contact' => $contact)));
                $this->get('mailer')->send($message);
                
                $this->get('session')->getFlashBag()->add('contactnotice', 'Successfully sent!');
                
                //redirect - important to prevent repost from page refresh
                return $this->redirect($this->generateUrl('fo_contact'));
            }
        }
        return $this->render('FunOldiesMainBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
        public function onairAction()
    {
        return $this->render('FunOldiesMainBundle:Page:onair.html.twig');
    }
    
    public function photosAction()
    {
        $display_block = "";
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
                    <p><a href=\"$pageUrl?a=443858142350397\">
                            Fun Oldies Photos
                    </a></p>
                   ";
        }
        
        return $this->render('FunOldiesMainBundle:Page:photos.html.twig', array(
            'display_block' => $display_block
        ));
    }
    
    public function concertsAction()
    {
        return $this->render('FunOldiesMainBundle:Page:concerts.html.twig');
    }

    public function communityAction()
    {
        return $this->render('FunOldiesMainBundle:Page:community.html.twig');
    }
    
    public function whatsAction()
    {
        return $this->render('FunOldiesMainBundle:Page:whats.html.twig');
    }
    
    public function petAction()
    {
        return $this->render('FunOldiesMainBundle:Page:pet.html.twig');
    }
    
    public function jobsAction()
    {
        return $this->render('FunOldiesMainBundle:Page:jobs.html.twig');
    }
    
    public function weatherAction()
    {
        return $this->render('FunOldiesMainBundle:Page:weather.html.twig');
    }
    
}
