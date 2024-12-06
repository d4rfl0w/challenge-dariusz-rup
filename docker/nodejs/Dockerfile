ARG NODE_VERSION=10
FROM node:${NODE_VERSION}-alpine

WORKDIR /srv/sylius

RUN set -eux; \
	apk add --no-cache --virtual .build-deps \
		g++ \
		gcc \
		git \
		make \
		python \
	;

WORKDIR /srv/sylius
