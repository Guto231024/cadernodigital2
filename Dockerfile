FROM thecodingmachine/php:8.2-v4-apache-node18

USER root

# Configurações de locale e instalação da extensão intl
RUN apt-get update \
    && apt-get install -y locales php8.2-intl \
    && locale-gen pt_BR.UTF-8 \
    && update-locale LANG=pt_BR.UTF-8 \
    && rm -rf /var/lib/apt/lists/*

# Para imagens thecodingmachine, as extensões são habilitadas através da variável PHP_EXTENSIONS
ENV PHP_EXTENSIONS="gd intl"

USER docker

# Configuração de locale
ENV LANG pt_BR.UTF-8

# Configuração do Apache
ENV APACHE_DOCUMENT_ROOT=public/