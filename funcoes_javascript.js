//Função MesageBox
function exibir_mensagem(msgTexto, msgTipo, msgLink)
{
	//O componente será feito pelo javascript ao executar uma ação

	var html = document.querySelector('html'); //Seleciona o documento que o script será aplicado

	var panel = document.createElement('div'); //Cria um elemento HTML atrvés de uma tag
	panel.setAttribute('class', 'msgBox'); //Define os atributos do elemento
	html.appendChild(panel); //Aplica o elemento ao documento HTML

	var msg = document.createElement('p'); //Cria um elemento HTML atrvés de uma tag
	msg.textContent = msgTexto; //Conteúdo do elemento html
	panel.appendChild(msg); //Aplica o elemento ao documento HTML

	var fecharBtn = document.createElement('button'); //Cria um elemento HTML atrvés de uma tag
	fecharBtn.textContent = 'x'; //Conteúdo do elemento html
	panel.appendChild(fecharBtn); //Aplica o elemento ao documento HTML

	if(msgTipo === 'warning')
	{
		msg.style.backgroundImage = 'url(image/icons/iconWarningBlack.png)';
		panel.style.backgroundColor = 'yellow';
	}
	else if(msgTipo === 'success')
	{
		msg.style.backgroundImage = 'url(image/icons/iconYesBlack.png)';
		panel.style.backgroundColor = 'green';
	}
	else if(msgTipo ==='error')
	{
		msg.style.backgroundImage = 'url(image/icons/iconErrorBlack.png)';
		panel.style.backgroundColor = 'red';
	}
	else 
	{
		msg.style.paddingLeft = '20px';
	}

	fecharBtn.onclick = function() //Adiciona uma ação ao clicar no botão 'fecharBtn'
	{
		if(msgLink == null)
		{
			panel.parentNode.removeChild(panel); //Ação para remover a message box do Elementos
		}
		else
		{
			window.location.href = msgLink; //irá redirecionar para um determinado link
		}
	}
}
//Fim Função MesageBox

//Função Scroll topo
function ScrollTop()
{
    window.scrollTo(0, 0);
}
//Fim Função Scroll 