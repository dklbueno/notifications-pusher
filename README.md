# Notification Pusher (App de Envio)

Essa aplicação é responsável pelo envio da notificação pusher que deverá ser **escutada** por outra aplicação frontend **notifications-front**

## Instalação

1. Faça uma cópia do arquivo **.env.example** como **.env**
```shell
cp .env.example .env
```

2. Crie um arquivo chamado **database.sqlite** na pasta **database**
```shell
sudo touch database/database.sqlite
```

3. Rode o comando de build do docker compose
```shell
docker compose build --no-cache
```

4. Rode o **composer install** dentro do container do docker
```shell
docker compose exec notification-pusher-php-fpm composer install
```

5. Faça a migração das tabelas dentro do container do docker
```shell
docker compose exec notification-pusher-php-fpm php artisan migrate
```

6. Rode os comandos **npm**
```shell
npm install && npm run dev
```

## Configurações Pusher

1. Crie uma conta no **pusher.com**

2. Cole as variáveis de acesso no aqruivo **.env**
```
PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
```

Obs.: Para essa aplicação funcionar corretamente é necessário que exista um mesmo usuário no app de frontend