# API
Biblioteca em PHP para integração à plataforma TURBINADOR 3.0

Como utilizar?

$turbinador = new Turbinador();

$turbinador->AddCredentials('usuário', 'chave api');

$retorno = $turbinador->AddNewContact('Turbinador 3.0', 'euquero@turbinador.com');
if ($retorno == "000")
{
  // sucesso!
}

Consulte a ajuda completa no link:
http://wiki.turbinador.com/Web-API-Biblioteca-de-Integracao-em-PHP.ashx

Conheça o TURBINADOR 3.0
http://www.turbinador.com.br

Conheça tambem a UCHASOFT LTDA, produtora da aplicação Turbinador 3.0
http://www.uchasoft.com.br
