# PHP e JIT

## PHP

A sigla PHP significa "PHP: Hypertext Preprocessor", mas nem sempre foi assim. Inicialmente, a sigla significava "Personal Home Page", pois a linguagem foi criada para a criação de páginas pessoais. O PHP é uma linguagem de programação de uso geral, que é especialmente adequada para o desenvolvimento web. Foi criada em 1994 por Rasmus Lerdorf e é uma linguagem de código aberto.

## PHP/FI (1994)

Rasmus Lerdorf criou um conjunto de scripts CGI escritos em C, que ele chamou de "Personal Home Page Tools". Esses scripts permitiam que ele monitorasse as visitas ao seu currículo online. Em 1995, ele lançou o código-fonte desses scripts para o público, e o PHP nasceu.

---

##### O que é CGI?

CGI significa "Common Gateway Interface" e é um padrão que define como um servidor web pode interagir com programas externos. Um script CGI é um programa que é executado pelo servidor web em resposta a uma requisição HTTP. O script gera uma resposta que é enviada de volta ao cliente que fez a requisição.

##### O que é PHP/FI?

PHP/FI significa "Personal Home Page/Forms Interpreter" e foi a primeira versão do PHP. Foi lançada em 1995 e incluía um interpretador de formulários, que permitia que os scripts PHP fossem embutidos em páginas HTML. O PHP/FI também incluía suporte para bancos de dados, cookies e sessões.

Era algo similar a isso:

```
<!--include /text/header.html-->

<!--getenv HTTP_USER_AGENT-->
<!--ifsubstr $exec_result Mozilla-->
  Hey, you are using Netscape!<p>
<!--endif-->

<!--sql database select * from table where user='$username'-->
<!--ifless $numentries 1-->
  Sorry, that record does not exist<p>
<!--endif exit-->
  Welcome <!--$user-->!<p>
  You have <!--$index:0--> credits left in your account.<p>

<!--include /text/footer.html-->
```

Dessa forma, o PHP/FI permitia que os desenvolvedores criassem páginas web dinâmicas, que podiam se adaptar ao usuário que as acessava.

## PHP 3 (1998)

Em 1998, Zeev Suraski e Andi Gutmans reescreveram o núcleo do PHP e lançaram a versão 3 da linguagem. Essa versão incluía um novo interpretador, chamado Zend Engine (Zeev + Andi).

Essa versão é considerada a primeira versão moderna do PHP, pois introduziu muitas das funcionalidades que ainda estão presentes na linguagem hoje em dia, e que a tornaram popular entre os desenvolvedores web.

```php
<?php
$host = "localhost";
$user = "usuario";
$password = "senha";
$database = "banco_de_dados";

$conn = mysql_connect($host, $user, $password);
if (!$conn) {
    die("Não foi possível conectar ao banco de dados: " . mysql_error());
}

mysql_select_db($database, $conn);

$query = "SELECT * FROM tabela_exemplo";
$result = mysql_query($query);

if (!$result) {
    die("Erro na consulta: " . mysql_error());
}

while ($row = mysql_fetch_assoc($result)) {
    echo "ID: " . $row['id'] . "<br>";
    echo "Nome: " . $row['nome'] . "<br>";
    echo "Email: " . $row['email'] . "<br><br>";
}

mysql_close($conn);
?>
```

## PHP 5 (2004)

Vamos pular a versão 4 do PHP, pois ela foi lançada em 2000 e não teve muito sucesso. Em 2004, foi lançada a versão 5 do PHP, que introduziu muitas melhorias em relação à versão anterior.

A versão mais recente do PHP 5 é a 5.6, que foi lançada em 2014. Ela inclui muitas melhorias de desempenho e segurança, e é amplamente utilizada em servidores web em todo o mundo.

Agora era possível usar o PDO (PHP Data Objects) para se conectar ao banco de dados, o que era mais seguro e mais fácil de usar do que as funções mysql\_\*.

A váriva superglobal $\_SESSION foi introduzida para gerenciar sessões de usuário.

A função ´split()´ foi removida, e deu lugar a função ´explode()´.

Sem contar as melhorias de desempenho e segurança.

O auge da popularidade do PHP foi durante essa época, e muitos sites populares, como o Facebook, foram construídos com PHP, sem contar os inúmeros sites feitos por CMSs (Content Management Systems) como o WordPress, Joomla e Drupal.

## PHP 7 (2015)

Em 2015, foi lançada a versão 7 do PHP, que introduziu muitas melhorias em relação à versão anterior. A versão mais recente do PHP 7 é a 7.4, que foi lançada em 2019.

As 3 principais melhorias do PHP 7 foram:

1. **Desempenho**: O PHP 7 é muito mais rápido do que as versões anteriores, graças ao novo interpretador Zend Engine 3.0, que foi reescrito do zero para ser mais eficiente.

2. **Tipo de declaração**: O PHP 7 introduziu a declaração de tipo escalar, que permite que os desenvolvedores especifiquem o tipo de dados que uma função deve aceitar e retornar.

3. **Novos operadores**: O PHP 7 introduziu novos operadores, como o operador de nave espacial (<=>) e o operador de coalescência nula (??), que tornam o código mais conciso e legível.

> O operador de nave espacial (<=>) é usado para comparar dois valores. Ele retorna 0 se os valores forem iguais, 1 se o primeiro valor for maior e -1 se o segundo valor for maior.

## PHP 8 (2020)

Em 2020, foi lançada a versão 8 do PHP, que introduziu muitas melhorias em relação à versão anterior. A versão mais recente do PHP 8 é a 8.0, que foi lançada em 2020.

Segue 8 topicos rapidos sobre o PHP 8:

1. **Atribuições por referência**: Agora é possível atribuir por referência ao criar uma nova variável.

2. **Operador de união nula**: O operador de união nula (??) agora pode ser encadeado.

3. **Operador de atribuição de coalescência nula**: O operador de atribuição de coalescência nula (??=) foi introduzido.

4. **Argumentos nomeados**: Agora é possível passar argumentos para funções por nome.

5. **Argumentos de tipo variável**: Agora é possível passar um número variável de argumentos para funções.

6. **Tipos de retorno**: Agora é possível especificar o tipo de retorno de uma função.

7. **Throw**: Agora é possível lançar uma exceção sem especificar a exceção.

8. **Funções de fábrica**: Agora é possível criar funções de fábrica para criar objetos.

Mais algumas melhorias:

- **JIT (Just-In-Time)**: O PHP 8 introduziu o JIT (Just-In-Time) compiler, que compila o código PHP em código de máquina nativo, o que melhora significativamente o desempenho do PHP.

- **Union Types**: O PHP 8 introduziu os tipos de união, que permitem que uma variável aceite mais de um tipo de dados.

- **Named Arguments**: O PHP 8 introduziu os argumentos nomeados, que permitem que os desenvolvedores especifiquem os argumentos de uma função por nome, em vez de por posição.
