<?php

namespace App\Controller;

use App\Entity\Anuncio;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;

class AnuncioController extends AbstractController
{
    /**
     * @Route("/anuncios",methods={"GET"})
     */
    public function getTodosAnuncios(SerializerInterface $serializer): JsonResponse{
        $anuncios = $this->getDoctrine()->getRepository(Anuncio::class)->findAll();

        $data = $serializer->serialize(
            $anuncios, 'json', ['groups' => ['anuncios'] ]
        );

        return new JsonResponse($data,Response::HTTP_OK, [], true);
    }

    /**
     * @Route("/anuncio/{id}",methods={"PUT"})
     */
    public function onClickAnuncio(int $id, SerializerInterface $serializer, EntityManagerInterface $entityManager): JsonResponse{
        $anuncio = $this->getDoctrine()->getRepository(Anuncio::class)->findOneBy(['id' => $id]);

        $anuncio->setVecesclickado($anuncio->getVecesclickado() + 1);

        $entityManager->persist($anuncio);
        $entityManager->flush();


        $data = $serializer->serialize(
            $anuncio, 'json', ['groups' => ['anuncios'] ]
        );

        return new JsonResponse($data,Response::HTTP_OK, [], true);
    }
}
