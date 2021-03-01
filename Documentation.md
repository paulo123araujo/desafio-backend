## Documentação Desafio

**Documentação da API: [postman](./docs/Desafio Ow Interative.postman_collection.json)**

### Detalhes
 - Tentei aplicar alguns conceitos de DDD, Clean Architecture, design Patterns, SOLID
 - Se eu for olhar com mais calma amanhã, provavelmente faria algumas refatorações
 - Não implementei testes, o que seria o ideal, mas a ideia foi separar bem o que cada camada é responsável pra poder fazer um teste bem conciso em cada parte
 - O ideal seria eu separar mais o repositório, acho que o legal seria um pra cada caso de uso, e um repositório abstrato pra inicializar o Eloquent
 - Pra esse caso, eu particularmente, usaria o Doctrine, pra não ter que criar a camada de model em infra
 - Poderia ter usado melhor as DTO's pra ficar mais claro qual os dados que trafegam em cada camada
 - Não cacheei as rotas
 - o item que estava especificado: "**No endpoint que exporta o arquivo CSV criar um cabeçalho com os dados do cliente e o seu saldo atual**". Eu não fiz porque não achei que ficaria legal a informação do balanço junto com cada movimentação.
 - o meu cálculo para o balanço foi: saldo inicial + credito - debito - estorno. Porém não sei se seria o correto, principalmente por causa do estorno.
 - Seria muito legal se dessem um feedback sobre o que ficou legal, e o que não ficou para que eu possa melhorar :-)

### How to run

Primeiro tenha instalado na máquina o docker e o docker-compose
Então na pasta do projeto rode o seguinte comando:

```bash
$ docker-compose up -d --build
```

Assim a aplicação estará de pé e pronta para usa-la.

Agora crie o banco de dados no container e sete ele no .env da aplicação.

Criei alguns seeders para ajudar nos testes
```bash
$ docker exec -it desafio-ow-interactive.app php artisan migrate --seed
```
