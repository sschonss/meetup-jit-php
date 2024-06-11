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

## PHP 4 (2000)
