<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Category;
use BlogBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em=$this->getDoctrine()->getManager(); // doctrine yardımcısını çağırdık.

        $posts=$em->getRepository('BlogBundle:Post')->findAll();
        $categories=$em->getRepository('BlogBundle:Category')->findAll();

        return $this->render('BlogBundle:Default:index.html.twig',array('posts'=>$posts,'categories'=>$categories));
    }


    public function searchAction(Request $request)
    {
        $em=$this->getDoctrine()->getRepository('BlogBundle:Post'); // doctrine yardımcısını çağırdık.

        $search=$request->request->get('search');

        $query=$em->createQueryBuilder('p')
            ->select('p')
            ->where('p.baslik LIKE :search')
            ->setParameter('search','%'.$search.'%')->getQuery();
        $posts=$query->getResult();

        $count=count($posts);






        $categories=$this->getDoctrine()->getRepository('BlogBundle:Category')->findAll();

        return $this->render('BlogBundle:Default:search.html.twig',array(
            'posts'=>$posts,
            'categories'=>$categories,
            'search'=>$search,
            'count'=>$count
        ));
    }


    public function categoryAction($id)
    {
        $em=$this->getDoctrine()->getManager(); // doctrine yardımcısını çağırdık.

        $posts=$em->getRepository('BlogBundle:Post')->findBy(
            array('kategori'=>$id)
        );
        $categories=$em->getRepository('BlogBundle:Category')->findAll();
        $category=$em->getRepository('BlogBundle:Category')->find($id);

        return $this->render('BlogBundle:Default:category.html.twig',array('posts'=>$posts,'categories'=>$categories,'category'=>$category));
    }



    public function hakkimdaAction()
    {
        $em=$this->getDoctrine()->getManager(); // doctrine yardımcısını çağırdık.
        $categories=$em->getRepository('BlogBundle:Category')->findAll();

        return $this->render('@Blog/Default/hakkimda.html.twig',array('categories'=>$categories));
    }

    public function postGoruntuleAction($id)
    {
        $em=$this->getDoctrine()->getManager(); // doctrine yardımcısını çağırdık.
        $categories=$em->getRepository('BlogBundle:Category')->findAll();
        $post=$em->getRepository('BlogBundle:Post')->find($id);

        return $this->render('@Blog/Default/postGoruntule.html.twig',array('categories'=>$categories,'post'=>$post));
    }

    public function iletisimAction()
    {
        $em=$this->getDoctrine()->getManager(); // doctrine yardımcısını çağırdık.
        $categories=$em->getRepository('BlogBundle:Category')->findAll();

        return $this->render('@Blog/Default/iletisim.html.twig',array('categories'=>$categories));
    }

    public function createAction(Request $request)
    {
        $categories=$this->getDoctrine()
            ->getRepository('BlogBundle:Category')
            ->findAll();

        return $this->render('BlogBundle:Default:create.html.twig',array('categories'=>$categories));
    }

    public function postOlusturAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager(); // doctrine yardımcısını çağırdık.

        //posttan gelen verileri alalım
        $baslik=$request->request->get('baslik');
        $icerik=$request->request->get('icerik');
        $kategori=$request->request->get('kategori');
        $tarih=new\DateTime('now');
        $user=$this->getUser();

        $kat=$this->getDoctrine()->getRepository('BlogBundle:Category')
            ->find($kategori);

        $new_post=new Post();
        $new_post->setBaslik($baslik);
        $new_post->setIcerik($icerik);
        $new_post->setKategori($kat);
        $new_post->setTarih($tarih);
        $new_post->setUser($user);


        $em->persist($new_post);
        $em->flush();

        return $this->redirectToRoute("index");
    }


}
