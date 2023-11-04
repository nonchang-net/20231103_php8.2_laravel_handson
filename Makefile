# メモ: このMakefileは、面倒なdocker関連コマンドなどをmake xxxでショートカットするだけのものです。

# make php → phpコンテナにbashでログインします
app:
	docker compose exec app bash

db:
	docker compose exec db bash
