__what:__

minimalistic but not bare bones php setup + MVC demo app (one and only)

__how:__

`docker-compose up -d` — spawn php and webserver

`docker-compose exec php composer test` — run unit tests and static analyzer

`https://localhost` — it's alive! (http is ok too)

GET http://localhost/triangle/1/"side_b"/-3 — calc triangle

GET http://localhost/circle/5 — calc circle


__gotchas:__

browser will warn you about self signed certificate. it's ok.
also, it will expire one day. renew manually: https://letsencrypt.org/docs/certificates-for-localhost/

__todo/changelog:__

* sane validation/error handling
* openAPI
* CI
* test controller maybe
