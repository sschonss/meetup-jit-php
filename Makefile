up:
	docker-compose up --force-recreate --remove-orphans --build -d
down:
	docker-compose down
request:
	./request.sh $(LINES)
