## INFRA DEV REMOTO

### .env

Antes de executar o composer install, crie seu .env:  cp .env.example .env

### Docker

Excute o comando abaixo para criar o container com o banco postgres

docker run --name remoto-postgres --restart always -p 5433:5432 -e POSTGRES_PASSWORD=docker -e POSTGRES_DB=remoto -d postgres


Atualize o seu env para o env.docker : cp .env.docker .env