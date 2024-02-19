# oc6

## Issues

### 1 - install symfony

- install composer
- install scoop
- install symfony-cli
- install symfony project "surf"
- test on symfony server: ok
- install debug-bundle
- install profiler

### 1.2 firstpage #10

- install first page: lucky/number
- install first page: home
- navbar in base1.html.twig

### 2 - database

- install doctrine
- flush fixtures

### 3 - contents

- read articles
- build routes

### 4 - forms

- install forms
- save new article
- update article
- use validators

### 5 - comments
- rename articles by tricks
- create table comment
- create form using cli
- create table designation and trick_designations
- create table users
- create mysql request
- learn how works the orm to update tables
- separation of tasks in services an repository
- display article with related validated comments

### 5.1 - forms2 #15

- todo: forms of comments
- separate tasks in Service and Form
- propose form of tricks
- save comment
- redicrect correctly to the same page with 2 parameters

### 5.2 - relations #17

- rename columns
- make relations in entities
- create fixtures with dependancies

### 5.3 - relationship working good (#21) #17

- call of $trick->getComment() trough the associated requests from the Orm
- use mapping of models

### 5.4 - slug #19

- url lisibles
- edit slug from title and redirect with new slug

### 6 - login #6 #24

- pose des bases techniques, controller, form, model, mapper, twig...
- register : create new user
- login user
- update post comment while being loged, and attach user to it
- adapt menus and templates for adminuser ou logeduser

### 7 - admin

- access to admin
- edit status of posts
- edit status of comments
- repair solid concepts of register, tricks and comments

### 6.1 login2 #26
- verif user by token sent by mail (add column is user)
- reset password

### 8 - upload images #29
- todo: use models for saving
- add upload
- add entity media (img, video)
- let choose first image of article
- add medias in articles : images, youtube

### 9 - designations
- todo: use multiple tags
- todo: tricks by tags
