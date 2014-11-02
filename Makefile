default:


help:

up: install
install:
	composer run up

deploy:
	composer run deploy

.PHONY: default help up install deploy
