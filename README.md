
# Sistema de Leilões Eletrônicos

Sistema de Leilões Eletrônicos



## Requerimentos

Necessário sistema operacional macOS, Linux ou Windows (via [WSL2](https://docs.microsoft.com/en-us/windows/wsl/about))


## Documentação da API

[Documentação da API](https://documenter.getpostman.com/view/22300616/2s8YYMmLDN)




## Stack utilizada


**Back-end:** PHP 8.1, Laravel 9, JWT-auth 2.0, Laravel Sail
**Front-end:** Html, Css, Bootstrap

## Rodando localmente

Clone o projeto

```bash
  git clone https://github.com/dandevweb/leilao
```

Entre no diretório do projeto

```bash
  cd leilao
```

Crie o arquivo .env a partir do arquivo .env.example

```bash
  cp .env.example .env
```

Instale as dependências

```bash
  docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

Com o Docker "startado", Inicie o servidor

```bash
  ./vendor/bin/sail up -d
```

Crie um alias para facilitar os comandos do Sail

```bash
  alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

Execute a migrações com a base populada

```bash
  sail php artisan migrate --seed
```

Execute quarquer comando dentro do container utilizando "sail". Exemplos:

```bash
  sail php down
```
```bash
  sail up -d
```
```bash
  sail php --version
```

Acesse o projeto em:

    - http://localhost:8080 (Área do cliente)
        'email': 'cliente@gmail.com',
        'password': 'password',

    - http://localhost:8080/admin (Área Admin) 
            'email': 'admin@gmail.com',
            'password': 'password',




[Documentação da API](https://documenter.getpostman.com/view/22300616/2s8YYMmLDN)

## Executando o projeto sem Docker

O projeto pode ser executado normalmente em qualquer sistema operacional com os seguintes pré-requisitos:

- PHP 8.*
- Composer
- MySql
- Servidor Apache ou Nginx

**Execute os seguintes comandos:**

Clone o projeto

```bash
  git clone https://github.com/dandevweb/leilao
```

Entre no diretório do projeto

```bash
  cd leilao
```

Crie o arquivo .env a partir do arquivo .env.example

```bash
  cp .env.example .env
```


**Crie um banco de dados MySql e parametrize-o no arquivo .env**



Instale as dependências

```bash
    composer install
```

Execute o servido embutido do Laravel

```bash
  php artisan serve
```



Siga a [Documentação da API](https://documenter.getpostman.com/view/22300616/2s8YYMmLDN) alterando somente a url base para http://localhost:8000
