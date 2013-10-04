<?php

namespace ifpb\pweb\provaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ifpb\pweb\provaBundle\Entity\Usuario;
use ifpb\pweb\provaBundle\Form\UsuarioType;

/**
 * Usuario controller.
 *
 */
class UsuarioController extends provaController
{
    /**
     * Lists all Usuario entities.
     *
     */
    public function indexAction()
    {
    	//autenticação
    	$this->sessaoDeAutenticacao();    	
    	$usuarioLogado = $this->getNomeUsuarioLogado();
    	
    	
        $em = $this->getDoctrine()->getManager();
        $entidades = $em->getRepository('provaBundle:Usuario')->findAll();
       
        return $this->render('provaBundle:Usuario:index.html.twig', array(
            'entities' => $entidades,
        	'usuarioLogado' => $usuarioLogado
        ));
    }

    /**
     * Creates a new Usuario entity.
     *
     */
    public function createAction(Request $request)
    {
    	//autenticação
    	$this->sessaoDeAutenticacao();    	
    	$usuarioLogado = $this->getNomeUsuarioLogado();
    	
    	
        $entity  = new Usuario();
        $form = $this->createForm(new UsuarioType(), $entity);
        $form->bind($request);
        
        $entity->setSenha( md5( $entity->getSenha() ) );

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('crud_show', array('id' => $entity->getId())));
        }

        return $this->render('provaBundle:Usuario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        	'usuarioLogado' => $usuarioLogado
        ));
    }

    /**
     * Displays a form to create a new Usuario entity.
     *
     */
    public function newAction()
    {
    	//autenticação
    	$this->sessaoDeAutenticacao();    	
    	$usuarioLogado = $this->getNomeUsuarioLogado();    	    	
    	    	
        $entity = new Usuario();
        $form   = $this->createForm(new UsuarioType(), $entity);

        return $this->render('provaBundle:Usuario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        	'usuarioLogado' => $usuarioLogado
        ));
    }

    /**
     * Finds and displays a Usuario entity.
     *
     */
    public function showAction($id)
    {
    	//autenticação
    	$this->sessaoDeAutenticacao();    	
    	$usuarioLogado = $this->getNomeUsuarioLogado();
    	
    	
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('provaBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('provaBundle:Usuario:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        	'usuarioLogado' => $usuarioLogado
       ));
    }

    /**
     * Displays a form to edit an existing Usuario entity.
     *
     */
    public function editAction($id)
    {
    	//autenticação
    	$this->sessaoDeAutenticacao();    	
    	$usuarioLogado = $this->getNomeUsuarioLogado();
    	
    	
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('provaBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Não foi possível encontrar o usuário.');
        }

        $editForm = $this->createForm(new UsuarioType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('provaBundle:Usuario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        	'usuarioLogado' => $usuarioLogado
        ));
    }

    /**
     * Edits an existing Usuario entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
    	//autenticação
    	$this->sessaoDeAutenticacao();    	
    	$usuarioLogado = $this->getNomeUsuarioLogado();
    	
    	
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('provaBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new UsuarioType(), $entity);
        $editForm->bind($request);
        
        $entity->setSenha( md5( $entity->getSenha() ) );

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('crud_edit', array('id' => $id)));
        }

        return $this->render('provaBundle:Usuario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        	'usuarioLogado' => $usuarioLogado
        ));
    }

    /**
     * Deletes a Usuario entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
    	//autenticação
    	$this->sessaoDeAutenticacao();    	
    	$usuarioLogado = $this->getNomeUsuarioLogado();
    	
    	
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('provaBundle:Usuario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Usuario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('crud'));
    }

    /**
     * Creates a form to delete a Usuario entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
