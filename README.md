# docker-laravel-handson


## 作業用STICKYメモ

- laravel入門記事をDocker構成のローカル環境で試しているので、いくつか作法の違いがある。

- 学習中は、vscodeのターミナルを二つ開いておくのが良さそう。
	- docker compose execを叩くのも面倒なので、make xxでよく使うショートカットを配置しておいた。

- app(php)側コンテナbashに入る
	- make app
	- ここでartisanコマンドとかを実行する。
	- `php artisan migrate`とか多用するので、コンテナ側にもMakefile用意してもいいかもな。。

- db側コンテナbashに入る
	- make db
	- そこからmysqlにログイン
		- mysql -u root -psecret
