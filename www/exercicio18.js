contatos = JSON.parse(localStorage.getItem('contatos'));
var contato = {

	numero: 1,
	nome: 'lucas',
	email: 'cazlu_bios@hotmail.com'
};

localStorage.setItem('contato',JSON.stringfy(contato));
