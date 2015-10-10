<?php

	spl_autoload_register(function($className){
		include $className . '.php';
	});

	$elevador = new Elevador();
 	$elevador->getInstance()->ativarElevador();
 	
 	$pessoa = new Pessoa();
 	$pessoa->setNome("Felipe");
 	$pessoa->setLocalizacao(4);
 	echo "\n*Pessoa (" . $pessoa->getNome() . ") est� no " . $pessoa->getLocalizacao() . "� andar. Elevador est� no " . $elevador->getInstance()->getAndarAtual() . "� andar. \n";
 	$pessoa->chamarElevador();	

 	$pessoa2 = new Pessoa();
 	$pessoa2->setNome("Felipe2");
 	$pessoa2->setLocalizacao(5);
 	echo "*Pessoa (" . $pessoa2->getNome() . ") est� no " . $pessoa2->getLocalizacao() . "� andar. Elevador est� no " . $elevador->getInstance()->getAndarAtual() . "� andar. \n";
 	$pessoa2->chamarElevador();
 	
 	$pessoa3 = new Pessoa();
 	$pessoa3->setNome("Felipe3");
 	$pessoa3->setLocalizacao(3);
 	echo "*Pessoa (" . $pessoa3->getNome() . ") est� no " . $pessoa3->getLocalizacao() . "� andar. Elevador est� no " . $elevador->getInstance()->getAndarAtual() . "� andar. \n";
 	$pessoa3->chamarElevador(); 	
 	$pessoa3->entrarElevador();
 	$pessoa3->escolherAndar(8);
 	$pessoa3->sairElevador();
 	echo "*Pessoa (" . $pessoa3->getNome() . ") est� no " . $pessoa3->getLocalizacao() . "� andar. Elevador est� no " . $elevador->getInstance()->getAndarAtual() . "� andar. Qtde. Pessoas no elevador (" . count($elevador->getInstance()->getPessoas()) . "); \n"; 	