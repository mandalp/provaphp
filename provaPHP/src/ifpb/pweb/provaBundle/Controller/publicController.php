<?php

namespace ifpb\pweb\provaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ifpb\pweb\provaBundle\Entity\Usuario;
use Symfony\Component\HttpFoundation\Response;

class publicController extends provaController
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	
    	$entidades = $em->getRepository('provaBundle:Usuario')->findAll();
    	
    	return $this->render('provaBundle:Public:index.html.twig', array(
    			'entidades' => $entidades,
    	));
    }
    
    public function formLoginAction()
    {
    	return $this->render('provaBundle:Public:form-admin-login.html.twig', array());
    }
    
    public function criarAdminAction(){
    	$em = $this->getDoctrine()->getManager();
    	$repositorio = $em->getRepository('provaBundle:Usuario');
    	
    	$admin = $repositorio->findOneBy(array(    			
    			'email' => 'root@admin.com',
    			'senha' => md5('root') 			
    	));
    	
    	
    	if($admin != null){
    		throw $this->createNotFoundException("Usuario root já existe.");
    	}
    	
    	
    	$entity  = new Usuario();
    	$entity->setNome('root');    	
    	$entity->setPrivilegio('admin');
    	$entity->setTelefone('321');
    	$entity->setEmail('root@admin.com');
    	$entity->setSenha( md5('root') );
    	
    	
    	$em->persist($entity);
    	$em->flush();
    	
    	return new Response( "Usuario root cadastrado. Login: root@admin.com | Senha: root" );    	
    }
    
    public function loginAction()
    {
    	//recupera dados do formulário
    	$email = $this->getRequest()->get('fm_login_email');
    	$senha = $this->getRequest()->get('fm_login_senha');
    	$senha = md5($senha);
    	
    	//autenticando
    	$repositorio = $this->getDoctrine()->getRepository('provaBundle:Usuario');
    	
    	$usuario = $repositorio->findOneBy( array(
    			'email' => $email, 
    			'senha' => $senha,
    			'privilegio' => 'admin'
    			
    	));
    	
    	if($usuario == null)
    		throw $this->createNotFoundException("Usuário ou senha invalido!");
    	
    	
    	//criando sessão de autenticação
    	$sessao = $this->getRequest()->getSession();
    	$sessao->set( parent::NOME_SESSAO, $usuario->getNome() );
    	
       	
    	//encaminha para o metodo index do controlado usuarioController
    	$response = $this->forward('provaBundle:Usuario:index');
    	return $response;    	
    }
    
    public function logoutAction()
    {
    	//destruindo a sessão
		$sessao = $this->getRequest()->getSession();
		$sessao->remove(parent::NOME_SESSAO);
		//$sessao->invalidate();
	
	
		//redirecionando para o metodo indexAction
		$response = $this->forward('provaBundle:Public:index');
		return $response;
    }
}












