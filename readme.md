## Download project
```
CMD: git clone https://github.com/v-e-y/hillel-hw10-test-1.git .
```

## Prepare project
```
CMD: composer install
```

## Turn on/run project
```
CMD: docker-compose up -d
```

## To look the result
- open browser
- open new tab
- write to address line:
```
http://localhost:7777/
```

## Run a single unit test

```
docker run -it --rm -v $(pwd):/app -w /app php:8.1.4-cli ./vendor/bin/phpunit --do-not-cache-result
```

## Run code sniffer

```
docker run --rm -v $(pwd):/data cytopia/phpcs --standard=PSR12 src
```

## Turn of/stop project
```
CMD: docker-compose down
```