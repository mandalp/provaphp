<?php

namespace ifpb\pweb\provaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class provaController extends Controller
{
	const NOME_SESSAO = 'autenticado';

	//verifica se a sessão existe e a retorna
	protected function sessaoDeAutenticacao(){
		$session = $this->getRequest()->getSession();
	
		if($session->get(self::NOME_SESSAO) == null)
			throw $this->createNotFoundException("Sessão invalida");
	
		return $session;
	}
	
	protected function getNomeUsuarioLogado(){
		return $this->getRequest()->getSession()->get(self::NOME_SESSAO);
	}
	
}
