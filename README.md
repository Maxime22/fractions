# Kata Fractions

## Description
Le kata "Fractions" consiste à développer la représentation et la manipulation de fractions avec une approche TDD.

## Fonctionnalités

- Création d'une fraction
- Addition
- Soustraction
- Multiplication
- Division
- Simplification (2/4 => 1/2)

## Prérequis
- Docker

## Installation
- Cloner le dépôt
- `make build`
- `make start`
- `make sh` + `composer install` dans le container (puis exit)
- Si vos classes ne sont pas reconnues dans les tests, aller dans le container et faire `composer dump-autoload`

## Tests
- `make test`

## Sources
- https://www.dunod.com/sciences-techniques/software-craft-tdd-clean-code-et-autres-pratiques-essentielles
