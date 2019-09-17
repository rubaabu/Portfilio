<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Event;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class bigeventsController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
      	$events = $this->getDoctrine()->getRepository('AppBundle:Event')->findAll();
      	return $this->render('Events/index.html.twig', array('events'=> $events));
    }

    /**
     * @Route("/Events/details/{id}", name="detailspage")
     */
    public function detailsAction($id)
    {
    	 $event = $this->getDoctrine()->getRepository('AppBundle:Event')->find($id);
        return $this->render('Events/details.html.twig', array('event'=> $event));
    }

    /**
     * @Route("/Events/add", name="addpage")
     */
    public function addAction(Request $request)
    {
    	$event = new Event;

    	$form = $this->createFormBuilder($event)
    	->add('name', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('capacity', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('description', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('image', FileType::class, array('attr' => array('class'=> 'form-control-file', 'style'=>'margin-bottom:15px')))
   	    ->add('date', DateTimeType::class, array('attr' => array('style'=>'margin-bottom:15px')))
   	    ->add('contact', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
   	    ->add('contact_phone', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
   	    ->add('address', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
   	    ->add('URL', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
   	    ->add('type', ChoiceType::class, array('choices'=>array('Sport'=>'Sport', 'Music'=>'Music', 'Movie'=>'Movie','Theater'=>'Theater', 'Dance'=>'Dance' ,'Other'=>'Other'),'attr' => array('class'=> 'form-control', 'style'=>'margin-botton:15px')))
        ->add('save', SubmitType::class, array('label'=> 'Create Event', 'attr' => array('class'=> 'btn-primary', 'style'=>'margin-bottom:15px')))
        ->getForm();
       $form->handleRequest($request);



       if($form->isSubmitted() && $form->isValid()){
          
           $name        	    = $form['name']->getData();
           $date 	    	    = $form['date']->getData();
           $description 	    = $form['description']->getData();
           $image 			    = $form['image']->getData();
           $capacity 		    = $form['capacity']->getData();
           $contact 		    = $form['contact']->getData();
           $contact_phone       = $form['contact_phone']->getData();
           $address 		    = $form['address']->getData();
           $URL 			    = $form['URL']->getData();
           $type 			    = $form['type']->getData();


          

           $event->setName($name);
           $event->setdate($date);
           $event->setDescription($description);
           $event->setimage($image);
           $event->setCapacity($capacity);
           $event->setContact($contact);
           $event->setContactPhone($contact_phone);
           $event->setAddress($address);
           $event->setURL($URL);
           $event->setType($type);
           
           $em = $this->getDoctrine()->getManager();
           $em->persist($event);
           $em->flush();
           $this->addFlash(
                   'notice',
                   'Event Added'
                   );
           return $this->redirectToRoute('homepage');
       }
        return $this->render('Events/add.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/Events/edit/{id}", name="editpage")
     */
    public function editAction($id, Request $request)
    {

		   $event = $this->getDoctrine()->getRepository('AppBundle:Event')->find($id);
			


           $event->setName($event->getName());
           $event->setDate($event->getDate());
           $event->setDescription($event->getDescription());
           $event->setImage($event->getImage());
           $event->setCapacity($event->getCapacity());
           $event->setContact($event->getContact());
           $event->setContactPhone($event->getContactPhone());
           $event->setAddress($event->getAddress());
           $event->setuRL($event->getuRL());
           $event->setType($event->getType());



       
       $form = $this->createFormBuilder($event)
    	->add('name', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('capacity', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('description', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('image', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
   	    ->add('date', DateTimeType::class, array('attr' => array('style'=>'margin-bottom:15px')))
   	    ->add('contact', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
   	    ->add('contact_phone', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
   	    ->add('address', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
   	    ->add('URL', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
   	    ->add('type', ChoiceType::class, array('choices'=>array('Sport'=>'Sport', 'Music'=>'Music', 'Movie'=>'Movie','Theater'=>'Theater','Dance'=>'Dance','Other'=>'Other'),'attr' => array('class'=> 'form-control', 'style'=>'margin-botton:15px')))
        ->add('save', SubmitType::class, array('label'=> 'edit Event', 'attr' => array('class'=> 'btn-primary', 'style'=>'margin-bottom:15px')))
        ->getForm();
       $form->handleRequest($request);




       if($form->isSubmitted() && $form->isValid()){
           
           $name        	      = $form['name']->getData();
           $date 	    	      = $form['date']->getData();
           $description 	      = $form['description']->getData();
           $image 			      = $form['image']->getData();
           $capacity 		      = $form['capacity']->getData();
           $contact 		      = $form['contact']->getData();
           $contact_phone         = $form['contact_phone']->getData();
           $address 		      = $form['address']->getData();
           $URL 			      = $form['URL']->getData();
           $type 			      = $form['type']->getData();
           $em                    = $this->getDoctrine()->getManager();
           $event                 = $em->getRepository('AppBundle:event')->find($id);

           
           $event->setName($name);
           $event->setdate($date);
           $event->setDescription($description);
           $event->setimage($image);
           $event->setCapacity($capacity);
           $event->setContact($contact);
           $event->setContactPhone($contact_phone);
           $event->setAddress($address);
           $event->setURL($URL);
           $event->setType($type);

           
           $em->flush();
           $this->addFlash(
                   'notice',
                   'Event Added'
                   );
           return $this->redirectToRoute('homepage');
       }


        return $this->render('Events/edit.html.twig',array('event' => $event, 'form' => $form->createView()));
    }

    /**
    * @Route("/Events/delete/{id}", name="todo_delete")
    */
   public function deleteAction($id)
   {
           $em = $this->getDoctrine()->getManager();
           $event = $em->getRepository('AppBundle:Event')->find($id);
           $em->remove($event);
           $em->flush();
           $this->addFlash(
                   'notice',
                   'Event Removed'
                   );
            return $this->redirectToRoute('homepage');
   }
    
}
